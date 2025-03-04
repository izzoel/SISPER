<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#M_S_entry">
                        &#9776; ENTRY
                    </button>

                    <div class="card-text">
                        <table id="entry" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-start" data-priority="3">#</th>
                                    <th class="text-start" data-priority="1">NIM</th>
                                    <th class="text-start">Nama</th>
                                    <th class="text-start">Prodi</th>
                                    <th class="text-start">Status</th>
                                    <th class="text-start col-auto" data-priority="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                    <tr>
                                        <td class="text-start">{{ $loop->iteration }}</td>
                                        <td class="text-start">{{ $entry->nim }}</td>
                                        <td class="text-start">{{ $entry->nama }}</td>
                                        <td class="text-start">{{ $entry->prodi }}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge rounded-pill {{ $entry->status ? 'bg-label-warning' : 'bg-label-danger' }}">{{ $entry->status ? $entry->status : 'Belum' }}</span>
                                        </td>
                                        <td class="text-center px-0">
                                            <a type="button" class="U_B_entry btn btn-sm btn-primary text-white" data-nim="#M_U_entry-{{ $entry->nim }}">
                                                <span class="tf-icons bx bx-printer"></span> Print
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
