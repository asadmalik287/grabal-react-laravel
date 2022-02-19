<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <div class="dropdown dib menuCustom">
                        <div class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar" onclick="btnToggle('any')">
                                {{ \Auth::user()->name }}
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right" id="Dropdown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-lock"></i>
                                                <span>Lock Screen</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/logout') }}">
                                                <i class="ti-power-off"></i>
                                                <div class="d-inline">Logout</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
