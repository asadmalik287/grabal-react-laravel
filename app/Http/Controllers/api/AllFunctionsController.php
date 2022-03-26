<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Review;
use Validator;

class AllFunctionsController extends Controller
{
    // get filled fields
    private function getFilledFields($request,$require,$ignore){
        $data = $request->except($ignore);
        foreach($data as $key=>$value)
        {
            if((is_null($value) || $value == '') && !in_array($key,$require)) unset($data[$key]);
        }
        return $data;
    }

    // get list of all sub category services
    public function getSubCategoryServices(Request $request){
        $validator = Validator::make($request->all(),['sub_category_id'=>"required"]);
        if($validator->fails()){
            return response()->json(['success'=>false,"errors"=>$validator->errors()]);
        }

        $subCategory = SubCategories::find($request->sub_category_id);
        if($subCategory!=null){
            $services = $subCategory->service();
            $filledFieldAndData = $this->getFilledFields($request,['city','suburb','postal_code'],["sub_category_id"]);
            if(count($filledFieldAndData) > 0){
                foreach($filledFieldAndData as $key=>$value){
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
            return response()->json(['success'=>true,'services'=>$services]);
        }
        return response()->json(['success'=>false,'message'=>"Sorry sub category does not exist"]);
    }

    // get all reviews of services
    public function getServiceReviews(){
        $reviewsList =  Review::with(["service"=>function($service){
                        $service->select(['id','title','description','main_service_image','created_at','added_by'])->with(['haveProvider'=>function($user){
                            $user->select(['id','name','f_name','l_name','role_id','logo']);
                        }]); }
                    ])->get()
                    ->groupBy("service_id");
        $serviceArray = [];
        $sortServicesArray = [];
        foreach($reviewsList as $service_id=>$reviews){
            $averageRating = 0;
            $service = '';
            foreach($reviews as $id=>$review){
                $averageRating+= $review->rating;
                $service = $review->service;
            }
            $service->averageRating = $averageRating/count($reviews);
            $sortServicesArray[$service_id] = $service;
            $serviceArray[$service_id] = $averageRating/count($reviews);
        }
        arsort($serviceArray);
        $ordered = array();
        if(count($serviceArray) >0){
            foreach ($serviceArray as $key => $value){
                $ordered[$key] = $sortServicesArray[$key];
            }
        }

        return response()->json(['success'=>true,'popularServices'=>array_values($ordered)]);
    }
}
