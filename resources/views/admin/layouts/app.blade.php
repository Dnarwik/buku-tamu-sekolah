<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="" type="image/png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" type="text/css" href="{{ asset('storage/AdminLTE/plugins/summernote/summernote-bs4.css')}}">
  @yield('head')  
  <title>@yield('title')</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- wrapper -->
    <div class="wrapper">
        @include('admin.layouts.nav')
        @yield('content')
        @include('admin.layouts.footer')
    </div>
    <!-- ./wrapper -->
    @yield('foot')
</body>
</html>