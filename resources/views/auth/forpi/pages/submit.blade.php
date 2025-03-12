@php
    use Illuminate\Support\Str;

    $disabled = session('sudah_mengisi') ? 'disabled' : '';
    $color = session('sudah_mengisi') ? 'background-color: #eceef1' : 'background-color: #fff';
    $tahun_masuk = session('sudah_mengisi') ? \Carbon\Carbon::parse(session('sudah_mengisi')['tahun_masuk'])->translatedFormat('Y') : $mahasiswa->tahun_masuk;
    $yudisium = session('sudah_mengisi') ? \Carbon\Carbon::parse(session('sudah_mengisi')['yudisium'])->locale('id')->translatedFormat('d F Y') : $mahasiswa->yudisium;
    $kejuaraan = session('sudah_mengisi')['kejuaraan'] ?? '-';
    $sertifikat = session('sudah_mengisi')['sertifikat'] ?? '-';
    $beasiswa = session('sudah_mengisi')['beasiswa'] ?? '-';
    $organisasi = session('sudah_mengisi')['organisasi'] ?? '-';
    $listKejuaraan = $kejuaraan !== '-' ? explode("\n", $kejuaraan) : [''];
    $listSertifikat = $sertifikat !== '-' ? explode("\n", $sertifikat) : [''];
    $listBeasiswa = $beasiswa !== '-' ? explode("\n", $beasiswa) : [''];
    $listOrganisasi = $organisasi !== '-' ? explode("\n", $organisasi) : [''];

