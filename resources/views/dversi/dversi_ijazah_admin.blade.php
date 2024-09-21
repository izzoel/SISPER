@extends('layout.main')
@section('admin-dversi')
    <div class="card">
        <div class="card-header" style="background-color: rgb(255, 255, 255)">
            <h4 class="card-title text-dark m-2">Digital Verifikasi Data Pemilik Ijazah</h4>
            <p class="card-category m-2">Verifikasi Identitas Pemilik Ijazah</p>
        </div>
        <div class="card-body">
            <table id="dversi" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>NIK</th>
                        <th>PISN</th>
                        <th>Prodi</th>
                        <th>Ijazah</th>
                        <th>verifikasi</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($admin_dversi as $dversi)
                        <tr>
                            <td>{{ $dversi->nim }}</td>
                            <td>{{ $dversi->nama }}</td>
                            <td>{{ $dversi->ttl }}</td>
                            <td>{{ $dversi->nik }}</td>
                            <td>{{ $dversi->pisn }}</td>
                            <td>{{ $dversi->prodi }}</td>
                            <td>
                                <a href="{{ $dversi->ijazah }}" target="_blank">[VERIFIKASI] -- {{ $dversi->nim }}</a>
                            </td>
                            <td>{{ $dversi->verifikasi }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection
