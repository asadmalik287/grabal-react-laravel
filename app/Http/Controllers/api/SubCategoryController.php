<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Validator;

class SubCategoryController extends Controller
{
    // get list of all sub category services
    public function getSubCategoryServices(Request $request){
        $validator = Validator::make($request->all(),['sub_category_id'=>"required"]);
        if($validator->fails()){
            return response()->json(['success'=>false,"errors"=>$validator->errors()]);
        }

        $subCategory = SubCategories::find($request->sub_category_id);
        if($subCategory!=null){
            $services = $subCategory->service();
            if(count($this->getFilledFields($request,["sub_category_id"])) > 0){
                foreach($this->getFilledFields($request,["sub_category_id"]) as $key=>$value){
                    $services->where($key,$value);
                }
            }
            $services = $services->get();
            return response()->json(['success'=>true,'data'=>$services]);
        }
        return response()->json(['success'=>false,'message'=>"Sorry sub category does not exist"]);
    }

    // get filled fields
    private function getFilledFields($request,$ignore){
        $data = $request->except($ignore);
        foreach($data as $key=>$value)
        {
            if(is_null($value) || $value == '') unset($data[$key]);
        }
        return $data;
    }
}
