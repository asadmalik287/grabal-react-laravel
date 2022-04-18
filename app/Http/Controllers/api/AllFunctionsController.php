<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\SendEnquiryEmailToServiceProvider;
use App\Models\AssignedTask;
use App\Models\Review;
use App\Models\Service;
use App\Models\UploadAds;
use App\Models\User;
use App\Models\WatchList;
use Illuminate\Http\Request;
use Mail;
use Validator;

class AllFunctionsController extends Controller
{
    // get filled fields
    private function getFilledFields($request, $require, $ignore)
    {
        $data = $request->except($ignore);
        foreach ($data as $key => $value) {
            if (($value == '' || $value == null) && !in_array($key, $require)) {
                unset($data[$key]);
            } elseif (($value != null || !$value == '') && !in_array($key, $require)) {
                unset($data[$key]);
            } elseif (($value == null) && in_array($key, $require)) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    // get list of all sub category services
    public function getSubCategoryServices(Request $request)
    {
        // $validator = Validator::make($request->all(),['sub_category_id'=>"required"]);
        // if($validator->fails()){
        //     return response()->json(['success'=>false,"errors"=>$validator->errors()]);
        // }

        // $subCategory = SubCategories::find($request->sub_category_id);
        // if($subCategory!=null){
        //     $services = $subCategory->service();
        $filledFieldAndData = $this->getFilledFields($request, ['subCategory_id', 'category_id', 'city', 'suburb', 'postal_code'], ["user_id"]);
        $services = [];
        if (count($filledFieldAndData) > 0) {
            foreach ($filledFieldAndData as $key => $value) {
                if ($key == array_key_first($filledFieldAndData)) {
                    $services = Service::where($key, $value);
                } else {
                    $services->where($key, $value);
                }
            }
            $services = $services->select(['id', 'title','slug', 'description', 'main_service_image', 'created_at', 'added_by', 'subCategory_id', 'category_id'])
                ->with(['haveProvider' => function ($user) {
                    $user->select('id', 'role_id', 'logo');
                }, 'subcat' => function ($subCategory) {
                    $subCategory->select('id', 'name');
                }])
                ->with("averageReviews")
                ->get();
            $newServicesArr = [];
            if (count($services) > 0) {
                foreach ($services as $service) {
                    $watchList = 0;
                    if (isset($request->user_id)) {
                        if (WatchList::where(['service_id' => $service->id, 'user_id' => $request->user_id])->exists()) {
                            $watchList = 1;
                        }
                    }
                    $service['watchList'] = $watchList;
                    $newServicesArr[] = $service;
                }
            }
            $services = $newServicesArr;
        }
        return response()->json(['success' => true, 'services' => $services]);
        // }
        // return response()->json(['success'=>false,'message'=>"Sorry sub category does not exist"]);
    }

    // get sub cat service
    public function getSubCategoryService(Request $request)
    {
        // $validator = Validator::make($request->all(),['sub_category_id'=>"required"]);
        // if($validator->fails()){
        //     return response()->json(['success'=>false,"errors"=>$validator->errors()]);
        // }

        // $subCategory = SubCategories::find($request->sub_category_id);
        // if($subCategory!=null){
        //     $services = $subCategory->service();
        $filledFieldAndData = [];
        $filled['id'] = $request->slug;
        $services = [];
        // if (count($filledFieldAndData) > 0) {
        // foreach ($filledFieldAndData as $key => $value) {
        //     if ($key == array_key_first($filledFieldAndData)) {
        //         $services = Service::join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
        //             ->where(categories, $value);
        //     } else {
        //         $services->where($key, $value);
        //     }
        // }
        $services = Service::join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
            ->where('sub_categories.slug', $request->slug);

        $services = $services->select(['services.id','services.slug', 'services.title', 'services.description', 'services.main_service_image', 'services.created_at', 'services.added_by', 'services.subCategory_id', 'services.category_id'])
            ->with(['haveProvider' => function ($user) {
                $user->select('id', 'role_id', 'logo','slug');
            }, 'subcat' => function ($subCategory) {
                $subCategory->select('id', 'name','slug');
            }])
            ->with("averageReviews")
            ->get();
        $newServicesArr = [];
        if (count($services) > 0) {
            foreach ($services as $service) {
                $watchList = 0;
                if (isset($request->user_id)) {
                    if (WatchList::where(['service_id' => $service->id, 'user_id' => $request->user_id])->exists()) {
                        $watchList = 1;
                }
                }
                $service['watchList'] = $watchList;
                $service['user_id'] = $request->user_id;
                $newServicesArr[] = $service;
            }
        }
        $services = $newServicesArr;
        // }
        return response()->json(['success' => true, 'services' => $services]);
        // }
        // return response()->json(['success'=>false,'message'=>"Sorry sub category does not exist"]);
    }
    // close
    // get popular services and its category
    public function getPopularServicesAndCategories(Request $request)
    {
        $reviewsList = Review::with(["service" => function ($service) {
            $service->select(['id', 'title', 'description', 'slug', 'main_service_image', 'created_at', 'added_by'])->with(['haveProvider' => function ($user) {
                $user->select(['id', 'name', 'f_name', 'l_name', 'role_id', 'logo','slug']);
            }]);},
        ])->get()
            ->groupBy("service_id");
        $serviceArray = [];
        $sortServicesArray = [];

        // find number of reviews and its average of service
        foreach ($reviewsList as $service_id => $reviews) {
            $averageRating = 0;
            $service = '';
            foreach ($reviews as $id => $review) {
                $averageRating += $review->rating;
                $service = $review->service;
            }
            $service->totalReviews = count($reviews);
            $service->averageRating = $averageRating / count($reviews);
            $sortServicesArray[$service_id] = $service;
            $serviceArray[$service_id] = count($reviews);
        }
        arsort($serviceArray);

        // get top ten and three services
        $popularServices = array();
        $popularServicesCategoryProviders = array();
        $topServiceProvidersArr = array();
        $topTenServices = array_slice(array_keys($serviceArray), 0, 10);
        $topThreeServices = array_slice(array_keys($serviceArray), 0, 3);

        // get top three services category and their service providers
        $topServicesCategory = Service::select(['id', 'title', 'subCategory_id', 'added_by'])->whereIn('id', $topThreeServices)
            ->with(['subcat' => function ($subCategory) {
                $subCategory->select(['id', 'name', 'slug'])
                    ->where('status', 'active')
                    ->withCount('serviceProviders');
            }])
            ->get()
            ->groupBy('id');
        // return $topServicesCategory;
        // make order according to services reviews
        if (count($topTenServices) > 0) {
            foreach ($topTenServices as $value) {
                $watchList = 0;
                $service = $sortServicesArray[$value];
                if (isset($request->user_id)) {
                    if (WatchList::where(['service_id' => $value, 'user_id' => $request->user_id])->exists()) {
                        $watchList = 1;
                    }
                }
                $service['watchList'] = $watchList;
                $popularServices[$value] = $service;
            }
        }

        // make order according to top ten services and service providers count
        if (count($topThreeServices) > 0) {
            foreach ($topThreeServices as $value) {
                $popularServicesCategoryProviders[$value] = $topServicesCategory[$value][0];
            }
        }

        // get top service providers
        $topServiceProviders = Service::select(['id', 'added_by'])->whereIn('id', $topTenServices)
            ->with(['haveProvider' => function ($provider) {
                $provider->select(['id', 'name', 'business_name', 'f_name','slug', 'l_name', 'logo', 'created_at', 'message']);
            }])
            ->get()
            ->unique('added_by')
            ->groupBy('id');

        // make order according to top three services and create category service providers count
        if (count($topThreeServices) > 0) {
            foreach ($topThreeServices as $value) {
                $popularServicesCategoryProviders[$value] = $topServicesCategory[$value][0];
            }
        }

        // make order according to top services and create list of service providers
        $topServiceProvidersIdsArr = array_values(array_intersect($topTenServices, array_keys($topServiceProviders->toArray())));
        if (count($topServiceProvidersIdsArr) > 0) {
            foreach ($topServiceProvidersIdsArr as $value) {
                $serviceProvider = $topServiceProviders[$value][0];
                $serviceProvider['totalReviews'] = $popularServices[$value]['totalReviews'];
                $serviceProvider['averageRating'] = $popularServices[$value]['averageRating'];
                $topServiceProvidersArr[$value] = $serviceProvider;
            }
        }

        return response()->json(['success' => true, 'popularServices' => array_values($popularServices), 'popularServicesCategoryProviders' => array_values($popularServicesCategoryProviders), 'topServiceProviders' => array_values($topServiceProvidersArr)]);
    }

    // send enquiry email to service provider
    public function sendEnquiryEmailToServiceProvider(Request $request)
    {
        if($request->type === 'message'){
            $validator = Validator::make($request->all(), ['provider_id' => 'required', 'message' => 'required']);
        }else{
            $validator = Validator::make($request->all(), ['provider_id' => 'required']);
        }
        
        if ($validator->fails()) {
            return response()->json(['success' => false, "errors" => $validator->errors()]);
        }
        $provider = User::findOrFail($request->provider_id);
        if ($provider == null) {
            return response()->json(['success' => false, "message" => "Sorry service provider does not exist"]);
        }
        $assigned_tasks = [
            "user_id" => $request->user_id,
            "service_id" => $request->service_id,
            "provider_id" => $request->provider_id,
            "message" => $request->message,
        ];

        AssignedTask::create($assigned_tasks);

        $data = [
            "user" => $provider,
            "message" => $request->message,
        ];

        Mail::to($provider->email)->send(new SendEnquiryEmailToServiceProvider($data));
        return response()->json(['success' => true, 'message' => "Enquiry Email has been sent to service provider successfully"]);

    }

    // get ad according to api
    public function getAd(Request $request)
    {
        $ad = UploadAds::get();
        $home = [];
        $sidebar = [];
        $serviceDetail = [];
        $arr = [];
        $arr2 = [];
        $arr3 = [];
        $c = 0;
        $b = 0;
        $a = 0;
        foreach ($ad as $key => $value) {
            if ($value->page == 'home') {
                $arr['id'] = $value->id;
                $arr['title'] = $value->title;
                $arr['page'] = $value->page;
                $arr['attachment_link'] = $value->attachment_link;
                $home[$a] = $arr;
                $a++;
            }

            if ($value->page == 'sidebar') {
                $arr2['id'] = $value->id;
                $arr2['title'] = $value->title;
                $arr2['page'] = $value->page;
                $arr2['attachment_link'] = $value->attachment_link;
                $sidebar[$b] = $arr2;
                $b++;

            }
            if ($value->page == 'serviceDetail') {
                $arr3['id'] = $value->id;
                $arr3['title'] = $value->title;
                $arr3['page'] = $value->page;
                $arr3['attachment_link'] = $value->attachment_link;
                $serviceDetail[$c] = $arr3;
                $c++;

            }
        }
        $data = [
            'home' => $home,
            'sidebar' => $sidebar,
            'serviceDetail' => $serviceDetail,
        ];
        return response()->json(['success' => true, 'ads' => $data]);
    }
    // close
}
