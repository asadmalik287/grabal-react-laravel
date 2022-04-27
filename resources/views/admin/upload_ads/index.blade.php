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
                                        $data = DB::table('upload_ads')
                                            ->where('page', 'home')
                                            ->get();
                                    @endphp

                                    <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>
                                                    <img height="100" width="300"
                                                        src="{{ $value->attachment_link}}" alt="">
                                                </td>
                                                <td>
                                                    {{-- <div class="d-flex flex-nowrap"> --}}
                                                    <a type="button" class="btn btn-sm btn-info"
                                                        href="{{ url('admin/add_banner') }}?id={{ $value->id }}">Update</a>

                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="changeStatus(this,'delete', '{{ route('ads.destroy', $value->id) }}', '{{ $value->id }}', 'DELETE')">Delete</button>
                                                    {{-- </div> --}}
                                                </td>
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
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $data = DB::table('upload_ads')
                                            ->where('page', 'sidebar')
                                            ->get();
                                    @endphp

                                    <tbody>
                                        @foreach ($data as $keys => $value1)
                                            <tr>
                                                <td>{{ $keys + 1 }}</td>
                                                <td>{{ $value1->title }}</td>
                                                <td>
                                                    <img height="300" width="200"
                                                        src="{{ $value1->attachment_link}}" alt="">
                                                </td>
                                                <td>
                                                    {{-- <div class="d-flex flex-nowrap"> --}}
                                                    <a type="button" class="btn btn-sm btn-info"
                                                        href="{{ url('admin/add_banner') }}?id={{ $value1->id }}">Update</a>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="changeStatus(this,'delete', '{{ route('ads.destroy', $value1->id) }}', '{{ $value1->id }}', 'DELETE')">Delete</button>
                                                    {{-- </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Pending tab end --}}

                    {{-- Approved tab start --}}
                    <div id="serviceDetail" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $data = DB::table('upload_ads')
                                            ->where('page', 'serviceDetail')
                                            ->get();
                                    @endphp

                                    <tbody>
                                        @foreach ($data as $keyss => $value2)
                                            <tr>
                                                <td>{{ $keyss + 1 }}</td>
                                                <td>{{ $value2->title }}</td>
                                                <td>
                                                    <img height="300" width="150"
                                                        src="{{ $value2->attachment_link}}" alt="">
                                                </td>
                                                <td>
                                                    {{-- <div class="d-flex flex-nowrap"> --}}
                                                    <a type="button" class="btn btn-sm btn-info"
                                                        href="{{ url('admin/add_banner') }}?id={{ $value2->id }}">Update</a>

                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="changeStatus(this,'delete', '{{ route('ads.destroy', $value2->id) }}', '{{ $value2->id }}', 'DELETE')">Delete</button>
                                                    {{-- </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            $('#bootstrap-data-table-export1_wrapper').addClass('justify-content-between')
            $('#bootstrap-data-table-export2_wrapper').addClass('justify-content-between')
        });

        function changeStatus(elem, action, targetUrl, id, method) {
            $('#viewServiceModal_div').html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (action == 'view') {
                serviceCommonAjax(targetUrl, method, id, action)
            } else {
                swal({
                        title: 'Do you want to ' + action + ' this Ad?',
                        text: "Changes will be saved immediately!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            serviceCommonAjax(targetUrl, method, id, action)
                        } else {
                            swal("Change is reverted!");
                            return false;
                        }
                    });
            }

        }

        function serviceCommonAjax(targetUrl, method, id, action) {
            $.ajax({
                url: targetUrl,
                type: method,
                data: {
                    id: id,
                    action: action
                },
                success: function(data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {
                            window.location.reload();
                        });
                    } else if (data.success == false) {
                        swal({
                            icon: "error",
                            text: "Action Failed due to some Error!",
                            type: "error",
                        });
                    } else {
                        return false;
                    }
                },
            });
        }
    </script>
@endsection
