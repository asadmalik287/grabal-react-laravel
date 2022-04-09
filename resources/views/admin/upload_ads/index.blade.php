@extends('layouts.app')
@section('title', 'Service Provider')

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
                        <li class="breadcrumb-item active">Upload ads</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>



    <ul class="nav nav-pills m-t-30 m-b-30 justify-content-end">

        <li class="nav-item">
            <a href="#home" class="nav-link active border all" data-toggle="tab" aria-expanded="false">
                Home page ads
            </a>
        </li>
        <li class="nav-item">
            <a href="#sidebar" class="nav-link border all" data-toggle="tab" aria-expanded="false">
                Sidebar ads
            </a>
        </li>
        <li class=" nav-item">
            <a href="#serviceDetail" class="nav-link border all" data-toggle="tab" aria-expanded="false">
                Service Details ads
            </a>
        </li>
    </ul>


    <div class="row">
        <div class="col-lg-12 pt-0">
            <a type="button" class="btn btn-success text-right" href="{{ url('admin/add_banner') }}">
                Upload new Ad +
            </a>
        </div>
        <div class="col-lg-12 pt-0">
            <div class="card mt-0">
                <div class="tab-content br-n pn">

                    {{-- all tab start --}}
                    <div id="home" class="tab-pane active">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $data = DB::table('upload_ads')->get();
                                    @endphp

                                    <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <td>{{ $key++ }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>
                                                    <img height="100" width="100" src="{{ storage_path('/app/uploads/' . $value->attachment_link) }}"
                                                        alt="">
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    {{-- all tab end --}}

                    {{-- Pending tab start --}}
                    <div id="sidebar" class="tab-pane">

                    </div>
                    {{-- Pending tab end --}}

                    {{-- Approved tab start --}}
                    <div id="serviceDetail" class="tab-pane">

                    </div>
                    {{-- Approved tab end --}}

                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
    </div>





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
        });
    </script>
@endsection
