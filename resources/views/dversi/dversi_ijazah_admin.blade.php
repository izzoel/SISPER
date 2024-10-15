@extends('layout.main')
@section('admin-dversi')
    <div class="card">
        <div class="card-header" style="background-color: rgb(255, 255, 255)">
            <h4 class="card-title text-dark m-2">Digital Verifikasi Data Pemilik Ijazah</h4>
            <p class="card-category m-2">Verifikasi Identitas Pemilik Ijazah</p>
        </div>
        <div class="card-body">
            <div class="row m-0 p-0">
                <div class="col-2 m-0 p-0">
                    <select id="jenjangFilter" class="mb-2 custom-select custom-select-sm">
                        <option value="all">-- Semua --</option>
                    </select>
                </div>
            </div>
            <table id="dversi" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>TTL</th>
                        <th>NIK</th>
                        <th>PISN</th>
                        <th>JENJANG</th>
                        <th>PRODI</th>
                        <th>IJAZAH</th>
                        <th>VERIFIKASI</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($admin_dversi as $dversi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dversi->nim }}</td>
                            <td>{{ $dversi->nama }}</td>
                            <td>{{ $dversi->ttl }}</td>
                            <td>{{ $dversi->nik }}</td>
                            <td>{{ $dversi->pisn }}</td>
                            <td>{{ $dversi->jenjang }}</td>
                            <td>{{ $dversi->prodi }}</td>
                            <td>
                                <a href="https://drive.google.com/uc?id={{ $dversi->ijazah }}" target="_blank">[VERIFIKASI] -- {{ $dversi->nim }}</a>
                            </td>
                            <td>{{ $dversi->verifikasi }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection
