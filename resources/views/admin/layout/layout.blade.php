<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{$page_title}} | {{$site_title}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/logo.png') }}">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{asset('public/assets')}}/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    @stack('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">--}}
        {{-- <img class="animation__shake" src="{{asset('public/assets')}}/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">--}}
        {{-- </div>--}}

        <!-- Navbar -->
        @include('admin.partial.topbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$page_title}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">{{$page_title}}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main row -->
                    @if($errors->any())
                    @foreach ($errors->all() as $error)

                    <div class="alert alert-icon-left alert-warning alert-dismissible mb-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {!! $error !!}
                    </div>
                    @endforeach
                    @endif
                    @yield('content')
                    <!-- /.row (main row) -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://appllys.com/">Appllys</a>.</strong>All rights reserved.
            {{-- <div class="float-right d-none d-sm-inline-block">--}}
            {{-- <b>Version</b> 3.2.0--}}
            {{-- </div>--}}
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('public/assets')}}/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('public/assets')}}/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/assets')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('public/assets')}}/sparklines/sparkline.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('public/assets')}}/moment/moment.min.js"></script>
    <script src="{{asset('public/assets')}}/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('public/assets')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public/assets')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/assets')}}/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{--<script src="{{asset('public/assets')}}/js/demo.js"></script>--}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('public/assets')}}/js/pages/dashboard.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{asset('public/assets')}}/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
            });
            @if(Session::has('success'))
            Toast.fire({
                icon: 'success'
                , title: '{{ session('
                success ') }}'

            })
            @endif

            @if(Session::has('error'))
            Toast.fire({
                icon: 'error'
                , title: '{{Session::get('
                error ')}}'
            })
            @endif
        });

    </script>
    @stack('js')

</body>
</html>
