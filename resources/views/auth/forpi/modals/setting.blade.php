<div class="modal modalUpdate fade" id="M_U_setting" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-setting" role="tabpanel">
                        <form id="U_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="U_prodi">Program Studi</label>
                                <input type="text" class="form-control" id="U_prodi" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_kaprodi">Kaprodi</label>
                                <span class="form-text text-danger"><i> (dengan gelar)</i></span>
                                <input type="text" class="form-control" id="U_kaprodi" name="kaprodi" placeholder="..." required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nik">NIK</label>
                                <input type="text" class="form-control" id="U_nik" name="nik" placeholder="..." required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_terbit">Tanggal Terbit</label>
                                <input type="date" class="form-control" id="U_tanggal_terbit" name="tanggal_terbit" required />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
