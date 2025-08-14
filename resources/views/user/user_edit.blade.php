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
                <div class="page-header">
                    <h3 class="fw-bold mb-3">User Edit</h3>
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
                        <li class="separator">
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">User Edit</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('user_update', $user->id) }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">User Edit</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $user->name }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" value="{{ $user->email }}"
                                                    value="{{ old('email') }}" required />

                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="" disabled {{ $user->type ? '' : 'selected' }}>
                                                        Select Choose Type</option>
                                                    <option value="Admin1"
                                                        {{ $user->type == 'Admin1' ? 'selected' : '' }}>Admin1</option>
                                                    <option value="Admin2"
                                                        {{ $user->type == 'Admin2' ? 'selected' : '' }}>Admin2</option>
                                                    <option value="Admin3"
                                                        {{ $user->type == 'Admin3' ? 'selected' : '' }}>Admin3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Enter Password" />

                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success">Update</button>
                                    <a href="{{ url('user') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.copyright')
    </div>

    @include('layouts.custom_color')
</div>

@include('layouts.footer')
