<div>
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

                                    <div class="row mt-5">
                                        <label for="nama" class="col-md-2 col-form-label">Nama Lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="..." id="nama" name="nama">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="tempat" class="col-md-2 col-form-label">Tempat Lahir</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="tempat" name="tempat">
                                        </div>
                                        <label for="tanggal" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col">
                                            <input class="form-control" type="date" placeholder="..." id="tanggal" name="tanggal">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="prodi" class="col-md-2 col-form-label">Program Studi</label>
                                        <div class="col">
                                            <select id="prodi" name="prodi" class="form-select">
                                                <option>-- pilih --</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="nim" class="col-md-2 col-form-label">Nomor Induk Mahasiswa (NIM)</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nim" name="nim" disabled>
                                        </div>
                                        <label for="studi" class="col-md-2 col-form-label">Lama Studi</label>
                                        <div class="col">
                                            <input class="form-control" type="number" placeholder="..." id="studi" name="studi">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="judul" class="col-md-2 col-form-label">Judul Skripsi / LTA / KTI</label>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="..." id="judul" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="pisn" class="col-md-2 col-form-label">Nomor Ijazah (PISN)</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="pisn" name="pisn" disabled>
                                        </div>
                                        <label for="toefl" class="col-md-2 col-form-label">Nilai TOEFL</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="toefl" name="toefl">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="pencapaian" class="col-md-2 col-form-label">Pencapaian / Penghargaan Kejuaraan</label>
                                        <div class="col">
                                            <input class="form-control mb-1" type="text" placeholder="JUARA 1 LOMBA KARYA TULIS ILMIAH TINGKAT NASIONAL" id="pencapaian"
                                                name="pencapaian[]">
                                        </div>
                                        <label for="no_pencapaian" class="col-md-2 col-form-label">Nomor</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="120/KTI/Nas/2022" id="no_pencapaian" name="no_pencapaian[]">
                                            <div class="row mt-1">
                                                <div class="col text-end">
                                                    <a class="btn btn-xs btn-primary" href="#" role="button"><i class="bx bx-plus" style="font-size: 10px;"></i></a>
                                                    <a class="btn btn-xs btn-danger" href="#" role="button"><i class="bx bx-minus" style="font-size: 10px;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="sertifikat" class="col-md-2 col-form-label">Sertifikat profesi / kompetensi</label>
                                        <div class="col">
                                            <input class="form-control mb-1" type="text" placeholder="LEMBAGA SERTIFIKASI PROFESI - NETWORK ENGINEER" id="sertifikat"
                                                name="sertifikat[]">
                                        </div>
                                        <label for="no_sertifikat" class="col-md-2 col-form-label">Nomor</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="62090 3122 3 000100552 2022" id="no_sertifikat" name="no_sertifikat[]">
                                            <div class="row mt-1">
                                                <div class="col text-end">
                                                    <a class="btn btn-xs btn-primary" href="#" role="button"><i class="bx bx-plus" style="font-size: 10px;"></i></a>
                                                    <a class="btn btn-xs btn-danger" href="#" role="button"><i class="bx bx-minus" style="font-size: 10px;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="beasiswa" class="col-md-2 col-form-label">Beasiswa selama kuliah</label>
                                        <div class="col text-end">
                                            <input class="form-control mb-1" type="text" placeholder="BEASISWA KIP 2022 GANJIL" id="beasiswa" name="beasiswa[]">
                                            <div class="col text-end">
                                                <a class="btn btn-xs btn-primary" href="#" role="button"><i class="bx bx-plus" style="font-size: 10px;"></i></a>
                                                <a class="btn btn-xs btn-danger" href="#" role="button"><i class="bx bx-minus" style="font-size: 10px;"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="organisasi" class="col-md-2 col-form-label">Pengalaman Organisasi</label>
                                        <div class="col">
                                            <input class="form-control mb-1" type="text" placeholder="BADAN EKSEKUTIF MAHASISWA 2022-2023" id="organisasi"
                                                name="organisasi[]">
                                        </div>
                                        <label for="jabatan_organisasi" class="col-md-2 col-form-label">Jabatan</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="KETUA" id="jabatan_organisasi" name="jabatan_organisasi[]">
                                            <div class="row mt-1">
                                                <div class="col text-end">
                                                    <a class="btn btn-xs btn-primary" href="#" role="button"><i class="bx bx-plus" style="font-size: 10px;"></i></a>
                                                    <a class="btn btn-xs btn-danger" href="#" role="button"><i class="bx bx-minus" style="font-size: 10px;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
