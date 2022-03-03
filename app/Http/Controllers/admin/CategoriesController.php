<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.manage_categories.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_categories.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'name' => 'required || unique:categories',
            'status' => 'required',
        ]);

        if ($validations->fails()) {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $category = new Categories();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return response()->json(['success' => true, 'message' => 'Category has been added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::where('id', $id)->first();
        return view('admin.manage_categories.categories.edit', compact('category'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validations = Validator::make($request->all(), [
            'name' => 'required || unique:categories,name,' . $id,
            'status' => 'required',
        ]);

        if ($validations->fails()) {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $category = Categories::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        if ($category->save()) {
            return response()->json(['success' => true, 'message' => 'Category has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Categories::where('id', $id)->whereHas('get_sub_categories')->exists()) {
            if (Categories::where('id', $id)->delete()) {
                return response()->json(['success' => true, 'message' => 'Category been deleted successfully']);
            }
        } else {
            return response()->json(['success' => false, 'redirect' => false, 'message' => 'Please delete Sub Category first ']);
        }

    }
    public function viewCategoriesTable()
    {
        $category = Categories::all();
        return Datatables::of($category)
            ->addColumn('title', function ($category) {
                return $category->name;
            })
            ->addColumn('status', function ($category) {
                return $category->status;
            })
            ->addColumn('action', function ($category) {

                $b = '';
                //$this->authorize('option-status');
                $b = '<button onclick="change_status(this);" data-status="' . $category->status . '" data-id="' . $category->id . '" class="btn btn-primary border-0"  >Update </button>';
                //$this->authorize('delete-option');
                $route = Route("home");
                $function = 'delete_data(this,"' . $route . '")';
                $b .= '<button onclick=' . $function . '  data-id="' . $category->id . '" class="bg-transparent text-danger border-0">Delete</button>';
                return $b;
            })
            ->rawColumns(['title', 'status', 'action'])
            ->make(true);
    }
}
