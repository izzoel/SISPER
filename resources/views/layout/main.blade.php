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
    {{-- <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> --}}
    {{-- <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"
        integrity="sha512-rxThY3LYIfYsVCWPCW9dB0k+e3RZB39f23ylUYTEuZMDrN/vRqLdaCBo/FbvVT6uC2r0ObfPzotsfKF9Qc5W5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

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
        {{-- style="background-color: #ffffff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)"> --}}
        <a name="" id="" class="btn btn-danger m-3" href="{{ route('landing') }}" role="button">
            <i class="fa fa-arrow-circle-left"></i> Kembali
        </a>
        {{-- <img src="{{ asset('images/logo5.png') }}" class="img"> --}}

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
{{-- <script src="../vendors/jquery/dist/jquery.min.js"></script> --}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- jq 3.5.1 --}}



<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- morris.js -->
<script src="../vendors/raphael/raphael.min.js"></script>
<script src="../vendors/morris.js/morris.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
{{-- <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
{{-- dt 1.13.1 --}}



<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
{{-- dt bootstrap 4 --}}

{{-- <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
{{-- dt button 2.3.2 --}}


<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
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
<script src="../vendors/validator/validator.js"></script>

<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Ion.RangeSlider -->
<script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap Colorpicker -->
<script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<script src="../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

{{-- <script src="https://unpkg.com/ispin"></script> --}}

{{-- <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script> --}}
<!-- Cropper -->
{{-- <script src="../vendors/cropper/dist/cropper.min.js"></script> --}}

<script src="../vendors/popper.js/popper.min.js"></script>
{{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- #custome js --}}
<script src="../js/dat.js"></script>


</body>
<script>
    function hideshow() {
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if (password.type === 'password') {
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        } else {
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
</script>

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();


    }).prop('checked', false);

    console.log(validatorResult);
</script>


<script>
    function addPencapaian() {
        var html = '';

        html += '<div class="row input-group mb-0">';
        html +=
            '<div class="col-sm-2 input-group-prepend"><label class="label-align text-dark"><span class="required text-danger"></span></label></div>';
        html +=
            '<div class="col  input-group-prepend"><input type="text" id="inputPencapaian" class="form-control" name="pencapaian[]" placeholder="pencapaian">';

        $('#newRow').append(html).insertAfter(".a");
    }

    function removePencapaian() {
        var largestID = $("#newRow input:last");
        largestID.closest('.row').remove();
    }


    function addSertifikasi() {
        var html = '';

        html += '<div class="row input-group mb-0">';
        html +=
            '<div class="col-sm-2 input-group-prepend"><label class="label-align text-dark"><span class="required text-danger"></span></label></div>';
        html +=
            '<div class="col  input-group-prepend"><input type="text" id="" class="form-control" name="sertifikasi[]" placeholder="sertifikasi">';

        $('#newSertifikasi').append(html).insertAfter(".b");
    }

    function removeSertifikasi() {
        var largestID = $("#newSertifikasi input:last");
        largestID.closest('.row').remove();
    }


    function addBeasiswa() {
        var html = '';

        html += '<div class="row input-group mb-0">';
        html +=
            '<div class="col-sm-2 input-group-prepend"><label class="label-align text-dark"><span class="required text-danger"></span></label></div>';
        html +=
            '<div class="col  input-group-prepend"><input type="text" class="form-control" name="beasiswa[]" placeholder="beasiswa">';

        $('#newBeasiswa').append(html).insertAfter(".c");
    }

    function removeBeasiswa() {
        var largestID = $("#newBeasiswa input:last");
        largestID.closest('.row').remove();
    }


    function addOrganisasi() {
        var html = '';

        html += '<div class="row input-group mb-0">';
        html +=
            '<div class="col-sm-2 input-group-prepend"><label class="label-align text-dark"><span class="required text-danger"></span></label></div>';
        html +=
            '<div class="col  input-group-prepend"><input type="text" class="form-control" name="organisasi[]" placeholder="organisasi">';

        $('#newOrganisasi').append(html).insertAfter(".d");
    }

    function removeOrganisasi() {
        var largestID = $("#newOrganisasi input:last");
        largestID.closest('.row').remove();
    }
</script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        Swal.fire(
                            'Gagal',
                            'Lengkapi formulir dulu yak..!',
                            'error'
                        )
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script type="text/javascript">
    $.fn.datepicker.dates['id'] = {
        days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"
        ],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"],
        today: "Sekarang",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        weekStart: 0
    };

    $(".datepicker").datepicker({
        language: 'id',
        format: 'dd MM yyyy',
        autoclose: true,
        todayHighlight: true,
    });
</script>


<script type="text/javascript">
    $(".datepicker2").datepicker({
        format: 'yyyy',
        viewMode: 'years',
        minViewMode: 'years'
    });
</script>

<script type="text/javascript">
    $.fn.datepicker.dates['id'] = {
        days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"
        ],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"],
        today: "Sekarang",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        weekStart: 0
    };

    $(".datepicker3").datepicker({
        language: 'id',
        format: 'dd MM yyyy',
        autoclose: true,
        todayHighlight: true,
    });
</script>

<script>
    (function($) {
        $('.spinner .btn:first-of-type').on('click', function() {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function() {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
        });
    })(jQuery);
</script>

<script>
    $(document).ready(function() {
        $("#program_studi[data-id=get_val]").on("change", function() {
            if ($(this).val() === "Sarjana Farmasi") {
                $("label[id=judul]").text("Judul Skripsi").append(
                    '<sup class="text-danger fw-bold">*</sup>');
            } else if ($(this).val() === "Diploma Tiga Farmasi" || $(this).val() ===
                "Diploma Tiga TLM") {
                $("label[id=judul]").text("Judul Tugas Akhir").append(
                    '<sup class="text-danger fw-bold">*</sup>');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        // password = 'sew';
        if (window.location.href.indexOf("admin") > -1) {
            (async () => {
                const {
                    value: password
                } = await Swal.fire({
                    title: 'Hai Admin!',
                    input: 'password',
                    // inputLabel: 'Password',
                    inputPlaceholder: 'ssst..',
                    confirmButtonText: 'Sew!',
                    showLoaderOnConfirm: true,

                    inputAttributes: {
                        maxlength: 10,
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    },
                    allowOutsideClick: () => Swal.isLoading()
                })

                if (password != 'luz') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Eiit salah..!',
                        showConfirmButton: false
                    })
                    allowOutsideClick: () => Swal.isLoading()

                    location.reload();
                }

            })()

        }
    });
</script>

<script>
    $('#datatable').DataTable({});
</script>

<script>
    function cek() {
        // document.getElementById("demo").innerHTML = "YOU CLICKED ME!";]
        // $("span .badge").text('reviewed');
        // $("span").text('reviewed');
        // alert($("span").text('reviewed'));
    }
</script>
{{-- 
@foreach ($data_skpi as $skpi)
    <script>
        let = $('#cek' + {{ $skpi->id }});

        $.ajax({
            url: "https://santrikoding.com/api/posts",
            type: "POST",
            data: {
                "title": $('#title');.val(),
                "content": $("#content").val(),
            },
        });

        // alert($('#cek' + {{ $skpi->id }}));
    </script>
@endforeach --}}




</html>
