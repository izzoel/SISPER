<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between flex-sm-row flex-column gap-3">
                        <div class="flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title mb-3">
                                <div class="text-center">
                                    <h4>Formulir Pengajuan Surat Keterangan Pendamping Ijazah</h4>
                                    <h5 class="card-subtitle text-muted">Biro Administrasi Akademik dan Kemahasiswaan UNBL</h5>
                                </div>

                                <form id="forpiForm" action="{{ route('forpi_submit_store') }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <label for="nama" class="col-md-2 col-form-label">Nama Lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="..." id="nama" name="nama" required value="{{ $mahasiswa->nama }}">
                                        </div>
                                        <label for="nim" class="col-md-2 col-form-label">NIM</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nim" name="nim" disabled value="{{ $mahasiswa->nim }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="tempat" class="col-md-2 col-form-label">Tempat Lahir</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="tempat" name="tempat_lahir" required
                                                value="{{ $mahasiswa->tempat_lahir }}">
                                        </div>
                                        <label for="tanggal" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col">
                                            <input type="text" id="tanggal" name="tanggal_lahir" class="form-control" placeholder="Pilih Tanggal"
                                                value="{{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d/m/Y') }}" readonly
                                                style=" cursor: default; background-color: #fff;">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="prodi" class="col-md-2 col-form-label">Program Studi</label>
                                        <div class="col">
                                            <select class="form-select" id="prodi" name="prodi" disabled>
                                                <option disabled>-- Pilih --</option>
                                                <option disabled>-[Fakultas Farmasi ]-</option>
                                                <option value="SARJANA FARMASI" @selected($mahasiswa->prodi == 'SARJANA FARMASI')>&nbsp;&nbsp;&nbsp;Sarjana Farmasi</option>
                                                <option value="DIPLOMA TIGA FARMASI" @selected($mahasiswa->prodi == 'DIPLOMA TIGA FARMASI')>&nbsp;&nbsp;&nbsp;Diploma Tiga Farmasi</option>
                                                <option value=" " disabled> </option>
                                                <option disabled>-[Fakultas Ilmu Kesehatan dan Sains Teknologi ]-</option>
                                                <option value="SARJANA ADMINISTRASI RUMAH SAKIT" @selected($mahasiswa->prodi == 'SARJANA ADMINISTRASI RUMAH SAKIT')>&nbsp;&nbsp;&nbsp;Sarjana Administrasi Rumah Sakit
                                                </option>
                                                <option value="SARJANA GIZI" @selected($mahasiswa->prodi == 'SARJANA GIZI')>&nbsp;&nbsp;&nbsp;Sarjana Gizi</option>
                                                <option value="DIPLOMA TIGA ANALIS KESEHATAN" @selected($mahasiswa->prodi == 'DIPLOMA TIGA ANALIS KESEHATAN')>&nbsp;&nbsp;&nbsp;Diploma Tiga Analis Kesehatan</option>
                                                <option value=" " disabled> </option>
                                                <option disabled>-[Fakultas Ilmu Sosial dan Humaniora ]-</option>
                                                <option value="SARJANA HUKUM" @selected($mahasiswa->prodi == 'SARJANA HUKUM')>&nbsp;&nbsp;&nbsp;Sarjana Hukum</option>
                                                <option value="SARJANA MANAJEMEN" @selected($mahasiswa->prodi == 'SARJANA MANAJEMEN')>&nbsp;&nbsp;&nbsp;Sarjana Manajemen</option>
                                                <option value="SARJANA PENDIDIKAN GURU SEKOLAH DASAR" @selected($mahasiswa->prodi == 'SARJANA PENDIDIKAN GURU SEKOLAH DASAR')>&nbsp;&nbsp;&nbsp;Sarjana Pendidikan Guru Sekolah
                                                    Dasar</option>
                                            </select>
                                        </div>
                                        <label for="gelar" class="col-md-2 col-form-label">Gelar</label>
                                        <div class="col">
                                            <input class="form-control" type="text" id="gelar" name="gelar" disabled value="{{ $gelar }}">
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <label for="masuk" class="col-md-2 col-form-label">Tahun Masuk</label>
                                        <div class="col">
                                            <input type="text" id="masuk" name="masuk" class="form-control" placeholder="Pilih Tahun" required
                                                style="cursor: default; background-color: #fff; caret-color: transparent;">

                                        </div>
                                        <label for="yudisium" class="col-md-2 col-form-label">Tanggal Yudisium</label>
                                        <div class="col">
                                            <input type="text" id="yudisium" name="yudisium" class="form-control" placeholder="Pilih Tanggal" required
                                                style="cursor: default; background-color: #fff; caret-color: transparent;">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="judul" class="col-md-2 col-form-label">Judul Skripsi / LTA / KTI</label>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="..." id="judul" rows="2" name="judul" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="pisn" class="col-md-2 col-form-label">Nomor Ijazah (PISN)</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="pisn" name="pisn" disabled
                                                value="{{ $mahasiswa->pisn }}">
                                        </div>
                                        <label for="toefl" class="col-md-2 col-form-label">Nilai TOEFL</label>
                                        <div class="col">
                                            <input class="form-control" type="number" placeholder="..." id="toefl" name="toefl" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupKejuaraan" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="kejuaraan" class="form-label col-form-label">Kejuaraan</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="Juara 1 Lomba Karya Tulis Ilmiah Tingkat Nasional"
                                                            id="kejuaraan" name="kejuaraan[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="grupNoKejuaraan" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="no_kejuaraan" class="form-label col-form-label">Nomor</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="120/KTI/Nas/2022" id="no_kejuaraan" name="no_kejuaraan[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="btnKejuaraan" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahKejuaraan"><i class="bx bx-plus" style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupSertifikat" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="sertifikat" class="form-label col-form-label">Sertifikat</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="Lembaga Sertifikasi Profesi - Network Engineer" id="sertifikat"
                                                            name="sertifikat[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="grupNoSertifikat" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="no_sertifikat" class="form-label col-form-label">Nomor</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="62022 3 00552 2022" id="no_sertifikat" name="no_sertifikat[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="btnSertifikat" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahSertifikat"><i class="bx bx-plus" style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div id="grupBeasiswa">
                                        <div class="row mt-3">
                                            <div class="col-md-2">
                                                <label for="beasiswa" class="col-form-label">Beasiswa</label>
                                            </div>
                                            <div class="col">
                                                <div class="input-group">
                                                    <span class="input-group-text">1</span>
                                                    <input type="text" class="form-control" placeholder="Beasiswa KIP 2022" id="beasiswa" name="beasiswa[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="btnBeasiswa" class="col text-end">
                                        <button type="button" class="btn btn-xs btn-primary tambahBeasiswa"><i class="bx bx-plus" style="font-size: 10px;"></i></button>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupOrganisasi" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="organisasi" class="form-label col-form-label">Organisasi</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="BADAN EKSEKUTIF MAHASISWA 2022-2023" id="organisasi"
                                                            name="organisasi[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="grupJabatanOrganisasi" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="jabatan_organisasi" class="form-label col-form-label">Jabatan</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">1</span>
                                                        <input type="text" class="form-control" placeholder="KETUA" id="jabatan_organisasi" name="jabatan_organisasi[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="btnOrganisasi" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahOrganisasi"><i class="bx bx-plus" style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-5">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
