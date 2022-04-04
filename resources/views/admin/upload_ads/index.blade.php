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
            <a href="#all" class="nav-link active border all" data-toggle="tab" aria-expanded="false">
                Home page ads
            </a>
        </li>
        <li class="nav-item">
            <a href="#pending" class="nav-link border all" data-toggle="tab" aria-expanded="false">
                Sidebar ads
            </a>
        </li>
        <li class=" nav-item">
            <a href="#approved" class="nav-link border all" data-toggle="tab" aria-expanded="false">
                Service Details ads
            </a>
        </li>
    </ul>


    <div class="row">
        <div class="col-lg-12 pt-0">
            <div class="card mt-0">
                <div class="tab-content br-n pn">

                    {{-- all tab start --}}
                    <div id="all" class="tab-pane active">

                    </div>
                    {{-- all tab end --}}

                    {{-- Pending tab start --}}
                    <div id="pending" class="tab-pane">

                    </div>
                    {{-- Pending tab end --}}

                    {{-- Approved tab start --}}
                    <div id="approved" class="tab-pane">

                    </div>
                    {{-- Approved tab end --}}

                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
    </div>





@endsection

