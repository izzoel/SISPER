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
                                        <h4>Formulir Pengajuan Surat Keterangan Bebas Lab</h4>
                                        <h5 class="card-subtitle text-muted">Unit Depo Universitas Borneo Lestari</h5>
                                    </div>

                                    <div class="row mt-5">
                                        <label for="nama" class="col-md-2 col-form-label">Nama Lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="..." id="nama" name="nama">
                                        </div>
                                        <label for="nim" class="col-md-2 col-form-label">Nomor Induk Mahasiswa (NIM)</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nim" name="nim">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="email" class="col-md-2 col-form-label">Email</label>
                                        <div class="col">
                                            <input class="form-control" type="email" placeholder="..." id="email" name="email">
                                        </div>

                                        <label for="telepon" class="col-md-2 col-form-label">Telepon (WA)</label>
                                        <div class="col">
                                            <input class="form-control" type="tel" placeholder="089712301231" id="telepon" name="telepon" pattern="[0-9]*" inputmode="numeric"
                                                title="Hanya menerima nomor">

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
                                        <label for="judul" class="col-md-2 col-form-label">Judul Penelitian</label>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="..." id="judul" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="waktu" class="col-md-2 col-form-label">Waktu Penelitian</label>
                                        <div class="col">
                                            <input class="form-control" type="date" placeholder="..." id="waktu" name="waktu">
                                        </div>
                                        <label for="tempat" class="col-md-2 col-form-label">Tempat Penelitian</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="tempat" name="tempat">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label class="col-md-2 col-form-label">Pakai Lab. UNBL?</label>
                                        <div class="col">
                                            <div class="form-control">
                                                <label class="form-check-label" for="ya"> Ya </label>
                                                <input name="fasilitas" class="form-check-input me-3" type="radio" value="" id="ya" checked="">

                                                <label class="form-check-label" for="tidak"> Tidak </label>
                                                <input name="fasilitas" class="form-check-input" type="radio" value="" id="tidak">
                                            </div>
                                        </div>
                                        <label for="file" class="col-md-2 col-form-label">Upload Berkas</label>
                                        <div class="col">
                                            <input class="form-control" type="file" placeholder="..." id="file" name="file">
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
