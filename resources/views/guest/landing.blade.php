<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISPER | Landing Portal</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/demo.css') }}" />

    <!-- AOS CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/css/aos.css') }}" />
</head>

<body>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <!-- Untuk layar besar (default -100px) -->
        <div class="container d-none d-md-block">
            <div class="d-flex flex-column justify-content-start" data-aos="zoom-out" data-aos-duration="1000">
                <div class="d-flex justify-content-center align-items-center py-5">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="sisper" width="500" id="sisper">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn text-start p-0 banner forpi" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/logo/forpi.svg') }}" alt="FORPI"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="forpi" type="button" class="btn btn-danger mb-2" style="background-color: #ff7a27; border-color: #ff7a27">
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
                    <a class="btn text-start p-0 banner" href="" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/logo/forbela.svg') }}" alt="FORBELA"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="forbela" type="button" class="btn btn-danger mb-2" style="background-color: #0f8500; border-color: #0f8500">
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
                    <a class="btn text-start p-0 banner dversi" role="button">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img img-fluid w-100 h-100 object-fit-cover" src="{{ asset('img/logo/dversi.svg') }}" alt="DVERSI"
                                        style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <button id="dversi" type="button" class="btn btn-danger mb-2">
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
        <div class="container d-block d-md-none" style="transform: translateY(-8rem);">
            <div class="d-flex flex-column justify-content-start" data-aos="fade-in" id="sisper-mobile">
                <div class="d-flex justify-content-center align-items-center p-4">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="sisper" width="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn text-start p-0 w-100 forpi"role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/logo/forpi.svg') }}" alt="FORPI">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="forpi" type="button" class="btn btn-danger" style="background-color: #ff7a27; border-color: #ff7a27">
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
                    <a class="btn text-start p-0 w-100" role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/logo/forbela.svg') }}" alt="FORBELA">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="forbela" type="button" class="btn btn-danger" style="background-color: #0f8500; border-color: #0f8500">
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
                    <a class="btn text-start p-0 w-100 dversi" role="button">
                        <div class="card mb-3">
                            <div class="row d-flex align-items-center flex-nowrap">
                                <!-- Gambar -->
                                <div class="col">
                                    <img class="card-img img-fluid object-fit-cover w-70 h-70" src="{{ asset('img/logo/dversi.svg') }}" alt="DVERSI">
                                </div>
                                <!-- Tombol -->
                                <div class="col">
                                    <div class="card-body p-0">
                                        <button id="dversi" type="button" class="btn btn-danger mb-2">
                                            DVERSI
                                        </button>
                                        <p class="card-text mt-1 me-3" style="font-size: 12px; line-height: 1.2"><small>Digital Verifikasi Biodata Ijazah</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Core JS -->
    <script src="{{ asset('vendor/sneat/libs/jquery/jquery.js') }}"></script>

    <!-- AOS JS -->
    <script src="{{ asset('vendor/aos/js/aos.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="{{ asset('vendor/sweetalert2/js/sweetalert2.js') }}"></script>

    <!-- forpi login -->
    <script src="{{ asset('scripts/sw-login-forpi.js') }}"></script>
    <script src="{{ asset('scripts/sw-login-dversi.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        gsap.to("#sisper", {
            y: -20,
            duration: 1.5,
            yoyo: true,
            repeat: -1,
            ease: "power1.inOut"
        });
        gsap.to("#sisper-mobile", {
            y: -20,
            duration: 2,
            yoyo: true,
            repeat: -1,
            ease: "power1.inOut"
        });

        $('.banner').hover(
            function() {
                gsap.to(this, {
                    y: -5,
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            },
            function() {
                gsap.to(this, {
                    y: 0,
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            }
        );

        $('#forpi').hover(
            function() {
                gsap.to(this, {
                    backgroundColor: '#bc5d23',
                    borderColor: '#bc5d23',
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            },
            function() {
                gsap.to(this, {
                    backgroundColor: '#ff7a27',
                    borderColor: '#ff7a27',
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            }
        );

        $('#forbela').hover(
            function() {
                gsap.to(this, {
                    backgroundColor: '#0d6501',
                    borderColor: '#0d6501',
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            },
            function() {
                gsap.to(this, {
                    backgroundColor: '#0f8500',
                    borderColor: '#0f8500',
                    duration: 0.1,
                    ease: 'power1.inOut'
                });
            }
        );
    </script>

</body>

</html>
