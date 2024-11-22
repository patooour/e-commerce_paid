<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('layouts.dashboard.auth._head')

</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- fixed-top-->
@include('layouts.dashboard.auth._header')

<!-- //////////////////////////////////////////////////////////////////////////// -->
@yield('content')

<!-- //////////////////////////////////////////////////////////////////////////// -->
@include('layouts.dashboard.auth._footer')

<!-- BEGIN VENDOR JS-->
@include('layouts.dashboard.auth._scripts')
<!-- END PAGE LEVEL JS-->
</body>
</html>
