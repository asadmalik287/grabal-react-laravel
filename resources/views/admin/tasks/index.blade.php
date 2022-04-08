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
                Completed
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $key=>$value)
                                            <tr onclick="openModal(this)">
                                                <td>{{ $value->provider }}</td>
                                                <td class="w-50 message"> {{ $value->message }}</td>
                                                <td class="username">
                                                    {{ App\Models\User::where('id', $value->User_id)->first()->name }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="small text-white {{ ($value->status == 'completed' ? 'bg-success' : $value->status == 'pending') ? 'bg-primary' : 'bg-danger' }} px-2 py-1 rounded">{{ $value->status }}</span>
                                                </td>
                                                <td> <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                        class="cp" data-toggle="modal"
                                                        data-target="#enquiryModal"></i> </td>
                                                {{-- <td>
                                                    @if ($value->status == 'pending')
                                                        <i class="ti ti-check border rounded mr-1"
                                                            style="color:rgb(23, 241, 121)"
                                                            onclick="changeStatus('{{ route('changeTaskStatus') }}','accept' , '{{ $value->task_id }}' )"></i>
                                                        <i class="ti ti-close border rounded mr-1"
                                                            style="color:rgb(218, 0, 18)"
                                                            onclick="changeStatus('{{ route('changeTaskStatus') }}','reject' , '{{ $value->task_id }}' )"></i>
                                                    @endif
                                                  
                                                    {{-- <button class="btn btn-sm bg-success"
                                                   >Mark
                                                    as Complete</button> --}}

                                                {{-- <button class="btn btn-sm bg-danger"
                                                    onclick="changeStatus('{{ route('changeTaskStatus') }}','reject', '{{ $value->task_id }}' )">Decline
                                                    Offer</button> --}}
                                                {{-- <button  class="small text-white bg-success px-2 py-1 rounded">Complete</button> --}}
                                                {{-- </td> --}}
                                            </tr>
                                        @empty
                                            <p>No data Found</p>
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
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $key=>$value)
                                            @if ($value->status == 'pending')
                                                <tr onclick="openModal(this)">
                                                    <td>{{ $value->provider }}</td>
                                                    <td class="w-50 message"> {{ $value->message }}</td>
                                                    <td class="username">
                                                        {{ App\Models\User::where('id', $value->User_id)->first()->name }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="small text-white {{ ($value->status == 'completed' ? 'bg-success' : $value->status == 'pending') ? 'bg-primary' : 'bg-danger' }} px-2 py-1 rounded">{{ $value->status }}</span>

                                                    </td>
                                                    <td> <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                        class="cp" data-toggle="modal"
                                                        data-target="#enquiryModal"></i> </td>
                                                    {{-- <td>
                                                        @if ($value->status == 'pending')
                                                            <i class="ti ti-check border rounded mr-1"
                                                                style="color:rgb(23, 241, 121)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','accept' , '{{ $value->task_id }}' )"></i>
                                                            <i class="ti ti-close border rounded mr-1"
                                                                style="color:rgb(218, 0, 18)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','reject' , '{{ $value->task_id }}' )"></i>
                                                        @endif
                                                        <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                            class="cp" data-toggle="modal"
                                                            data-target="#enquiryModal"></i> --}}
                                                    {{-- <button class="btn btn-sm bg-success"
                                                       >Mark
                                                        as Complete</button> --}}

                                                    {{-- <button class="btn btn-sm bg-danger"
                                                        onclick="changeStatus('{{ route('changeTaskStatus') }}','reject', '{{ $value->task_id }}' )">Decline
                                                        Offer</button> --}}
                                                    {{-- <button  class="small text-white bg-success px-2 py-1 rounded">Complete</button> --}}
                                                    {{-- </td> --}}
                                                </tr>
                                            @endif

                                        @empty
                                            <p>No Pending Job</p>
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
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $key=>$value)
                                            @if ($value->status == 'completed')
                                                <tr onclick="openModal(this)">
                                                    <td>{{ $value->provider }}</td>
                                                    <td class="w-50 message"> {{ $value->message }}</td>
                                                    <td class="username">
                                                        {{ App\Models\User::where('id', $value->User_id)->first()->name }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="small text-white bg-success px-2 py-1 rounded">{{ $value->status }}</span>
                                                    </td>
                                                    <td> <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                        class="cp" data-toggle="modal"
                                                        data-target="#enquiryModal"></i> </td>
                                                    {{-- <td>
                                                        @if ($value->status == 'pending')
                                                            <i class="ti ti-check border rounded mr-1"
                                                                style="color:rgb(23, 241, 121)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','accept' , '{{ $value->task_id }}' )"></i>
                                                            <i class="ti ti-close border rounded mr-1"
                                                                style="color:rgb(218, 0, 18)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','reject' , '{{ $value->task_id }}' )"></i>
                                                        @endif
                                                        <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                            class="cp" data-toggle="modal"
                                                            data-target="#enquiryModal"></i> --}}
                                                    {{-- <button class="btn btn-sm bg-success"
                                                       >Mark
                                                        as Complete</button> --}}

                                                    {{-- <button class="btn btn-sm bg-danger"
                                                        onclick="changeStatus('{{ route('changeTaskStatus') }}','reject', '{{ $value->task_id }}' )">Decline
                                                        Offer</button> --}}
                                                    {{-- <button  class="small text-white bg-success px-2 py-1 rounded">Complete</button> --}}
                                                    {{-- </td> --}}
                                                </tr>
                                            @endif

                                        @empty
                                            <p>No Pending Job</p>
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
                                <table id="bootstrap-data-table-export3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Provider</th>
                                            <th>Message</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $key=>$value)
                                            @if ($value->status == 'rejected')
                                                <tr onclick="openModal(this)">
                                                    <td>{{ $value->provider }}</td>
                                                    <td class="w-50 message"> {{ $value->message }}</td>
                                                    <td class="username">
                                                        {{ App\Models\User::where('id', $value->User_id)->first()->name }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="small text-white {{ $value->status == 'completed' ? 'bg-success' : 'bg-danger' }} px-2 py-1 rounded">{{ $value->status }}</span>

                                                    </td>
                                                    <td>
                                                        <td> <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                            class="cp" data-toggle="modal"
                                                            data-target="#enquiryModal"></i> </td>
                                                        {{-- @if ($value->status == 'pending')
                                                            <i class="ti ti-check border rounded mr-1"
                                                                style="color:rgb(23, 241, 121)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','accept' , '{{ $value->task_id }}' )"></i>
                                                            <i class="ti ti-close border rounded mr-1"
                                                                style="color:rgb(218, 0, 18)"
                                                                onclick="changeStatus('{{ route('changeTaskStatus') }}','reject' , '{{ $value->task_id }}' )"></i>
                                                        @endif
                                                        <i class="ti ti-eye border rounded" style="color:rgb(0, 0, 0)"
                                                            class="cp" data-toggle="modal"
                                                            data-target="#enquiryModal"></i> --}} --}}
                                                        {{-- <button class="btn btn-sm bg-success"
                                                       >Mark
                                                        as Complete</button> --}}

                                                        {{-- <button class="btn btn-sm bg-danger"
                                                        onclick="changeStatus('{{ route('changeTaskStatus') }}','reject', '{{ $value->task_id }}' )">Decline
                                                        Offer</button> --}}
                                                        {{-- <button  class="small text-white bg-success px-2 py-1 rounded">Complete</button> --}}
                                                    </td>
                                                </tr>
                                            @endif

                                        @empty
                                            <p>No Pending Job</p>
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



    <!-- Modal -->
    <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Enquiry Detail</h5>
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
                            <p id="customerName"></p>
                            <p class="mt-3" id="customerMessage"></p>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Mark as</button>
                </div> --}}
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

        function openModal(elem) {
            console.log(elem)
            message = $(elem).find('.message').text()
            name = $(elem).find('.username').text()
            console.log('name is ' + name + 'message is ' + message)
            $('#customerMessage').text(message)
            $('#customerName').text(name)

        }

        function changeStatus(route, action, id) {
            $('#enquiryModal').modal('hide')
            swal({
                    title: 'Do you want to ' + action + ' this offer?',
                    text: "Changes will be saved immediately!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        changeStatusAjax(route, action, id)
                    } else {
                        swal("Change is reverted!");
                        return false;
                    }
                });
        }

        function changeStatusAjax(route, action, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: route,
                type: 'post',
                data: {
                    id: id,
                    action: action,
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
