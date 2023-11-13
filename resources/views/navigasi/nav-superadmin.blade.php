@section('sidebar')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
                <a href="#" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="{{ asset('assets/images/faces-clipart/pic-1.png') }}" alt="profile" />
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                        <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->name }}</span>
                    </div>
                </a>
            </li>
            <li class="nav-item pt-3">
                <form class="d-flex align-items-center" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search" />
                    </div>
                </form>
            </li>
            <li class="pt-2 pb-1">
                <span class="nav-item-head">Menu Navigasi</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.admins') }}">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admins.registration') }}">
                    <i class="mdi mdi-account-key menu-icon"></i>
                    <span class="menu-title">Data Registrasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admins.validation') }}">
                    <i class="mdi mdi-account-check menu-icon"></i>
                    <span class="menu-title">Data Tervalidasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">Tenant</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admins.tenants.account') }}">Data Tenant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data.tenant.members') }}">Anggota Tenant</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('superadmin.admin.account') }}">
                    <i class="mdi mdi-account-star menu-icon"></i>
                    <span class="menu-title">Data Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('background.card.change') }}">
                    <i class="mdi mdi mdi-cards menu-icon"></i>
                    <span class="menu-title">Background Card Change</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection

@section('navbar')
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>

            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="/logout">
                        <i class="mdi mdi-logout-variant menu-icon pr-2"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
@endsection
