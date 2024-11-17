<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('layouts.dashboard._head')

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->

@include('layouts.dashboard._header')
<!-- ////////////////////////////   start sidebar          ////////////////////////////////////////////////-->
@include('layouts.dashboard._sidebar')

@yield('content')

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('layouts.dashboard._footer')

<!-- BEGIN VENDOR JS-->
@include('layouts.dashboard._scripts')

<!-- END PAGE LEVEL JS-->
</body>
</html>
