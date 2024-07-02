@extends('layout.main')
@section('contain')
    <div class="card">
        <div class="card-header" style="background-color: rgb(255, 255, 255)">
            <h4 class="card-title text-dark m-2">Surat Keterangan Pendamping Ijazah</h4>
            <p class="card-category m-2">Formulir Pengisisan Surat Keterangan Pendamping Ijazah</p>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Input Date</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($data_skpi as $skpi)
                        <tr>
                            <td>{{ $skpi->nim }}</td>
                            <td>{{ $skpi->nama }}</td>
                            <td>{{ $skpi->program_studi }}</td>
                            <td>{{ $skpi->updated_at }}</td>
                            <td><span class="badge badge-{{ $skpi->status_warna }}">{{ $skpi->status_keterangan }}</span>
                            </td>
                            <td>
                                <a href="{{ route('cek', $skpi->id) }}" id="cek{{ $skpi->id }}" onclick="cek()"
                                    target="_blank" role="button" class="btn btn-sm text-white"
                                    style="background-color: #7066e0">
                                    <i class="fa fa-eye"></i> Cek
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <iframe src="https://docs.google.com/document/d/1GUUh0_o5WTmquXLGEnLnEzVJZlCsJY2W/"></iframe> --}}

            </table>

        </div>
    </div>
@endsection
