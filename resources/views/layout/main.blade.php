<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISPER | Home</title>

    <!-- Bootstrap -->
    <link href='{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}' rel="stylesheet">
    <!-- Datepicker -->
    <link href='{{ asset('css/bootstrap-datepicker.min.css') }}'' rel="stylesheet">
    <!-- Font Awesome -->
    <link href='{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}' rel="stylesheet">
    <!-- DataTables -->
    <link href='{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}' rel="stylesheet">
    <link href='{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}' rel="stylesheet">
    {{-- Custom CSS --}}
    <link href='{{ asset('build/css/custom.min.css') }}' rel="stylesheet">
    <link href='{{ asset('css/datatables.css') }}' rel="stylesheet">

</head>

<body style="background-color: #5a0707">
    @include('sweetalert::alert')

    <nav class="navbar navbar-expand-lg " color-on-scroll="500"
        style="background-image: url('../images/bg0.png');background-position: center;background-repeat: no-repeat;background-size: cover;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <a name="" id="" class="btn btn-danger m-3" href="{{ route('landing') }}" role="button">
            <i class="fa fa-arrow-circle-left"></i> Kembali
        </a>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col m-2 mt-4 mb-4">
                    @if (Request::segment(1) === 'skpi')
                        @yield('skpi')
                    @endif
                    @if (Request::segment(1) === 'skpi' && Request::segment(2) === 'admin')
                        @yield('admin-skpi')
                    @endif
                    @if (Request::segment(1) === 'dversi')
                        @yield('ijazah')
                    @endif
                    @if (Request::segment(1) === 'dversi' && Request::segment(2) === 'admin')
                        @yield('admin-dversi')
                    @endif
                </div>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
<script src='{{ asset('vendors/jquery/dist/jquery.js') }}'></script>
<!-- Bootstrap -->
<script src='{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}'></script>
<!-- Datepicker -->
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<!-- DataTables -->
<script src='{{ asset('js/datatables.js') }}'></script>
<!-- Sweetalert2 -->
{{-- <script src="{{ asset('js/sweetalert2.min.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Request::segment(1) === 'skpi')
    @include('skpi.script.script_skpi')
@elseif (Request::segment(1) === 'dversi')
    @include('dversi.script.script_ijazah')
@endif

</html>
