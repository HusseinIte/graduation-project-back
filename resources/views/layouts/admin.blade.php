<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/mycustomstyle.css')}}">
    <!-- Include Required Prerequisites -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/daterangepicker.css')}}">

</head>
<body class=" hold-transition sidebar-mini
    ">
<div class="wrapper">

    <!-- Navbar -->
@include('admin.includes.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.includes.sidebar')
<!-- End Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
@include('admin.includes.content')
<!-- /.content-wrapper -->


    <!-- Main Footer -->
@include('admin.includes.footer')
<!-- End Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/app.js ')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/daterangepicker.js')}}"></script>
@yield('script');
</body>
</html>
