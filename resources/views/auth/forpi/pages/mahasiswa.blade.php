<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#M_S_mahasiswa">
                        &#10010; Mahasiswa
                    </button>
                    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#M_S_pisn">
                        &#10010; PISN
                    </button>

                    @include('auth.forpi.modals.mahasiswa')
                    @include('auth.forpi.modals.pisn')

                    <div class="card-text">
                        <table id="table_{{ request()->segment(2) }}" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th class="text-start">PISN</th>
                                    <th class="text-start">Periode Lulus</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
