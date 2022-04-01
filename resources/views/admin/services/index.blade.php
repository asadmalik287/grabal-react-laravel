@extends('layouts.app')
@section('title', 'Services')

@section('style')
    <link href="{{ asset('assets/admin/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        .table thead,
        .table tr {
            text-align: center;
        }

        .sellerLink {
            color: rgb(54, 54, 214)
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
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Services</li>
                        @if ($seller != null)
                            <li class="breadcrumb-item active"> {{ $seller->business_name }}</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>



    <div>
        <h3 class="text-center mb-3">
            {{-- All Services --}}
            {{ $seller == null ? 'All Services' : 'List of Services By ' . $seller->business_name }}
        </h3>
    </div>



    <ul class="nav nav-pills m-t-30 m-b-30 justify-content-end">
        <li class="nav-item"> <a href="#all" class="nav-link border active all" data-toggle="tab"
                aria-expanded="false">All Services</a> </li>
        <li class="nav-item"> <a href="#pending" class="nav-link border pending" data-toggle="tab"
                aria-expanded="false">Pending</a> </li>
        <li class=" nav-item"> <a href="#approved" class="nav-link border approved" data-toggle="tab"
                aria-expanded="false">Approved</a> </li>
        <li class="nav-item"> <a href="#rejected" class="nav-link border rejected" data-toggle="tab"
                aria-expanded="true">Rejected</a> </li>
    </ul>

    <div class="row p-0">
        <div class="col-lg-12 pb-0">
            {{-- <div class="card mb-0"> --}}
            <table id="" class="table table-striped table-bordered">

                <tbody>
                    <tr class="bg-transparent">
                        <td style="width: 5%;"></td>
                        <td>
                            <div class="d-flex  justify-content-between">
                                <h5 class="text-left">
                                    {{ $seller == null ? 'View All Services' : 'Services By ' . $seller->business_name }}

                                </h5>
                                {{-- <button class="btn btn-success text-right" data-toggle="modal"
                                data-target="#addsubCategory">Add
                                new +</button> --}}
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
                <div class="tab-content br-n pn">

                    {{-- all tab start --}}
                    <div id="all" class="tab-pane active">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Business Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allServices as $key => $allService)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="wsnw">
                                                    <img src="{{ $allService->main_service_image }}" alt="{{ $allService->title }}" width="150" height="80">
                                                </td>
                                                <td class="wsnw">{{ $allService->title }}</td>
                                                <td class="wsnw">{{ $allService->hasCategory->name }}</td>
                                                <td class="wsnw">{{ $allService->subcat->name }}</td>
                                                <td class="wsnw"> <a class="sellerLink"
                                                        href="{{ url('admin/serviceProviders') }}?id={{ $allService->haveProvider['id'] }}">
                                                        <u> {{ $allService->haveProvider->business_name }} </u>
                                                    </a></td>
                                                <td>
                                                    <div class="serviceDescription">{{ $allService->description }}
                                                    </div>
                                                </td>
                                                <td class="wsnw {{ ($allService->status == 'approved' ? 'text-success' : '')}}" style="text-transform: capitalize">{{ $allService->status}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                                        onclick="updateService(this,'view', '{{ route('admin.services.update') }}', '{{ $allService->id }}', 'GET')"
                                                        data-target="#viewServices">View</button>
                                                    <button class="btn btn-sm btn-success" type="button"
                                                        onclick="updateService(this,'approve', '{{ route('admin.services.update') }}', '{{ $allService->id }}', 'POST')">Approve</button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="updateService(this,'reject', '{{ route('admin.services.update') }}', '{{ $allService->id }}', 'POST')">Reject</button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- all tab end --}}

                    {{-- Pending tab start --}}
                    <div id="pending" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Business Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendingServices as $key => $pendingService)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="wsnw">{{ $pendingService->title }}</td>
                                                <td class="wsnw">{{ $pendingService->hasCategory->name }}</td>
                                                <td class="wsnw">{{ $pendingService->subcat->name }}
                                                </td>
                                                <td class="wsnw"> <a class="sellerLink"
                                                        href="{{ url('admin/serviceProviders') }}?id={{ $pendingService->haveProvider['id'] }}">
                                                        <u> {{ $pendingService->haveProvider->business_name }} </u>
                                                    </a></td>
                                                <td>
                                                    <div class="serviceDescription">{{ $pendingService->description }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                                        onclick="updateService(this,'view', '{{ route('admin.services.update') }}', '{{ $pendingService->id }}', 'GET')"
                                                        data-target="#viewServices">View</button>
                                                    <button class="btn btn-sm btn-success" type="button"
                                                        onclick="updateService(this,'approve', '{{ route('admin.services.update') }}', '{{ $pendingService->id }}', 'POST')">Approve</button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="updateService(this,'reject', '{{ route('admin.services.update') }}', '{{ $pendingService->id }}', 'POST')">Reject</button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Pending tab end --}}

                    {{-- Approved tab start --}}
                    <div id="approved" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Business Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($approvedServices as $key => $approvedService)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="wsnw">{{ $approvedService->title }}</td>
                                                <td class="wsnw">{{ $approvedService->hasCategory->name }}</td>
                                                <td class="wsnw">{{ $approvedService->subcat->name }}
                                                </td>
                                                <td class="wsnw">
                                                    <a class="sellerLink"
                                                        href="{{ url('admin/serviceProviders') }}?id={{ $approvedService->haveProvider['id'] }}">
                                                        <u> {{ $approvedService->haveProvider->business_name }} </u>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="serviceDescription">{{ $approvedService->description }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                                        onclick="updateService(this,'view' ,'{{ route('admin.services.update') }}', '{{ $approvedService->id }}', 'POST')"
                                                        data-target="#viewServices">View</button>
                                                    <button class="btn btn-sm btn-danger" type="button"
                                                        onclick="updateService(this,'reject' ,'{{ route('admin.services.update') }}', '{{ $approvedService->id }}', 'POST')">Disapprove</button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Approved tab end --}}

                    {{-- Rejected tab start --}}
                    <div id="rejected" class="tab-pane">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sub-category</th>
                                            <th>Business Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rejectedServices as $key => $rejectedService)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="wsnw">{{ $rejectedService->title }}</td>
                                                <td class="wsnw">{{ $rejectedService->hasCategory->name }}</td>
                                                <td class="wsnw">{{ $rejectedService->subcat->name }}
                                                </td>
                                                <td class="wsnw">
                                                    <a class="sellerLink"
                                                        href="{{ url('admin/serviceProviders') }}?id={{ $rejectedService->haveProvider->id }}">
                                                        <u> {{ $rejectedService->haveProvider->business_name }} </u>
                                                    </a>

                                                </td>
                                                <td>
                                                    <div class="serviceDescription">{{ $rejectedService->description }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                                        onclick="updateService(this,'view', '{{ route('admin.services.update') }}', '{{ $rejectedService->id }}', 'POST')"
                                                        data-target="#viewServices">View</button>
                                                    <button class="btn btn-sm btn-success" type="button"
                                                        onclick="updateService(this,'approve', '{{ route('admin.services.update') }}', '{{ $rejectedService->id }}', 'POST')">Approve</button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="updateService(this,'delete', '{{ route('admin.services.update') }}', '{{ $rejectedService->id }}', 'POST')">Delete</button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse


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





    {{-- Add Category Modal Start --}}
    <div class="modal fade" id="viewServices" tabindex="-1" role="dialog" aria-labelledby="viewServicesTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" id="viewServiceModal_div">


            </div>
        </div>
    </div>
    </div>
    {{-- Add Category Modal end --}}



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

        function updateService(elem, action, targetUrl, id, method) {
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
                        title: 'Do you want to ' + action + ' this service?',
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
                    } else if (data.success != false && data.success != true) {
                        $('#viewServiceModal_div').html('');
                        $('#viewServiceModal_div').html(data);
                    }
                },
            });
        }
    </script>
@endsection
