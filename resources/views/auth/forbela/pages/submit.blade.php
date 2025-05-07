@include('auth.' . strtolower($data['menuData']['menu']) . '.modals.lapor')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between flex-sm-row flex-column gap-3">
                        <div class="flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title mb-3">
                                <div class="text-center">
                                    <h4>Formulir Pengajuan Surat Keterangan Bebas Pembayaran Laboratorium</h4>
                                </div>
                                <div class="divider mb-5">
                                    <div class="divider-text text-muted">Unit Pelaksana Teknis Laboratorium Borneo Lestari</div>
                                </div>
                                <form id="{{ request()->segment(1) }}Form" action="{{ route(request()->segment(1) . '_submit_store') }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <label for="nama" class="col-md-2 col-form-label">Nama Lengkap</label>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="..." id="nama" name="nama" required
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['nama'] : $mahasiswa->nama }}" disabled>
                                        </div>
                                        <label for="nim" class="col-md-2 col-form-label">NIM</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nim" name="nim" disabled
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['nim'] : $mahasiswa->nim }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="tempat" class="col-md-2 col-form-label">Tempat Lahir</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="tempat" name="tempat_lahir" required
                                                value="{{ session('sudah_mengisi') ? strtoupper(session('sudah_mengisi')['tempat_lahir']) : strtoupper($mahasiswa->tempat_lahir) }}"
                                                disabled>
                                        </div>
                                        <label for="tanggal" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col">
                                            <input type="text" id="tanggal" name="tanggal_lahir" class="form-control" placeholder="Pilih Tanggal"
                                                value="{{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d/m/Y') }}" readonly style=" cursor: default; " disabled>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="nik" class="col-md-2 col-form-label">NIK</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nik" name="nik" required
                                                value="{{ session('sudah_mengisi') ? strtoupper(session('sudah_mengisi')['nik']) : strtoupper($mahasiswa->nik) }}" disabled>
                                        </div>
                                        <label for="tanggal_penelitian" class="col-md-2 col-form-label">Rentang Tanggal Penelitian<span
                                                class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text" id="tanggal_penelitian" name="tanggal_penelitian" class="form-control" placeholder="Pilih Tanggal" value=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="email" class="col-md-2 col-form-label">email<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input class="form-control" type="email" placeholder="..." id="email" name="email"
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['email'] : $mahasiswa->email }}" required>
                                        </div>
                                        <label for="pembayaran" class="col-md-2 col-form-label">Upload Bukti Pembayaran<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input class="form-control" type="file" id="pembayaran" name="pembayaran" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="judul" class="col-md-2 col-form-label">Judul Penelitian<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="..." id="judul" rows="2" name="judul" required>{{ session('sudah_mengisi') ? session('data_submit')['judul'] : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-text">
                                        @if (session('sudah_mengisi'))
                                            <div class="alert alert-success" role="alert">Anda sudah mengisi form ini pada
                                                {{ \Carbon\Carbon::parse(session('data_submit')['updated_at'])->locale('id')->translatedFormat('d F Y') }} pukul
                                                {{ \Carbon\Carbon::parse(session('data_submit')['updated_at'])->locale('id')->translatedFormat('H:i') }}
                                                <br>Jika terdapat kesalahan, silahkan <button id="laporButton" class="btn btn-xs btn-outline-danger rounded-1">
                                                    Lapor!
                                                </button> di tombol paling atas.
                                            </div>
                                        @else
                                            <br>Jika terdapat kesalahan, silahkan <button id="laporButton" class="btn btn-xs btn-outline-danger rounded-1">
                                                Lapor!
                                            </button> di tombol paling atas.
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
