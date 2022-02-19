<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\SubCategories;
use Validator;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Categories::with('get_sub_categories')->get();
        return view('admin.manage_categories.sub_categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.manage_categories.sub_categories.create');
    }



    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required || unique:sub_categories',
            'status'=>'required'
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $sub_category = new SubCategories();
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->status = $request->status;
        $sub_category->save();
        return response()->json(['success' => true, 'message' =>'Subcategory has been added successfully']);
    }
}
