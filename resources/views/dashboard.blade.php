@include('layouts.header')

<div class="wrapper">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            @include('layouts.navigation')
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Dashboard</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="{{ url('dashboard') }}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="fa-solid fa-chevron-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>

        {{-- @include('layouts.copyright') --}}
    </div>

    {{-- @include('layouts.custom_color') --}}
</div>

@include('layouts.footer')
