<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="page-content">


    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        @include('layouts.alerts')

        <div class="content d-flex justify-content-center align-items-center">

            <form method="POST" class="login-form" action="{{route('login.store')}}">
                @method('POST')
                @csrf
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Login</h5>
                            <!-- __ - Берет значения из файла локализации ('resources/lang/en/public') -->
                            <span class="d-block text-muted">Enter your credentials below</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="login" type="text"
                                   class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Login') }}" name="login" value="{{ old('login') }}" required
                                   autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password" type="password"
                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="{{ __('Password') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}<i class="icon-circle-right2 ml-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </form>
            <!-- /login form -->

        </div>
    </div>

    <footer class="main-footer">
        <strong>If you dont have an account  <a href="{{route('register.index')}}">Register Now</a>.</strong>
    </footer>
    <!-- /.content-wrapper -->
</div>
</body>
</html>

