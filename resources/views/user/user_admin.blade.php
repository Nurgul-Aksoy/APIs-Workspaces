<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Api Platform</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!--Mix edilmiş css dosyası-->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/app.css">

<body class="hold-transition sidebar-mini layout-fixed" style="font-size: 12px;">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>


    <!-- Navbar -->
@include('user.user_header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('user.user_sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <!--Yield section-->
                        @yield('user_contents')


                    </div><!-- /.col -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            @include('sweetalert::alert')

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- jQuery -->
    <script src="{{ env('APP_URL') }}/js/app.js"></script>
    @yield('scripts')
    <script>
        //$.widget.bridge('uibutton', $.ui.button)
        //$('#t').DataTable();
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

</body>
</html>
