<!-- BEGIN VENDOR JS-->
<script src="{{asset("assets") }}/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset("assets") }}/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<script src="{{asset("assets") }}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="{{asset("assets") }}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="{{asset("assets") }}/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
        type="text/javascript"></script>
<script src="{{asset("assets") }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>


<script src="{{asset("assets") }}/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
        type="text/javascript"></script>
<script src="{{asset("assets") }}/data/jvector/visitor-data.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset("assets") }}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{asset("assets") }}/js/core/app.js" type="text/javascript"></script>
<script src="{{asset("assets") }}/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->

{{--start yjara datatable--}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js" ></script>

<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
<script src="{{asset('vendor/datatable/excel/jszip.min.js')}}"></script>
<script src="{{asset('vendor/datatable/pdf/pdfmake.min.js')}}"></script>
<script src="{{asset('vendor/datatable/pdf/vfs_fonts.js')}}"></script>

{{--end yjara datatable--}}

{{--start sweat alert--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--end sweat alert--}}

<script src="{{asset("assets") }}/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@stack('js')
