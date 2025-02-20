<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISPER | Landing Portal</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/sneat/libs/apex-charts/apex-charts.css') }}" />

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/css/aos.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('vendor/sneat/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('vendor/sneat/js/config.js') }}"></script>

    <style>
        /* Efek hover untuk #banner1 */
        #banner1:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease-in-out;
        }

        /* Ketika #banner1 di-hover, geser #skpi ke kanan */
        #banner1:hover #skpi {
            transform: translateX(10px);
            transition: transform 0.3s ease-in-out;
        }

        #fpi:hover {
            background-color: #bc5d23 !important;
            border-color: #bc5d23 !important;
        }

        #fbl:hover {
            background-color: #0d6501 !important;
            border-color: #0d6501 !important;
        }
    </style>

</head>

<body>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <!-- Untuk layar besar (default -100px) -->
        <div class="container d-none d-md-block">
            <div class="d-flex flex-column justify-content-start" data-aos="zoom-out" data-aos-duration="1000">
                <div class="d-flex justify-content-center align-items-center py-5">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="sisper" width="500">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="100">
                    <a id="banner1" class="btn text-start p-0" href="{{ route('forpi') }}" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/fpi.svg') }}" alt="Card image"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="fpi" type="button" class="btn btn-danger mb-2" style="background-color: #ff7a27; border-color: #ff7a27">
                                            FORPI
                                        </button>
                                        <p class="card-text"><small>Formulir Surat Keterangan Pendamping Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="200">
                    <a name="" id="banner1" class="btn text-start p-0" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/fbl.svg') }}" alt="Card image"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="fbl" type="button" class="btn btn-danger mb-2" style="background-color: #0f8500; border-color: #0f8500">
                                            FORBELA
                                        </button>
                                        <p class="card-text"><small>Formulir Keterangan Bebas Lab</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="300">
                    <a name="" id="banner1" class="btn text-start p-0" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/dvs.svg') }}" alt="Card image"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="dvs" type="button" class="btn btn-danger mb-2">
                                            DVERSI
                                        </button>
                                        <p class="card-text"><small>Digital Verifikasi Biodata Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Untuk layar kecil (translateY -250px) -->
        <div class="container d-block d-md-none" style="transform: translateY(-15rem);">
            <div class="d-flex flex-column justify-content-start" data-aos="fade-in">
                <div class="d-flex justify-content-center align-items-center p-5">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="sisper" width="500">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a nid="banner1" class="btn text-start p-0 w-100" href="{{ route('forpi') }}" role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/fpi.svg') }}" alt="Card image">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="fpi" type="button" class="btn btn-danger" style="background-color: #ff7a27; border-color: #ff7a27">
                                            FORPI
                                        </button>
                                        <p class="card-text mt-1 me-3" style="font-size: 12px; line-height: 1.2"><small>Formulir Surat Keterangan Pendamping Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a name="" id="banner1" class="btn text-start p-0 w-100" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/fbl.svg') }}" alt="Card image">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="fbl" type="button" class="btn btn-danger" style="background-color: #0f8500; border-color: #0f8500">
                                            FORBELA
                                        </button>
                                        <p class="card-text mt-1 me-3" style="font-size: 12px; line-height: 1.2"><small>Formulir Surat Keterangan Bebas Lab</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a name="" id="banner1" class="btn text-start p-0 w-100" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/dvs.svg') }}" alt="Card image">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="dvs" type="button" class="btn btn-danger mb-2">
                                            DVERSI
                                        </button>
                                        <p class="card-text mt-1 me-3" style="font-size: 12px; line-height: 1.2"><small>Digital Verifikasi Biodata Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- <div class="col-lg-6">
                    <a name="" id="banner1" class="btn text-start p-0" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/fbl.svg') }}" alt="Card image"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="fbl" type="button" class="btn btn-danger mb-2" style="background-color: #0f8500; border-color: #0f8500">
                                            FORBELA
                                        </button>
                                        <p class="card-text"><small>Formulir Keterangan Bebas Lab</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a name="" id="banner1" class="btn text-start p-0" href="#" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/dvs.svg') }}" alt="Card image"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="dvs" type="button" class="btn btn-danger mb-2">
                                            DVERSI
                                        </button>
                                        <p class="card-text"><small>Digital Verifikasi Biodata Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}

            </div>
        </div>
    </section>

    <!-- Core JS -->
    <script src="{{ asset('vendor/sneat/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/sneat/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/sneat/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/sneat/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/sneat/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/sneat/js/main.js') }}"></script>

    <!-- AOS JS -->
    <script src="{{ asset('vendor/aos/js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>

    <!-- Popover JS -->
    <script src="{{ asset('vendor/sneat/js/ui-popover.js') }}"></script>

    <!-- Toast JS -->
    <script src="{{ asset('vendor/sneat/js/ui-toasts.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
