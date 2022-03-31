
@extends('layouts.app')
@section('title','Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                {{-- <h1>Hello, <span>Welcome Here</span></h1> --}}
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
                    <div class="stat-digit">{{\App\Models\User::where('role_id', 2)->count()}}</div>
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
                    <div class="stat-digit">{{\App\Models\User::where(['role_id'=> 2,'is_verified'=> 1])->count()}}</div>
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
                    <div class="stat-digit">{{\App\Models\User::where(['role_id'=> 2,'is_verified'=> 0])->count()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shadow" style="border-radius: 30px">
    <h5 class="border-bottom pt-4 pb-2 px-3 mb-4">Super Admin - Dashboard</h5>
        <!-- Nav tabs -->
    <div class="vtabs w-100 px-3">
        <ul class="nav nav-tabs tabs-vertical" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home4" role="tab">
                    {{-- <span class="hidden-sm-up"><i class="ti-home"></i></span> --}}
                    <span class="hidden-xs-down">Service Providers</span>
                </a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#profile4" role="tab">
                     {{-- <span class="hidden-sm-up"><i class="ti-user"></i></span> --}}
                      <span class="hidden-xs-down">App Data</span>
                 </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content pb-5 pt-0">

            {{-- 1st Tab start --}}
            <div class="tab-pane active" id="home4" role="tabpanel">
                <div>
                    {{-- <h6 class="bg-primary-50 px-3 py-2 text-dark rounded-4">Top 10 Service Providers (out of {{$allProvidersCount}} Service Providers)</h6> --}}
                    <h6 class="bg-primary-50 px-3 py-2 text-dark rounded-4">Top Service Providers (out of {{$allProvidersCount}} Service Providers)</h6>
                    <div class="table-responsive mt-3 d-flex justify-content-between">
                        <table class="text-center w-75" border="1">
                            @if(count($topServiceProviders) > 0)
                                @foreach($topServiceProviders as $provider)
                                    <tr>
                                        <th><a href="#">{{ $provider["have_provider"]["business_name"] ?? 'N/A'}}</a></th>
                                        <td><a href="#">{{$provider["have_provider"]["services_count"]}} Services</a></td>
                                        <td class="text-center p-2"><a href="#"></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>

                        <table class="text-center" style="width: 23%" border="3">
                            @if(count($topServiceProviders) > 0)
                                @foreach($topServiceProviders as $provider)
                                    <tr> <th><a href="#">{{$provider["reviews_count"]}} Five Stars</a></th> </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>

                    <h6 class="bg-primary-50 px-3 py-2 text-dark rounded-4 mt-4">Top {{count($popularServicesCategoryProviders)}} Services (out of  {{$allServices}} Services)</h6>
                    <div class="table-responsive mt-3">
                        <table class="text-center w-100" border="1">
                            @foreach ($popularServicesCategoryProviders as $singleService)
                                <tr>
                                    <th><a href="#" style="text-transform: capitalize">{{$singleService->subcat->name}}</a></th>
                                    <td><a href="#">{{$singleService->subcat->service_providers_count}} Service Providers</a></td>
                                    <td class="text-center p-2"><a href="#"></a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            {{-- 1st Tab end --}}


            {{-- 2nd Tab start --}}
            <div class="tab-pane" id="profile4" role="tabpanel">
                <h6 class="bg-primary-50 px-3 py-2 text-dark rounded-4">Date: Last month (Drop down handles)</h6>
                <div class="table-responsive mt-3">
                    <table class="text-center w-100" border="1">
                        <tr>
                            <td class="w-75"><a href="#">App Sessions</a></td>
                            <td class="text-center p-2 w-25"><a href="#">10,645</a></td>
                        </tr>
                        <tr>
                            <td class="w-75"><a href="#">Job Requests</a></td>
                            <td class="text-center p-2 w-25"><a href="#">2,243</a></td>
                        </tr>
                        <tr>
                            <td class="w-75"><a href="#">Total number of Registered Customers</a></td>
                            <td class="text-center p-2 w-25"><a href="#">1,654</a></td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive mt-3">
                    <table class="text-center w-100" border="1">
                        <tr>
                            <td class="w-75"><a href="#">Total number of Service Providers</a></td>
                            <td class="text-center p-2 w-25"><a href="#">117</a></td>
                        </tr>
                        <tr>
                            <td class="w-75"><a href="#">Number of Services</a></td>
                            <td class="text-center p-2 w-25"><a href="#">297</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- 2nd Tab end --}}

        </div>
    </div>

    <div class="border-top pt-5 px-3"> <h5 class="fade">Super Admin - Dashboard</h5></div>
</div>

@endsection
