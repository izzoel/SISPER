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
                        <button type="submit" class="btn btn-primary">
                            <svg class="loading" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25" />
                                <path
                                    d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z"
                                    class="spinner_ajPY" />
                            </svg>
                            <span class="loadingBtn">
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