@endphp
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
                                    <h4>Formulir Pengajuan Surat Keterangan Pendamping Ijazah</h4>
                                </div>
                                <div class="divider mb-5">
                                    <div class="divider-text text-muted">Biro Administrasi Akademik dan Kemahasiswaan UNBL</div>
                                </div>
                                <form id="forpiForm" action="{{ route('forpi_submit_store') }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <label for="nama" class="col-md-2 col-form-label">Nama Lengkap<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="..." id="nama" name="nama" required
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['nama'] : $mahasiswa->nama }}" {{ $disabled }}>
                                        </div>
                                        <label for="nim" class="col-md-2 col-form-label">NIM</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="nim" name="nim" disabled
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['nim'] : $mahasiswa->nim }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="tempat" class="col-md-2 col-form-label">Tempat Lahir<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="tempat" name="tempat_lahir" required
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['tempat_lahir'] : $mahasiswa->tempat_lahir }}" {{ $disabled }}>
                                        </div>
                                        <label for="tanggal" class="col-md-2 col-form-label">Tanggal Lahir<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text" id="tanggal" name="tanggal_lahir" class="form-control" placeholder="Pilih Tanggal"
                                                value="{{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d/m/Y') }}" readonly
                                                style=" cursor: default; {{ $color }}; " {{ $disabled }}>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="prodi" class="col-md-2 col-form-label">Program Studi</label>
                                        <div class="col">
                                            <select class="form-select" id="prodi" name="prodi" disabled>
                                                <option disabled>-- Pilih --</option>
                                                <option disabled>-[Fakultas Farmasi ]-</option>
                                                <option value="SARJANA FARMASI" @selected($mahasiswa->prodi == 'SARJANA FARMASI')>&nbsp;&nbsp;&nbsp;Sarjana Farmasi</option>
                                                <option value="DIPLOMA TIGA FARMASI" @selected($mahasiswa->prodi == 'DIPLOMA TIGA FARMASI')>&nbsp;&nbsp;&nbsp;Diploma Tiga Farmasi</option>
                                                <option value=" " disabled> </option>
                                                <option disabled>-[Fakultas Ilmu Kesehatan dan Sains Teknologi ]-</option>
                                                <option value="SARJANA ADMINISTRASI RUMAH SAKIT" @selected($mahasiswa->prodi == 'SARJANA ADMINISTRASI RUMAH SAKIT')>&nbsp;&nbsp;&nbsp;Sarjana Administrasi Rumah Sakit
                                                </option>
                                                <option value="SARJANA GIZI" @selected($mahasiswa->prodi == 'SARJANA GIZI')>&nbsp;&nbsp;&nbsp;Sarjana Gizi</option>
                                                <option value="DIPLOMA TIGA ANALIS KESEHATAN" @selected($mahasiswa->prodi == 'DIPLOMA TIGA ANALIS KESEHATAN')>&nbsp;&nbsp;&nbsp;Diploma Tiga Analis Kesehatan</option>
                                                <option value=" " disabled> </option>
                                                <option disabled>-[Fakultas Ilmu Sosial dan Humaniora ]-</option>
                                                <option value="SARJANA HUKUM" @selected($mahasiswa->prodi == 'SARJANA HUKUM')>&nbsp;&nbsp;&nbsp;Sarjana Hukum</option>
                                                <option value="SARJANA MANAJEMEN" @selected($mahasiswa->prodi == 'SARJANA MANAJEMEN')>&nbsp;&nbsp;&nbsp;Sarjana Manajemen</option>
                                                <option value="SARJANA PENDIDIKAN GURU SEKOLAH DASAR" @selected($mahasiswa->prodi == 'SARJANA PENDIDIKAN GURU SEKOLAH DASAR')>&nbsp;&nbsp;&nbsp;Sarjana Pendidikan Guru Sekolah
                                                    Dasar</option>
                                            </select>
                                        </div>
                                        <label for="gelar" class="col-md-2 col-form-label">Gelar</label>
                                        <div class="col">
                                            <input class="form-control" type="text" id="gelar" name="gelar" disabled value="{{ $gelar }}">
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <label for="masuk" class="col-md-2 col-form-label">Tahun Masuk<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text" id="masuk" name="masuk" class="form-control" placeholder="Pilih Tahun" required
                                                style="cursor: default; {{ $color }};" {{ $disabled }} value="{{ $tahun_masuk }}">
                                        </div>
                                        <label for="yudisium" class="col-md-2 col-form-label">Tanggal Yudisium<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text" id="yudisium" name="yudisium" class="form-control" placeholder="Pilih Tanggal" required
                                                style="cursor: default; {{ $color }};" {{ $disabled }} value="{{ $yudisium }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="judul" class="col-md-2 col-form-label">Judul Skripsi / LTA / KTI<span class="required text-danger">*</span></label>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="..." id="judul" rows="2" name="judul" required {{ $disabled }}>{{ session('sudah_mengisi') ? session('sudah_mengisi')['judul'] : $mahasiswa->judul }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="pisn" class="col-md-2 col-form-label">Nomor Ijazah (PISN)</label>
                                        <div class="col">
                                            <input class="form-control" type="text" placeholder="..." id="pisn" name="pisn" disabled
                                                value="{{ $mahasiswa->pisn }}">
                                        </div>
                                        <label for="toefl" class="col-md-2 col-form-label">Nilai TOEFL <small class="text-muted">(Opsional)</small></label>
                                        <div class="col">
                                            <input class="form-control" type="number" placeholder="..." id="toefl" name="toefl" {{ $disabled }}
                                                value="{{ session('sudah_mengisi') ? session('sudah_mengisi')['toefl'] : $mahasiswa->toefl }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupKejuaraan" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="kejuaraan" class="form-label col-form-label">Kejuaraan
                                                        <span class="float-end form-check form-switch ms-1 mb-0">
                                                            <input id="swKejuaraan" class="form-check-input" type="checkbox"
                                                                {{ !empty($kejuaraan) && $kejuaraan !== '-' ? 'checked' : '' }} {{ $disabled }}>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-md-8" id="grupSwKejuaraan">
                                                    @foreach ($listKejuaraan as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="kejuaraan form-control" placeholder="Juara 1 Lomba Karya Tulis Ilmiah Tingkat Nasional"
                                                                name="kejuaraan[]" value="{{ Str::before($item, '(') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div id="grupNoKejuaraan" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="no_kejuaraan" class="form-label col-form-label">Nomor</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @foreach ($listKejuaraan as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="kejuaraan form-control" placeholder="120/KTI/Nas/2022" name="no_kejuaraan[]"
                                                                value="{{ Str::between($item, '(', ')') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div id="btnKejuaraan" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahKejuaraan" {{ $disabled }}><i class="bx bx-plus"
                                                    style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupSertifikat" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="sertifikat" class="form-label col-form-label">Sertifikat
                                                        <span class="float-end form-check form-switch ms-1 mb-0">
                                                            <input id="swSertifikat" class="form-check-input" type="checkbox"
                                                                {{ !empty($sertifikat) && $sertifikat !== '-' ? 'checked' : '' }} {{ $disabled }}>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-md-8" id="grupSwSertifikat">
                                                    @foreach ($listSertifikat as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="sertifikat form-control" placeholder="Lembaga Sertifikasi Profesi - Network Engineer"
                                                                name="sertifikat[]" value="{{ Str::before($item, '(') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div id="grupNoSertifikat" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="no_sertifikat" class="form-label col-form-label">Nomor</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @foreach ($listSertifikat as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="sertifikat form-control" placeholder="62022 3 00552 2022" name="no_sertifikat[]"
                                                                value="{{ Str::between($item, '(', ')') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div id="btnSertifikat" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahSertifikat" {{ $disabled }}><i class="bx bx-plus"
                                                    style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div id="grupBeasiswa">
                                        <div class="row mt-3">
                                            <div class="col-md-2">
                                                <label for="beasiswa" class="col-form-label">Beasiswa
                                                    <span class="float-end form-check form-switch ms-1 mb-0">
                                                        <input id="swBeasiswa" class="form-check-input" type="checkbox"
                                                            {{ !empty($beasiswa) && $beasiswa !== '-' ? 'checked' : '' }} {{ $disabled }}>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col" id="grupSwBeasiswa">
                                                @foreach ($listBeasiswa as $index => $item)
                                                    <div class="input-group mt-1">
                                                        <span class="input-group-text">{{ $index + 1 }}</span>
                                                        <input type="text" class="beasiswa form-control" placeholder="Beasiswa KIP 2022" name="beasiswa[]"
                                                            value="{{ $item }}" {{ $disabled }}>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div id="btnBeasiswa" class="col text-end">
                                        <button type="button" class="btn btn-xs btn-primary tambahBeasiswa" {{ $disabled }}><i class="bx bx-plus"
                                                style="font-size: 10px;"></i></button>
                                    </div>

                                    <div class="row mt-3">
                                        <div id="grupOrganisasi" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="organisasi" class="form-label col-form-label">organisasi
                                                        <span class="float-end form-check form-switch ms-1 mb-0">
                                                            <input id="swOrganisasi" class="form-check-input" type="checkbox"
                                                                {{ !empty($organisasi) && $organisasi !== '-' ? 'checked' : '' }} {{ $disabled }}>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-md-8" id="grupSwOrganisasi">
                                                    @foreach ($listOrganisasi as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="organisasi form-control" placeholder="Badan Eksekutif Mahasiswa 2022-2023"
                                                                name="organisasi[]" value="{{ Str::before($item, '(') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div id="grupJabatanOrganisasi" class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="jabatan_organisasi" class="form-label col-form-label">Jabatan</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @foreach ($listOrganisasi as $index => $item)
                                                        <div class="input-group mt-1">
                                                            <span class="input-group-text">{{ $index + 1 }}</span>
                                                            <input type="text" class="organisasi form-control" placeholder="Ketua" name="jabatan_organisasi[]"
                                                                value="{{ Str::between($item, '(', ')') }}" {{ $disabled }}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div id="btnOrganisasi" class="col text-end">
                                            <button type="button" class="btn btn-xs btn-primary tambahOrganisasi" {{ $disabled }}><i class="bx bx-plus"
                                                    style="font-size: 10px;"></i></button>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary" {{ $disabled }}>Kirim</button>
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
