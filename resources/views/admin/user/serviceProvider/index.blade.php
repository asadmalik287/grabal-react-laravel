@extends('layouts.app')
@section('title','Service Provider')

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
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<div><h3 class="text-center mb-3">All Service Provider</h3></div>


<ul class="nav nav-pills m-t-30 m-b-30 justify-content-end">
    <li class=" nav-item"> <a href="#approved" class="nav-link border active approved" data-toggle="tab" aria-expanded="false">Approved</a> </li>
    <li class="nav-item"> <a href="#pending" class="nav-link border pending" data-toggle="tab" aria-expanded="false">Pending</a> </li>
    <li class="nav-item"> <a href="#rejected" class="nav-link border rejected" data-toggle="tab" aria-expanded="true">Rejected</a> </li>
</ul>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
                <div class="tab-content br-n pn">

                    {{-- Approved tab start --}}
                    <div id="approved" class="tab-pane active">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Test user</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="{{url('admin/services')}}">
                                                    <button class="btn btn-info btn-sm">View</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Approved tab end --}}

                    {{-- Pending tab start --}}
                    <div id="pending" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {{-- Pending tab end --}}

                {{-- Rejected tab start --}}
                    <div id="rejected" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Rejected tab end --}}

            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
</div>





@endsection


@section('script')
{{-- <script src="{{ asset('assets/admin/js/lib/form-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/lib/form-validation/jquery.validate-init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lib/data-table/datatables-init.js') }}"></script> --}}
@endsection
