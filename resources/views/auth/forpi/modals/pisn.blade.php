<div class="modal fade" id="M_S_pisn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah PISN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="importForm" action="{{ route('forpi_pisn_import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">File Upload</label>
                        <span class="text-muted" style="font-size: .7rem; font-style: italic"> (data yang sama akan ditimpa)</span>
                        <input class="form-control" type="file" id="file" name="file" required />
                    </div>
                    <a href="{{ asset('Template Import -- PISN.csv') }}" download="Template Import -- PISN.csv">
                        <i class="tf-icons bx bxs-download"></i>Template <span class="badge bg-label-danger">.csv</span>
                    </a>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
