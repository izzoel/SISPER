<script>
    $('#judul').on('keyup', function() {
        this.value = this.value.toUpperCase();
    });

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
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countKejuaraan}</span>
                                        <input type="text" class="form-control" placeholder="JUARA 1 LOMBA KARYA TULIS ILMIAH TINGKAT NASIONAL" name="kejuaraan[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupNoKejuaraan = `<div class="row mt-1 no-kejuaraan-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countKejuaraan}</span>
                                        <input type="text" class="form-control" placeholder="120/KTI/Nas/2022" name="no_kejuaraan[]" required>
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
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countSertifikat}</span>
                                        <input class="form-control" type="text" placeholder="LEMBAGA SERTIFIKASI PROFESI - NETWORK ENGINEER" id="sertifikat"
                                                name="sertifikat[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupNoSertifikat = `<div class="row mt-1 no-sertifikat-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countSertifikat}</span>
                                        <input type="text" class="form-control" placeholder="62022 3 00552 2022" id="no_sertifikat" name="no_sertifikat[]"
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
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col">
                                                <div class="input-group">
                                                    <span class="input-group-text">${countBeasiswa}</span>
                                                    <input type="text" class="form-control" placeholder="BEASISWA KIP 2022 GANJIL" name="beasiswa[]" required>
                                                </div>
                                            </div>
                                        </div>`;

            let hapusBeasiswa =
                `<button type="button" class="btn btn-xs btn-danger hapusBeasiswa"><i class="bx bx-minus" style="font-size: 10px;"></i></button>`;

            console.log(hapusBeasiswa);

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
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countOrganisasi}</span>
                                        <input class="form-control" type="text" placeholder="BADAN EKSEKUTIF MAHASISWA 2022-2023" id="organisasi"
                                                name="organisasi[]" required>
                                    </div>
                                </div>
                            </div>`;

            let grupJabatanOrganisasi = `<div class="row mt-1 no-organisasi-item">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">${countOrganisasi}</span>
                                        <input type="text" class="form-control" placeholder="KETUA" id="no_Organisasi" name="no_organisasi[]"
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
            let lastJabatanOrganisasi = $('#grupJabatanOrganisasi .no-organisasi-item');

            if (lastOrganisasi.length > 0 && lastJabatanOrganisasi.length > 0) {
                lastOrganisasi.last().remove();
                lastJabatanOrganisasi.last().remove();
            }

            // Jika hanya tersisa satu set, hapus tombol hapus
            if ($('#grupOrganisasi .organisasi-item').length === 0 && $('#grupJabatanOrganisasi .no-organisasi-item').length === 0) {
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
                Swal.fire(
                    'Sipp!',
                    'Data berhasil dikirim.',
                    'success'
                );
                this.submit();
            }

        });
    });
</script>
