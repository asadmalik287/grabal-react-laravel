<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviewsList =  Review::with(["service"=>function($service){
            $service->select(['id','title','description','main_service_image','created_at','added_by'])
            ->with(['haveProvider'=>function($user){
                $user->select(['id','name','f_name','l_name','role_id','logo']);
            }]);
        }
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
            $serviceProvider = $topServiceProviders[$value][0];
            $serviceProvider['totalReviews'] = $popularServices[$value]['totalReviews'];
            $serviceProvider['averageRating'] = $popularServices[$value]['averageRating'];
            $topServiceProvidersArr[$value] = $serviceProvider;
        }
    }
    $popularServices = array_values($popularServices);
    $popularServicesCategoryProviders = array_values($popularServicesCategoryProviders);
    $topServiceProviders = array_values($topServiceProvidersIdsArr);


    $allProvidersCount = Service::get()->unique('added_by')->count();
    // $allServices = Service::where('status','active')->get()->count();
    $allServices = Service::count();
    return view('admin.home', compact( 'popularServices','popularServicesCategoryProviders','topServiceProviders', 'allProvidersCount', 'allServices' ) );
    }
}
