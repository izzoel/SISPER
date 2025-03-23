<div class="modal fade" id="M_S_ijazah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Ijazah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formIjazah">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="periode_lulus">Periode Lulus<span class="text-danger">*</span></label>
                        <select class="form-select" id="periode_lulus" required></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tanggal_yudisium">Tanggal Yudisium<span class="text-danger">*</span></label>
                        <select class="form-select" id="tanggal_yudisium" required></select>
                        <span class="text-muted" style="font-size: .7rem; font-style: italic"> (hanya data dengan status <small
                                class="badge rounded-pill bg-label-primary">Eligible</small> yang akan dibuat ijazah)</span>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
