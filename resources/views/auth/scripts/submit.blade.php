<script>
    ["#nama", "#tempat", '#judul'].forEach(function(selector) {
        $(selector).on('keyup', function() {
            this.value = this.value.toUpperCase();
        });
    });

    var parts = $("#tanggal").val().split("/"); // Pisahkan berdasarkan "-"
    var formattedTanggal = parts[2] + "-" + parts[1] + "-" + parts[0]; // Susun kembali jadi yyyy-mm-dd

    document.addEventListener("DOMContentLoaded", function() {
        new AirDatepicker('#tanggal', {
            selectedDates: [new Date(formattedTanggal)],
            dateFormat: 'dd/MM/yyyy',
            autoClose: true,
            locale: {
                days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                daysMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                today: 'Hari Ini',
                clear: 'Hapus',
                firstDay: 1
            }
        });

        new AirDatepicker('#masuk', {
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            autoClose: true
        });

        new AirDatepicker('#yudisium', {
            dateFormat: 'dd/MM/yyyy',
            autoClose: true,
            locale: {
                days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                daysMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                today: 'Hari Ini',
                clear: 'Hapus',
                firstDay: 1
            }
        });
    });

    const swKejuaraan = $("#swKejuaraan");
    const swSertifikat = $("#swSertifikat");
    const swBeasiswa = $("#swBeasiswa");
    const swOrganisasi = $("#swOrganisasi");

    function toggleKejuaraan() {
        if (swKejuaraan.prop("checked")) {
            $("#grupSwKejuaraan").show();
            $(".grupAddKejuaraan").show();
            $("#grupNoKejuaraan").show();
            $("#btnKejuaraan").show();
            $(".kejuaraan").prop("required", true);
            $(".no_kejuaraan").prop("required", true);
        } else {
            $("#grupSwKejuaraan").hide();
            $(".grupAddKejuaraan").hide();
            $("#grupNoKejuaraan").hide();
            $("#btnKejuaraan").hide();
            $(".kejuaraan").prop("required", false);
            $(".no_kejuaraan").prop("required", false);
        }
    }

    function toggleSertifikat() {
        if (swSertifikat.prop("checked")) {
            $("#grupSwSertifikat").show();
            $(".grupAddSertifikat").show();
            $("#grupNoSertifikat").show();
            $("#btnSertifikat").show();
            $(".sertifikat").prop("required", true);
            $(".no_sertifikat").prop("required", true);
        } else {
            $("#grupSwSertifikat").hide();
            $(".grupAddSertifikat").hide();
            $("#grupNoSertifikat").hide();
            $("#btnSertifikat").hide();
            $(".sertifikat").prop("required", false);
            $(".no_sertifikat").prop("required", false);
        }
    }

    function toggleBeasiswa() {
        if (swBeasiswa.prop("checked")) {
            $("#grupSwBeasiswa").show();
            $(".grupAddBeasiswa").show();
            $("#btnBeasiswa").show();
            $(".beasiswa").prop("required", true);
        } else {
            $("#grupSwBeasiswa").hide();
            $(".grupAddBeasiswa").hide();
            $("#btnBeasiswa").hide();
            $(".beasiswa").prop("required", false);
        }
    }

    function toggleOrganisasi() {
        if (swOrganisasi.prop("checked")) {
            $("#grupSwOrganisasi").show();
            $(".grupAddOrganisasi").show();
            $("#grupJabatanOrganisasi").show();
            $("#btnOrganisasi").show();
            $(".organisasi").prop("required", true);
            $(".jabatan_organisasi").prop("required", true);
        } else {
            $("#grupSwOrganisasi").hide();
            $(".grupAddOrganisasi").hide();
            $("#grupJabatanOrganisasi").hide();
            $("#btnOrganisasi").hide();
            $(".organisasi").prop("required", false);
            $(".jabatan_organisasi").prop("required", false);
        }
    }


    // Event listener untuk perubahan toggle
    swKejuaraan.on("change", toggleKejuaraan);
    swSertifikat.on("change", toggleSertifikat);
    swBeasiswa.on("change", toggleBeasiswa);
    swOrganisasi.on("change", toggleOrganisasi);

    // Panggil fungsi untuk menyesuaikan kondisi awal saat halaman dimuat
    toggleKejuaraan();
    toggleSertifikat();
    toggleBeasiswa();
    toggleOrganisasi();



    $(document).ready(function() {
        let countKejuaraan = 1;
        let countSertifikat = 1;
        let countBeasiswa = 1;
        let countOrganisasi = 1;
        $(document).on('click', '.tambahKejuaraan', function() {
            countKejuaraan++;
            $('.hapusKejuaraan').remove();
            let grupKejuaraan = `<div class="row mt-1 kejuaraan-item">
                                <div class="col-md-4"></div>
                                <div class="grupAddKejuaraan col-md-8" >
                                    <div class="input-group">
                                        <span class="input-group-text">${countKejuaraan}</span>
                                        <input type="text" class="kejuaraan form-control" placeholder="Juara 1 Lomba Karya Tulis Ilmiah Tingkat Nasional" name="kejuaraan[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupNoKejuaraan = `<div class="row mt-1 no-kejuaraan-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countKejuaraan}</span>
                                        <input type="text" class="kejuaraan form-control" placeholder="120/KTI/Nas/2022" name="no_kejuaraan[]" required>
                                    </div>
                                </div>
                            </div>`;

            let hapusKejuaraan = `<button type="button" class="btn btn-xs btn-danger hapusKejuaraan"><i class="bx bx-minus" style="font-size: 10px;"></i></button>`;

            $('#grupKejuaraan').append(grupKejuaraan);
            $('#grupNoKejuaraan').append(grupNoKejuaraan);
            $('#btnKejuaraan').append(hapusKejuaraan);
        });

        $(document).on('click', '.hapusKejuaraan', function() {
            countKejuaraan--;
            let lastKejuaraan = $('#grupKejuaraan .kejuaraan-item');
            let lastNoKejuaraan = $('#grupNoKejuaraan .no-kejuaraan-item');

            if (lastKejuaraan.length > 0 && lastNoKejuaraan.length > 0) {
                lastKejuaraan.last().remove();
                lastNoKejuaraan.last().remove();
            }

            // Jika hanya tersisa satu set, hapus tombol hapus
            if ($('#grupKejuaraan .kejuaraan-item').length === 0 && $('#grupNoKejuaraan .no-kejuaraan-item').length === 0) {
                $('.hapusKejuaraan').remove();
            }
        });

        $(document).on('click', '.tambahSertifikat', function() {
            countSertifikat++;
            $('.hapusSertifikat').remove();
            let grupSertifikat = `<div class="row mt-1 sertifikat-item">
                                <div class="col-md-4"></div>
                                <div class="grupAddSertifikat col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countSertifikat}</span>
                                        <input class="sertifikat form-control" type="text" placeholder="Lembaga Sertifikasi Profesi - Network Engineer"
                                                name="sertifikat[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupNoSertifikat = `<div class="row mt-1 no-sertifikat-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countSertifikat}</span>
                                        <input type="text" class="no_sertifikat form-control" placeholder="62022 3 00552 2022" name="no_sertifikat[]"
                                                            required>
                                    </div>
                                </div>
                            </div>`;

            let hapusSertifikat =
                `<button type="button" class="btn btn-xs btn-danger hapusSertifikat"><i class="bx bx-minus" style="font-size: 10px;"></i></button>`;

            $('#grupSertifikat').append(grupSertifikat);
            $('#grupNoSertifikat').append(grupNoSertifikat);
            $('#btnSertifikat').append(hapusSertifikat);
        });

        $(document).on('click', '.hapusSertifikat', function() {
            countSertifikat--;
            let lastSertifikat = $('#grupSertifikat .sertifikat-item');
            let lastNoSertifikat = $('#grupNoSertifikat .no-sertifikat-item');

            if (lastSertifikat.length > 0 && lastNoSertifikat.length > 0) {
                lastSertifikat.last().remove();
                lastNoSertifikat.last().remove();
            }

            // Jika hanya tersisa satu set, hapus tombol hapus
            if ($('#grupSertifikat .sertifikat-item').length === 0 && $('#grupNoSertifikat .no-sertifikat-item').length === 0) {
                $('.hapusSertifikat').remove();
            }
        });

        $(document).on('click', '.tambahBeasiswa', function() {
            countBeasiswa++;
            $('.hapusBeasiswa').remove();
            let grupBeasiswa = `<div class="row mt-1 beasiswa-item">
                                            <div class="col-md-2"></div>
                                            <div class="grupAddBeasiswa col">
                                                <div class="input-group">
                                                    <span class="input-group-text">${countBeasiswa}</span>
                                                    <input type="text" class="beasiswa form-control" placeholder="Beasiswa KIP 2022" name="beasiswa[]" required>
                                                </div>
                                            </div>
                                        </div>`;

            let hapusBeasiswa =
                `<button type="button" class="btn btn-xs btn-danger hapusBeasiswa"><i class="bx bx-minus" style="font-size: 10px;"></i></button>`;

            $('#grupBeasiswa').append(grupBeasiswa);
            $('#btnBeasiswa').append(hapusBeasiswa);
        });

        $(document).on('click', '.hapusBeasiswa', function() {
            countBeasiswa--
            let lastBeasiswa = $('#grupBeasiswa .beasiswa-item');

            if (lastBeasiswa.length > 0) {
                lastBeasiswa.last().remove();
            }

            // Jika hanya tersisa satu set, hapus tombol hapus
            if ($('#grupBeasiswa .beasiswa-item').length === 0 && $('#grupNoBeasiswa .no-beasiswa-item').length === 0) {
                $('.hapusBeasiswa').remove();
            }
        });

        $(document).on('click', '.tambahOrganisasi', function() {
            countOrganisasi++;
            $('.hapusOrganisasi').remove();
            let grupOrganisasi = `<div class="row mt-1 organisasi-item">
                                <div class="col-md-4"></div>
                                <div class="grupAddOrganisasi col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countOrganisasi}</span>
                                        <input class="organisasi form-control" type="text" placeholder="Badan Eksekutif Mahasiswa 2022-2023"
                                                name="organisasi[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupJabatanOrganisasi = `<div class="row mt-1 jabatan-organisasi-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countOrganisasi}</span>
                                        <input type="text" class="jabatan_organisasi form-control" placeholder="Ketua" name="jabatan_organisasi[]"
                                                            required>
                                    </div>
                                </div>
                            </div>`;

            let hapusOrganisasi =
                `<button type="button" class="btn btn-xs btn-danger hapusOrganisasi"><i class="bx bx-minus" style="font-size: 10px;"></i></button>`;

            $('#grupOrganisasi').append(grupOrganisasi);
            $('#grupJabatanOrganisasi').append(grupJabatanOrganisasi);
            $('#btnOrganisasi').append(hapusOrganisasi);
        });

        $(document).on('click', '.hapusOrganisasi', function() {
            countOrganisasi--;
            let lastOrganisasi = $('#grupOrganisasi .organisasi-item');
            let lastJabatanOrganisasi = $('#grupJabatanOrganisasi .jabatan-organisasi-item');

            if (lastOrganisasi.length > 0 && lastJabatanOrganisasi.length > 0) {
                lastOrganisasi.last().remove();
                lastJabatanOrganisasi.last().remove();
            }

            // Jika hanya tersisa satu set, hapus tombol hapus
            if ($('#grupOrganisasi .organisasi-item').length === 0 && $('#grupJabatanOrganisasi .jabatan-organisasi-item').length === 0) {
                $('.hapusOrganisasi').remove();
            }
        });

        $('#forpiForm').on('submit', async function(event) {
            event.preventDefault();
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

            if (accept) {
                this.submit(); // Kirim formulir
            }
        });
    });
</script>

@if (session('submit'))
    <script>
        $(document).ready(function() {
            let timerInterval;
            Swal.fire({
                icon: "success",
                title: "Sipp! Udah dikirim!",
                html: "Anda akan logout dalam <b></b>",
                timer: 5000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                    window.location.href = "{{ route('logout') }}"; // Logout setelah Swal ditutup
                }
            });
        });
    </script>
@endif
