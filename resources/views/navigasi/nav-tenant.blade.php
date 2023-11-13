@section('sidebar')
    {{-- @if ($tenant) --}}
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
                <a href="{{ route('profile.tenant.index') }}" class="nav-link flex-column">
                    <div class="nav-profile-image">
                        <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                        {{-- @if ($tenant->logo)
                                <img src="{{ public_path('/' . $tenant->logo) }}" alt={{ $tenant->logo }}>
                                @else
                                <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                            @endif --}}
                    </div>
                    <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                        <span class="font-weight-semibold mb-1 mt-2 text-center">
                            {{ Auth::guard('tenant')->user()->name }} </span>
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
                <a class="nav-link" href="{{ route('home.tenants') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-account-edit menu-icon"></i>
                    <span class="menu-title">Registrasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.registration') }}">Daftar Kartu Tenant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.validation') }}">Validasi Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.print') }}">Print Data</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('informasi-kartu') ? 'active' : '' }}" href="/informasi-kartu">
                    <i class="mdi mdi-card-bulleted menu-icon"></i>
                    <span class="menu-title">Informasi Kartu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tenants.terms') }}">
                    <i class="mdi mdi-alert-circle menu-icon"></i>
                    <span class="menu-title">Syarat & Ketentuan</span>
                </a>
            </li>
        </ul>
    </nav>
    {{-- @else
        <tr>
            <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
        </tr>
    @endif --}}
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
                        <i class="mdi mdi-logout menu-icon pr-2"></i>
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
