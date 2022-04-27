@extends('layouts.app')
@section('title', 'Sub Category')

@section('style')
    <link href="{{ asset('assets/admin/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        .table thead,
        .table tr {
            text-align: center;
        }

    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right"></div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"> <u>Dashboard</u></a></li>
                        <li class="breadcrumb-item active"><u>SubCategory</u> </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>

    <div>
        <h3 class="text-center mb-3"> Sub Categories</h3>
    </div>

    <div class="row p-0">
        <div class="col-lg-12 pb-0">
            {{-- <div class="card mb-0"> --}}
            <table id="" class="table table-striped table-bordered">

                <tbody>
                    <tr class="bg-transparent">
                        <td style="width: 5%;"></td>
                        <td>
                            <div class="d-flex  justify-content-between">
                                <h5 class="text-left"> View Sub Categories</h5>
                                <button class="btn btn-success text-right" data-toggle="modal"
                                    data-target="#addsubCategory">Add
                                    new +</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- </div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 pt-0">
            <div class="card mt-0">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Sub Category </th>
                                    <th>Category </th>
                                    <th>Status</th>
                                    <th style="width:20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $key => $subCategory)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="">{{ ucfirst($subCategory->name) }}</td>
                                        <td>{{ $subCategory->get_category->name }}</td>
                                        <td class="">{{ ucfirst($subCategory->status) }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-toggle="modal"
                                                data-target=".updatesubCategory"
                                                onclick="editResource('{{ route('sub-categories.edit', $subCategory->id) }}','.updateModalsubCategory')">Update</button>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="commonFunction(true,'{{ route('sub-categories.destroy', $subCategory->id) }}','{{ route('sub-categories.index') }}','delete','Are you sure you want to delete?','');">Delete</button>
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




    {{-- Add subCategory Modal Start --}}
    <div class="modal fade" id="addsubCategory" tabindex="-1" role="dialog" aria-labelledby="addsubCategoryTitle"
        aria-hidden="true">
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
                                <label class="col-lg-2 col-form-label" for="val-select2">Category <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="js-select2 form-control" id="val-select2" name="category_id"
                                        style="width: 100%;">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-lg-2 col-form-label" for="add-subCategory"> SubCategory <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="add-subCategory" name="name"
                                        placeholder="Enter a SubCategory.." />
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-lg-2 col-form-label" for="val-select2">Status <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select class="js-select2 form-control" id="val-select2" name="status"
                                        style="width: 100%;">
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
                        <button type="button" class="btn btn-success"
                            onclick="commonFunction(false,'{{ route('sub-categories.store') }}','{{ route('sub-categories.index') }}','post','','create-category');">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add subCategory Modal end --}}

    {{-- update subCategory Modal Start --}}
    <div class="modal fade updatesubCategory" id="updatesubCategory" tabindex="-1" role="dialog"
        aria-labelledby="updatesubCategoryTitle" aria-hidden="true">
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
    <script>
        $(document).ready(function() {
            $('#bootstrap-data-table-export_wrapper').addClass('justify-content-between')
        })
    </script>
@endsection
