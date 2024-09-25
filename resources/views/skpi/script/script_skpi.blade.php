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
        $('#skpiForm').on('submit', async function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Check form validity
            if (!this.checkValidity()) {
                // Display error message if form is invalid
                Swal.fire(
                    'Gagal',
                    'Lengkapi formulir dulu yak..!',
                    'error'
                );
                event.stopPropagation(); // Stop event propagation
            } else {
                // Show Swal dialog with checkbox for terms and conditions
                const {
                    value: accept
                } = await Swal.fire({
                    icon: "warning",
                    title: "Kesesuaian Data",
                    input: "checkbox",
                    inputValue: 0,
                    inputPlaceholder: 'Saya bersedia menanggung biaya dan konsekuensi jika terjadi kesalahan pada pengisian',
                    confirmButtonText: 'Lanjutkan <i class="fa fa-arrow-right"></i>',
                    inputValidator: (result) => {
                        return !result && "Kamu harus menyetujui syarat dan ketentuan";
                    }
                });

                // Check if user accepted terms and conditions
                if (accept) {
                    Swal.fire(
                        'Sipp!',
                        'Data berhasil dikirim.',
                        'success'
                    );
                    // Proceed with form submission
                    this.submit();
                }
            }

            // Mark form as validated
            $(this).addClass('was-validated');
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

        html += '<div class="row input-group">';
        html +=
            '<div class="col-sm-2 input-group-prepend"><label class="label-align text-dark"><span class="required text-danger"></span></label></div>';
        html +=
            '<div class="col input-group-prepend"><input type="text" id="inputPencapaian" class="form-control" name="pencapaian[]" placeholder="pencapaian">';

        $('#newRow').append(html).insertAfter(".a");
    }

    function removePencapaian() {
        var largestID = $("#newRow input:last");
        largestID.closest('.row').remove();
    }


    function addSertifikasi() {
        var html = '';

        html += '<div class="row input-group">';
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

        html += '<div class="row input-group">';
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

        html += '<div class="row input-group">';
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
