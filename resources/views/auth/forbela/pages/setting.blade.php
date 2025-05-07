<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3">
                        &#9776; KEPALA LABORATORIUM
                    </button>
                    @include('auth.' . request()->segment(1) . '.modals.setting')
                    <div class="card-text">
                        <div class="row">

                            <table id="{{ 'table_' . request()->segment(1) . '_setting_kalaboratorium' }}" class="table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nik</th>
                                        <th>Jabatan</th>
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
</div>
