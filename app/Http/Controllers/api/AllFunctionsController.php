<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Review;
use App\Models\Service;
use Validator;

class AllFunctionsController extends Controller
{
    // get filled fields
    private function getFilledFields($request,$require,$ignore){
        $data = $request->except($ignore);
        foreach($data as $key=>$value)
        {
            if((is_null($value) || $value == '') && !in_array($key,$require)){
                unset($data[$key]);
            }elseif((!is_null($value) || !$value == '') && !in_array($key,$require)){
                unset($data[$key]);
            }
        }
        return $data;
    }

    // get list of all sub category services
    public function getSubCategoryServices(Request $request){
        // $validator = Validator::make($request->all(),['sub_category_id'=>"required"]);
        // if($validator->fails()){
        //     return response()->json(['success'=>false,"errors"=>$validator->errors()]);
        // }

        // $subCategory = SubCategories::find($request->sub_category_id);
        // if($subCategory!=null){
        //     $services = $subCategory->service();
            $filledFieldAndData = $this->getFilledFields($request,['subCategory_id','category_id','city','suburb','postal_code'],[]);
            // return $filledFieldAndData;
            $services = [];
            if(count($filledFieldAndData) > 0){
                foreach($filledFieldAndData as $key=>$value){
                    if($key == array_key_first($filledFieldAndData)){
                        $services = Service::where($key,$value);
                    }else{
                        $services->where($key,$value);
                    }
                }
                $services = $services->select(['id','title','description','main_service_image','created_at','added_by','subCategory_id'])
                                ->with(['haveProvider' => function ($user) {
                                    $user->select('id','role_id','logo');
                                },'subcat'=>function ($subCategory) {
                                    $subCategory->select('id','name');
                                }])
                                ->get();
            }
            return response()->json(['success'=>true,'services'=>$services]);
        // }
        // return response()->json(['success'=>false,'message'=>"Sorry sub category does not exist"]);
    }

    // get popular services and its category
    public function getPopularServicesAndCategories(){
        $reviewsList =  Review::with(["service"=>function($service){
                        $service->select(['id','title','description','main_service_image','created_at','added_by'])->with(['haveProvider'=>function($user){
                            $user->select(['id','name','f_name','l_name','role_id','logo']);
                        }]); }
                    ])->get()
                    ->groupBy("service_id");
        $serviceArray = [];
        $sortServicesArray = [];

        // find number of reviews and its average of service
        foreach($reviewsList as $service_id=>$reviews){
            $averageRating = 0;
            $service = '';
            foreach($reviews as $id=>$review){
                $averageRating+= $review->rating;
                $service = $review->service;
            }
            $service->totalReviews = count($reviews);
            $service->averageRating = $averageRating/count($reviews);
            $sortServicesArray[$service_id] = $service;
            $serviceArray[$service_id] = count($reviews);
        }
        arsort($serviceArray);

        // get top ten and three services
        $popularServices = array();
        $popularServicesCategoryProviders = array();
        $topServiceProvidersArr = array();
        $topTenServices = array_slice(array_keys($serviceArray),0,10);
        $topThreeServices = array_slice(array_keys($serviceArray),0,3);

        // get top three services category and their service providers
        $topServicesCategory =  Service::select(['id','title','subCategory_id','added_by'])->whereIn('id',$topThreeServices)
                                ->with(['subcat'=>function($subCategory){
                                    $subCategory->select(['id','name'])
                                    ->where('status','active')
                                    ->withCount('serviceProviders');
                                }])
                                ->get()
                                ->groupBy('id');

        // make order according to services reviews
        if(count($topTenServices) >0){
            foreach ($topTenServices as $value){
                $popularServices[$value] = $sortServicesArray[$value];
            }
        }

        // make order according to top ten services and service providers count
        if(count($topThreeServices) >0){
            foreach ($topThreeServices as $value){
                $popularServicesCategoryProviders[$value] = $topServicesCategory[$value][0];
            }
        }

        // get top service providers
        $topServiceProviders =  Service::select(['id','added_by'])->whereIn('id',$topTenServices)
                                ->with(['haveProvider'=>function($provider){
                                    $provider->select(['id','name','business_name','f_name','l_name','logo','created_at']);
                                }])
                                ->get()
                                ->unique('added_by')
                                ->groupBy('id');

        // make order according to top three services and create category service providers count
        if(count($topThreeServices) >0){
            foreach ($topThreeServices as $value){
                $popularServicesCategoryProviders[$value] = $topServicesCategory[$value][0];
            }
        }

        // make order according to top services and create list of service providers
        $topServiceProvidersIdsArr = array_values(array_intersect($topTenServices,array_keys($topServiceProviders->toArray())));
        if(count($topServiceProvidersIdsArr) >0){
            foreach ($topServiceProvidersIdsArr as $value){
                $topServiceProvidersArr[$value] = $topServiceProviders[$value][0];
            }
        }

        return response()->json(['success'=>true,'popularServices'=>array_values($popularServices),'popularServicesCategoryProviders'=>array_values($popularServicesCategoryProviders),'topServiceProviders'=>array_values($topServiceProvidersArr)]);
    }
}
