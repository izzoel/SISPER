<div class="modal modalFakultas fade" id="M_U_fakultas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="U_fakultas" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="F_fakultas">Fakultas</label>
                        <input type="text" class="form-control" id="F_fakultas" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="F_dekan">Dekan</label>
                        <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                        <input type="text" class="form-control" id="F_dekan" name="dekan" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="F_nik">NIK</label>
                        <input type="text" class="form-control" id="F_nik" name="nik" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tanggal_terbit">Tanggal Terbit Dokumen</label>
                        <input type="date" class="form-control" id="F_tanggal_terbit" name="tanggal_terbit" required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalProdi fade" id="M_U_prodi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PROGRAM STUDI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="U_prodi" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="P_prodi">Program Studi</label>
                        <input type="text" class="form-control" id="P_prodi" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="P_kaprodi">Kaprodi</label>
                        <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                        <input type="text" class="form-control" id="P_kaprodi" name="kaprodi" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="P_nik">NIK</label>
                        <input type="text" class="form-control" id="P_nik" name="nik" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="P_tanggal_terbit">Tanggal Terbit Dokumen</label>
                        <input type="date" class="form-control" id="P_tanggal_terbit" name="tanggal_terbit" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="P_akreditasi">Akreditasi<span class="text-danger">*</span></label>
                        <select class="form-select" id="P_akreditasi" name="akreditasi" required>
                            <option selected disabled>-- Pilih --</option>
                            <option value="Program Studi : Unggul">Unggul</option>
                            <option value="Program Studi : Baik Sekali">Baik Sekali</option>
                            <option value="Program Studi : Baik">Baik</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="P_no_akreditasi">Nomor Akreditasi</label>
                        <input type="text" class="form-control" id="P_no_akreditasi" name="no_akreditasi" placeholder="SK LAM PT Kes Nomor : 0322/LAM-PTKes/Akr/Sar/VI/2019"
                            required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalRektor fade" id="M_U_rektor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rektor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="U_rektor" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="R_nama">Nama</label>
                        <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                        <input type="text" class="form-control" id="R_nama" name="nama" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="R_nik">NIK</label>
                        <input type="text" class="form-control" id="R_nik" name="nik" placeholder="..." required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalKalaboratorium fade" id="M_U_kalaboratorium" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kepala Laboratorium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="U_kalaboratorium" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="K_nama">Nama</label>
                        <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                        <input type="text" class="form-control" id="K_nama" name="nama" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="K_nik">NIK</label>
                        <input type="text" class="form-control" id="K_nik" name="nik" placeholder="..." required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalLaboran fade" id="M_U_laboran" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laboran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="U_laboran" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="L_laboran">Nama</label>
                        <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                        <input type="text" class="form-control" id="L_laboran" name="laboran" placeholder="..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="L_penugasan">Penugasan</label>
                        <input type="text" class="form-control" id="L_penugasan" name="penugasan" placeholder="..." required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
