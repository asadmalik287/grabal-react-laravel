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

        $subCategory = SubCategory::find($request->)
    }
}
