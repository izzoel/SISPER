<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISPER | Landing Page </title>

    <!-- Bootstrap -->
    <link href='{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}' rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login zbg"
    style="background-image: url('../images/bg0.png');background-position: center;background-repeat: no-repeat;background-size: cover;overflow: hidden;min-height: 100vh;">
    <div>
        <div class="login_wrapper">

            <div class="animate form login_form">
                <section class="login_content">
                    <img src="{{ asset('images/logo5.png') }}" class="img-fluid">
                    <form>
                        <h1 class="text-light">Sistem Persuratan</h1>

                        <a name="" id="" class="btn btn-light" href="{{ route('skpi') }}" role="button" style="text-decoration:none">
                            <i class="fa fa-file-text-o" style="font-size: 1.5rem"></i>
                            &nbsp;
                            <span class="align-text-bottom">SKPI</span>
                        </a>

                        <a id="dversi" class="btn btn-light" href="" role="button" style="text-decoration:none">
                            <i class="fa fa-file-text-o" style="font-size: 1.5rem"></i>
                            &nbsp;
                            <span class="align-text-bottom">DVERSI</span>
                        </a>
                        {{-- <a name="" id="" class="btn btn-light" href="{{ route('dversi') }}" role="button" style="text-decoration:none" data-bs-toggle="modal"
                            data-bs-target="#dversi-login">
                            <i class="fa fa-file-text-o" style="font-size: 1.5rem"></i>
                            &nbsp;
                            <span class="align-text-bottom">D-VERSI</span>
                        </a> --}}

                        {{-- <button type="button" name="" id="" class="btn btn-light" btn-lg btn-block" disabled>
                            <i class="fa fa-file-text-o" style="font-size: 1.5rem"></i>
                            &nbsp;
                            <span class="align-text-bottom">Verifikasi</span>
                        </button> --}}

                        <button type="button" name="" id="" class="btn btn-light" btn-lg btn-block" disabled>
                            <i class="fa fa-file-text-o" style="font-size: 1.5rem"></i>
                            &nbsp;
                            <span class="align-text-bottom">...</span>
                        </button>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <br>
                            <p class="text-light">Developed by <a href="http://izzoel.github.io" class="text-light m-0"
                                    style="color: chocolate !important; text-shadow:none"><b>zetware</b></a> ©2022
                            </p>
                        </div>
                    </form>
                </section>

            </div>

        </div>
    </div>
</body>

<script src='{{ asset('vendors/jquery/dist/jquery.js') }}'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#dversi").on("click", async (event) => {
        event.preventDefault(); // Prevent default action

        const {
            value: formValues
        } = await Swal.fire({
            title: "Digital Verifikasi",
            html: `
            <input id="swal-input1" class="swal2-input" placeholder="NIM">
            <input id="swal-input2" class="swal2-input" placeholder="NIK">
        `,
            focusConfirm: false,
            preConfirm: () => {
                const nim = document.getElementById("swal-input1").value;
                const nik = document.getElementById("swal-input2").value;
                if (!nim || !nik) {
                    Swal.showValidationMessage("Harap isikan NIM dan NIK.");
                    return false; // Prevent submission
                }
                return [nim, nik];
            }
        });

        if (formValues) {
            const [nim, nik] = formValues; // Destructure form values
            // Redirect to the Laravel route
            window.location.href = `{{ route('dversi', ['nim' => '__nim__', 'nik' => '__nik__']) }}`.replace('__nim__', nim).replace('__nik__', nik);
        }
    });
</script>

</html>
