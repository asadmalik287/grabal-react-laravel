@extends('layouts.app')
@section('title','Sub Category')

@section('style')
<link href="{{asset('assets/admin/css/lib/data-table/buttons.bootstrap.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right"></div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">SubCategory</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<div><h3 class="text-center mb-3">Manage Categories</h3></div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="text-right mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Category </button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addsubCategory">Add Sub category </button>
            </div>
            <div class="bootstrap-data-table-panel">
                <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Title</th>
                                <th>SubCategory Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=> $category)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ucfirst($category->name)}}</td>

                                <td class="{{$category->get_sub_categories}}">

                                    @if ($category->get_sub_categories != '')
                                        <table class="w-100">
                                            @foreach ($category->get_sub_categories as $key=>$subCategory )
                                            <tr class="bg-transparent">
                                                <td>{{++$key}}</td>
                                                <td class="text-left">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            {{ucfirst($subCategory->name)}}
                                                        </div>
                                                        <div>
                                                            <span class="ti-pencil-alt text-primary cp " style="font-size: 15px" data-toggle="modal" data-target=".updatesubCategory" onclick="editResource('{{ route('sub_categories.edit', $subCategory->id) }}','.updateModalsubCategory')"></span>
                                                            <span class="ti-trash text-danger cp mr-2" style="font-size: 18px" onclick="commonFunction(true,'{{ route('sub_categories.destroy',$subCategory->id) }}','{{route('sub_categories.index')}}','delete','Are you sure you want to delete?','');"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>

                                    @else

                                        <table class="w-100">
                                            <tr>
                                                <td>
                                                    <p>No Sub category has been added yet <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsubCategory">Add +</button></p>
                                                </td>
                                            </tr>
                                        </table>

                                    @endif

                                </td>


                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target=".updateCategory" onclick="editResource('{{ route('categories.edit', $category->id) }}','.updateModalCategory')">Update</button>
                                    <button class="btn btn-danger" onclick="commonFunction(true,'{{ route('categories.destroy',$category->id) }}','{{route('sub_categories.index')}}','delete','Are you sure you want to delete?','');">Delete</button>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>




{{-- Add Category Modal Start --}}
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="form-valide" id="create-form">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                    <button type="button" class="close pt-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-5">
                    <div class="form-validation">
                        <div class="form-group row align-items-center">
                            <label class="col-lg-2 col-form-label" for="add-category"> Category <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="add-category" name="name" placeholder="Enter a Category.." />
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-lg-2 col-form-label" for="val-select2">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <select class="js-select2 form-control" id="val-select2" name="status" style="width: 100%;">
                                    <option selected disabled>Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Paused">Paused</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="commonFunction(false,'{{ route('categories.store') }}','{{route('sub_categories.index')}}','post','','create-form');">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Add Category Modal end --}}

{{-- update Category Modal Start --}}
<div class="modal fade updateCategory" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="updateCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content updateModalCategory">

        </div>
    </div>
</div>
{{-- update Category Modal end --}}



{{-- Add subCategory Modal Start --}}
<div class="modal fade" id="addsubCategory" tabindex="-1" role="dialog" aria-labelledby="addsubCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="form-valide" id="create-category">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add subCategory</h5>
                    <button type="button" class="close pt-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-5">
                    <div class="form-validation">
                        <div class="form-group row align-items-center">
                            <label class="col-lg-2 col-form-label" for="val-select2">Category <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <select class="js-select2 form-control" id="val-select2" name="category_id" style="width: 100%;">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $key=> $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-lg-2 col-form-label" for="add-subCategory"> SubCategory <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="add-subCategory" name="name" placeholder="Enter a SubCategory.." />
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-lg-2 col-form-label" for="val-select2">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <select class="js-select2 form-control" id="val-select2" name="status" style="width: 100%;">
                                    <option selected disabled>Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Paused">Paused</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="commonFunction(false,'{{ route('sub_categories.store') }}','{{route('sub_categories.index')}}','post','','create-category');">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Add subCategory Modal end --}}

{{-- update subCategory Modal Start --}}
<div class="modal fade updatesubCategory" id="updatesubCategory" tabindex="-1" role="dialog" aria-labelledby="updatesubCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content updateModalsubCategory">

        </div>
    </div>
</div>
{{-- update subCategory Modal end --}}





@endsection


@section('script')
<script src="{{ asset('assets/admin/js/lib/form-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/lib/form-validation/jquery.validate-init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/datatables-init.js') }}"></script>
@endsection
