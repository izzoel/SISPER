<div class="modal fade" id="lapor_{{ strtolower($data['menuData']['menu']) }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <button type="button" class="btn btn-outline-danger">
                        Lapor !
                    </button>
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="importForm" action="{{ route('forpi_submit_lapor', ['menu' => $data['menuData']['menu'], 'nim' => $mahasiswa['nim']]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Deskripsikan Laporan</label>
                        <textarea class="form-control" placeholder="saya salah mengisi judul skripsi" id="lapor" rows="2" name="lapor"></textarea>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
