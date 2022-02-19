
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Hello, <span>Welcome Here</span></h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>


<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Users</div>
                    <div class="stat-digit">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-id-badge color-success border-success"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Active Users</div>
                    <div class="stat-digit">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-alert color-danger border-danger"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Unverified</div>
                    <div class="stat-digit">0</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
