@extends('layouts.app')
@section('title', 'Categories')

@section('style')
    <link href="{{ asset('assets/admin/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right"></div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>

    <div>
        <h3 class="text-center mb-3">All Categories</h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="text-right mb-4"><button class="btn btn-primary" data-toggle="modal"
                        data-target="#addCategory">Add new +</button></div>
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Category Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ucfirst($category->name)}}</td>
                                <td>{{ucfirst( $category->status)}}</td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target=".updateCategory" onclick="editResource('{{ route('categories.edit', $category->id) }}','.updateModalCategory')">Update</button>
                                    <button class="btn btn-danger" onclick="commonFunction(true,'{{ route('categories.destroy',$category->id) }}','{{route('categories.index')}}','delete','Are you sure you want to delete?','');">Delete</button>
                                </td>
                            </tr>

                            @endforeach --}}
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
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle"
        aria-hidden="true">
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
                                <label class="col-lg-2 col-form-label" for="add-category"> Category <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="add-category" name="name"
                                        placeholder="Enter a Category.." />
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
                            onclick="commonFunction(false,'{{ route('categories.store') }}','{{ route('categories.index') }}','post','','create-form');">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add Category Modal end --}}

    {{-- update Category Modal Start --}}
    <div class="modal fade updateCategory" id="updateCategory" tabindex="-1" role="dialog"
        aria-labelledby="updateCategoryTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content updateModalCategory">

            </div>
        </div>
    </div>
    {{-- update Category Modal end --}}





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
            load_datatable()
            // appendJdlOptions()
        })
        function load_datatable() {
            var option_table = $('#bootstrap-data-table-export').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('view-categories-table') }}",
                    type: "GET",
                },
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ]
            });
        }
    </script>
@endsection
