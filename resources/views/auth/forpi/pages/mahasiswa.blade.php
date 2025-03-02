@extends('layout.template')

@section(Route::currentRouteName())
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
                            <table id="mahasiswa" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-start" data-priority="3">#</th>
                                        <th class="text-start" data-priority="1">NIM</th>
                                        <th class="text-start">Nama</th>
                                        <th class="text-start">Prodi</th>
                                        <th class="text-start">PISN</th>
                                        <th class="text-start">Periode Lulus</th>
                                        <th class="text-start col-auto" data-priority="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <tr>
                                            <td class="text-start">{{ $loop->iteration }}</td>
                                            <td class="text-start">{{ $mahasiswa->nim }}</td>
                                            <td class="text-start">{{ $mahasiswa->nama }}</td>
                                            <td class="text-start">{{ $mahasiswa->prodi }}</td>
                                            <td class="text-start">
                                                <span
                                                    class="badge rounded-pill {{ $mahasiswa->pisn ? 'bg-label-primary' : 'bg-label-danger' }}">{{ $mahasiswa->pisn ? $mahasiswa->pisn : 'Belum' }}</span>
                                            </td>
                                            <td class="text-start">{{ $mahasiswa->periode }}</td>
                                            <td class="text-center px-0">
                                                <a type="button" class="U_B_mahasiswa text-info" data-nim="#M_U_mahasiswa-{{ $mahasiswa->nim }}">
                                                    <span class="tf-icons bx bx-edit"></span>edit
                                                </a>

                                                <span class="mx-1">|</span>

                                                <a type="button" class="D_B_mahasiswa text-danger" data-nim="{{ $mahasiswa->nim }}">
                                                    <span class="tf-icons bx bxs-x-square"></span>
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
@endsection
