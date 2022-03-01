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
        $categories = Categories::all();
        $subCategories = SubCategories::all();
        return view('admin.manage_categories.sub_categories.index', compact('categories','subCategories'));
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


    public function edit($id)
    {
        $categories = Categories::with('get_sub_categories')->get();
        $sub_category = SubCategories::where('id',$id)->first();
        return view('admin.manage_categories.sub_categories.edit',compact('sub_category','categories'))->render();
    }

    public function update(Request $request, $id)
    {
        $validations = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required || unique:sub_categories,name,'.$id,
            'status'=>'required',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $sub_category = SubCategories::find($id);
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->status = $request->status;
        if($sub_category->save()){
            return response()->json(['success' => true, 'message' =>'Sub Category has been updated successfully']);
        }
    }


    public function destroy($id)
    {
        if(SubCategories::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Sub Category been deleted successfully']);
        }
    }
}
