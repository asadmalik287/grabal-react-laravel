<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{url('admin/home')}}">
                        <img src="{{ asset('assets/admin/images/logo.png')}}" alt="" width="120" />
                    </a>
                </div>
                <li class="label">Main</li>
                <li class="@if (Request::is('admin/home')) active @endif">
                    <a href="{{url('admin/home')}}"><i class="ti-dashboard"></i> Dashboard </a>
                </li>


                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-vector"></i> Manage Categories<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class="@if (Request::is('admin/categories')) active @endif"><a href="{{url('admin/categories')}}"> Categories</a></li>
                        <li class="@if (Request::is('admin/sub-categories')) active @endif"><a href="{{url('admin/sub-categories')}}"> Sub Categories</a></li>
                    </ul>
                </li>

                <li class="@if (Request::is('admin/services')) active @endif">
                    <a href="{{url('admin/services')}}"><i class="ti-home"></i>Services </a>
                </li>

                <li class="@if (Request::is('admin/serviceProviders')) active @endif">
                    <a href="{{url('admin/serviceProviders')}}"><i class="ti-home"></i>Service Providers</a>
                </li>

                <li class="@if (Request::is('admin/assign_task')) active @endif">
                    <a href="{{url('admin/assign_task')}}"><i class="ti-medall-alt"></i>Assign Tasks</a>
                </li>

                <li class="@if (Request::is('admin/upload_ads')) active @endif">
                    <a href="{{url('admin/upload_ads')}}"><i class="ti-upload"></i>Upload Ads</a>
                </li>


                {{-- <li>
                    <a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="gmaps.html">Basic</a></li>
                        <li><a href="vector-map.html">Vector Map</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="{{ url('admin/logout') }}"> <i class="ti-arrow-left"></i> Logout </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
