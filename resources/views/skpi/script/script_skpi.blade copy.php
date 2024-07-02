<script>
    //Cek admin login
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

    //Cek Validasi
    $(document).ready(function() {
        // Event listener untuk kotak centang
        $('#confirmCheckbox').change(function() {
            var isChecked = $(this).is(':checked');
            // Mengaktifkan/menonaktifkan tombol kirim berdasarkan status kotak centang dan validitas formulir
            $('#confirmButton').prop('disabled', !isChecked || !$('#skpiForm')[0].checkValidity());
        });

        // Event listener untuk formulir saat dikirim
        $('#skpiForm').on('submit', function(event) {
            // Memeriksa validitas formulir
            if (this.checkValidity() === false) {
                // Menampilkan SweetAlert jika formulir tidak valid
                Swal.fire(
                    'Gagal',
                    'Lengkapi formulir dulu yak..!',
                    'error'
                );
                event.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
                event.stopPropagation(); // Menghentikan penyebaran event
            } else {
                // Menampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Sudah sesuai?',
                    text: "Data yang saya masukkan sudah sesuai!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Kirim',
                    footer: '<div class="form-check"><input class="form-check-input" type="checkbox" id="confirmCheckbox"><label class="form-check-label" for="confirmCheckbox">Saya siap menanggung biaya dan resiko jika terjadi kesalahan penginputan</label></div>',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Check if checkbox is checked
                        if (!$('#confirmCheckbox').is(':checked')) {
                            Swal.showValidationMessage(
                                'Anda harus menyetujui syarat dan ketentuan.');
                        }
                    }
                }).then((result) => {
                    $('.swal2-confirm').prop('disabled', true);
                    if (result.isConfirmed && $('#confirmCheckbox').is(':checked')) {
                        // Menampilkan SweetAlert sukses
                        Swal.fire(
                            'Terkirim!',
                            'Data telah berhasil dikirim.',
                            'success'
                        );
                        // Melakukan pengiriman formulir
                        this.submit();
                    }
                });
                event
                    .preventDefault(); // Menghentikan pengiriman formulir karena akan di-submit setelah konfirmasi
                event.stopPropagation(); // Menghentikan penyebaran event
            }

            $(this).addClass('was-validated'); // Menandai formulir sebagai divalidasi
        });
    });


    //Datatables
    $('#skpi').DataTable({});

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

    $(".datepicker2").datepicker({
        format: 'yyyy',
        viewMode: 'years',
        minViewMode: 'years'
    });


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
