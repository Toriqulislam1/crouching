<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{$page_title}} | {{$site_title}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/favicon.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <a href="{{route('/')}}"><img src="{{asset('public/logo.png')}}" alt="{{$basic->title}}"></a>
            </div>
            <h3 class="text-center text-uppercase" style="color:indianred;font-family: 'Droid Serif';">{{$page_title}}</h3>
            <hr>
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if($errors->any())
                @foreach ($errors->all() as $error)

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!!  $error !!}
                    </div>
                @endforeach
            @endif

            @yield('content')
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/assets')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/assets')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/assets')}}/js/adminlte.min.js"></script>
</body>
</html>
