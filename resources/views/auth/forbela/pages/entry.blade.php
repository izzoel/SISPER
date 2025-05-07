<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#M_S_entry">
                        &#9776; ENTRY
                    </button>

                    <div class="card-text">
                        <table id="table_{{ request()->segment(2) }}" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-start" data-priority="3">#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    @if (Auth::check() && Auth::user()->name == 'verifikator')
                                        <th>Surat</th>
                                    @else
                                        <th>Bukti Pembayaran</th>
                                    @endif
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
