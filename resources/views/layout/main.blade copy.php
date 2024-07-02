<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISPER | Home</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/me/me.css" rel="stylesheet">



</head>

<body style="background-color: #5a0707">
    @include('sweetalert::alert')

    {{-- <body style="background-color: #F7F7F8"> --}}
    <nav class="navbar navbar-expand-lg " color-on-scroll="500"
        style="
		  background-image: url('../images/bg0.png');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
		">
        <a name="" id="" class="btn btn-danger m-3" href="{{ route('landing') }}" role="button">
            <i class="fa fa-arrow-circle-left"></i> Kembali
        </a>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col m-2 mt-4 mb-4">

                    @yield('contain')

                </div>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src='{{ asset('vendors/jquery/dist/jquery.js') }}'></script>
<!-- Bootstrap -->
<script src='{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}'></script>
<!-- FastClick -->
{{-- <script src="../vendors/fastclick/lib/fastclick.js"></script> --}}
<!-- NProgress -->
{{-- <script src="../vendors/nprogress/nprogress.js"></script> --}}
<!-- Chart.js -->
{{-- <script src="../vendors/Chart.js/dist/Chart.min.js"></script> --}}
<!-- jQuery Sparklines -->
{{-- <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script> --}}
<!-- morris.js -->
{{-- <script src="../vendors/raphael/raphael.min.js"></script>
<script src="../vendors/morris.js/morris.min.js"></script> --}}
<!-- gauge.js -->
{{-- <script src="../vendors/gauge.js/dist/gauge.min.js"></script> --}}
<!-- bootstrap-progressbar -->
{{-- <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> --}}
<!-- Skycons -->
{{-- <script src="../vendors/skycons/skycons.js"></script> --}}
<!-- Flot -->
{{-- <script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script> --}}
<!-- Flot plugins -->
{{-- <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script> --}}
<!-- DateJS -->
{{-- <script src="../vendors/DateJS/build/date.js"></script> --}}
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
{{-- <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script> --}}
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<!-- iCheck -->
{{-- <script src="../vendors/iCheck/icheck.min.js"></script> --}}
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


{{-- <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}
{{-- dt bootstrap 4 --}}

{{-- <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script> --}}
{{-- dt button 2.3.2 --}}
{{-- <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="../vendors/validator/multifield.js"></script>
<script src="../vendors/validator/validator.js"></script> --}}


{{-- <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> --}}
<!-- Ion.RangeSlider -->
{{-- <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script> --}}
<!-- Bootstrap Colorpicker -->
{{-- <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> --}}

{{-- <script src="../vendors/autosize/dist/autosize.min.js"></script> --}}
<!-- jQuery autocomplete -->
{{-- <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> --}}
<!-- starrr -->
{{-- <script src='{{ asset('vendors/starrr/dist/starrr.js') }}'></script> --}}
<!-- Custom Theme Scripts -->
<script src="{{ asset('build/js/custom.min.js') }}"></script>

<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

{{-- <script src="{{ asset('vendors/popper.js/popper.min.js') }}"></script> --}}
{{-- <script src="/vendors/popper.js/popper.min.js"></script> --}}
{{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}

<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- #custome js --}}
<script src='{{ asset('js/dat.js') }}'></script>

@include('skpi.script.script_skpi')

</html>
