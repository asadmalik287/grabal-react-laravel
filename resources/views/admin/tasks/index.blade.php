@extends('layouts.app')
@section('title', 'Assign Task')

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
                        <li class="breadcrumb-item active">Tasks</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>



    <ul class="nav nav-pills m-t-30 m-b-30 justify-content-end">
        <li class="nav-item">
            <a href="#all" class="nav-link active border all" data-toggle="tab" aria-expanded="false">
                All Tasks
            </a>
        </li>
        <li class="nav-item">
            <a href="#pending" class="nav-link border pending" data-toggle="tab" aria-expanded="false">
                Pending
            </a>
        </li>
        <li class=" nav-item">
            <a href="#approved" class="nav-link border approved" data-toggle="tab" aria-expanded="false">
                Approved
            </a>
        </li>
        <li class="nav-item">
            <a href="#rejected" class="nav-link border rejected" data-toggle="tab" aria-expanded="true">
                Rejected
            </a>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12 pt-0">
            <div class="card mt-0">
                <div class="tab-content br-n pn">

                    {{-- all tab start --}}
                    <div id="all" class="tab-pane active">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cp" data-toggle="modal" data-target="#enquiryModal">
                                            <td>Test</td>
                                            <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Necessitatibus sequi quo voluptatem. Incidunt, odit qui. Beatae
                                                voluptatum aliquam assumenda animi accusamus modi delectus ipsa, maiores
                                                unde aperiam mollitia? Tenetur, distinctio.</td>
                                            <td>Test</td>
                                            <td>
                                                <span class="small text-white bg-success px-2 py-1 rounded">Active</span>
                                            </td>
                                        </tr>

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
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cp" data-toggle="modal" data-target="#enquiryModal">
                                            <td>Test</td>
                                            <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Necessitatibus sequi quo voluptatem. Incidunt, odit qui. Beatae
                                                voluptatum aliquam assumenda animi accusamus modi delectus ipsa, maiores
                                                unde aperiam mollitia? Tenetur, distinctio.</td>
                                            <td>Test</td>
                                            <td>
                                                <span class="small text-white bg-primary px-2 py-1 rounded">Pending</span>
                                            </td>
                                        </tr>

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
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cp" data-toggle="modal" data-target="#enquiryModal">
                                            <td>Test</td>
                                            <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Necessitatibus sequi quo voluptatem. Incidunt, odit qui. Beatae
                                                voluptatum aliquam assumenda animi accusamus modi delectus ipsa, maiores
                                                unde aperiam mollitia? Tenetur, distinctio.</td>
                                            <td>Test</td>
                                            <td>
                                                <span class="small text-white bg-success px-2 py-1 rounded">Active</span>
                                            </td>
                                        </tr>

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
                                <table id="bootstrap-data-table-export3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cp" data-toggle="modal" data-target="#enquiryModal">
                                            <td>Test</td>
                                            <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Necessitatibus sequi quo voluptatem. Incidunt, odit qui. Beatae
                                                voluptatum aliquam assumenda animi accusamus modi delectus ipsa, maiores
                                                unde aperiam mollitia? Tenetur, distinctio.</td>
                                            <td>Test</td>
                                            <td>
                                                <span class="small text-white bg-danger px-2 py-1 rounded">Rejected</span>
                                            </td>
                                        </tr>

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



    <!-- Modal -->
    <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Enquiry Provider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <h6>Customer</h6>
                            <h6 class="mt-3">Message</h5>
                        </div>
                        <div class="col-8">
                            <p>Test</p>
                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur maiores debitis provident quidem animi autem repellendus excepturi earum iste necessitatibus optio veritatis quos sequi, dolores doloremque illum voluptatibus ducimus porro.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Mark as</button>
                </div>
            </div>
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
            $('#bootstrap-data-table-export3_wrapper').addClass('justify-content-between')
        })
    </script>
@endsection
