<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('login_page/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login_page/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login_page/dist/css/adminlte.min.css') }}">
</head>
<style>
    .logo-size {
        width: 10vw;
        height: auto;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            {{-- <div class="card-header text-center" style="background-color: #6CB4DF">
                <img class="d-flex mx-auto logo-size" src="{{ asset('img/navlogo.png') }}" alt="">
                <a href="{{ url('/') }}" class="h1"><b></b></a>
            </div> --}}

            <div class="card-body">
                <p class="login-box-msg">Sign in to start</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control" name="email" :value="old('email')"
                            required autofocus autocomplete="username" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control" name="password" required
                            autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mt-3s mb-3">
                    &nbsp;
                </div>


            </div>
        </div>
    </div>

    <script src="{{ asset('login_page/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('login_page/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('login_page/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
