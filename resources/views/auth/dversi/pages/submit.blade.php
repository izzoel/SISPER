@php
    use Illuminate\Support\Str;

    $disabled = session('sudah_mengisi') ? 'disabled' : '';
    $checked = session('sudah_mengisi') ? 'checked' : '';
    $color = $mahasiswa->nama ? 'background-color: #eceef1' : 'background-color: #fff';

    $nama = $mahasiswa->nama ? $mahasiswa->nama : 'Nama tidak ditemukan';
    $ttl =
        $mahasiswa->tempat_lahir || $mahasiswa->tanggal_lahir
            ? $mahasiswa->tempat_lahir . ', ' . strtoupper(\Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y'))
            : 'Tempat Tanggal Lahir tidak ditemukan';
    $nim = $mahasiswa->nim ? $mahasiswa->nim : 'NIM tidak ditemukan';
    $nik = $mahasiswa->nik ? $mahasiswa->nik : 'NIK tidak ditemukan';
    $fakultas = session('fakultas') ? strtoupper(session('fakultas')) : 'Fakultas tidak ditemukan';
    $prodi = $mahasiswa->prodi ? str_replace(['DIPLOMA TIGA ', 'SARJANA '], '', $mahasiswa->prodi) : 'Prodi tidak ditemukan';
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
                                    <h4>Digital Verifikasi Biodata Ijazah</h4>
                                </div>
                                <div class="divider ">
                                    <div class="divider-text text-muted">Biro Administrasi Akademik dan Kemahasiswaan UNBL</div>
                                </div>
                            </div>

                            <div class="card-text">
                                <form id="{{ request()->segment(1) }}Form" action="{{ route(request()->segment(1) . '_submit_store') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <iframe class="responsive-iframe " src="{{ $mahasiswa->pdf }}" allowfullscreen frameborder="0" onload="iframeLoaded()"
                                            onerror="iframeError()"></iframe>

                                        <div class="input-group mt-2 mb-2">
                                            <span class="input-group-text">
                                                <input id="nama" type="checkbox" class="required-checkbox" {{ $mahasiswa->nama ? '' : 'disabled' }} {{ $checked }}
                                                    {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="nama" class="form-control" style="{{ $color }}">{{ $nama }}</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">
                                                <input id="ttl" type="checkbox" class="required-checkbox"
                                                    {{ $mahasiswa->tempat_lahir || $mahasiswa->tanggal_lahir ? '' : 'disabled' }} {{ $checked }} {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="ttl" class="form-control"style="{{ $color }}">{{ $ttl }}</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">
                                                <input id="nim" type="checkbox" class="required-checkbox" {{ $mahasiswa->nim ? '' : 'disabled' }} {{ $checked }}
                                                    {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="nim" class="form-control" style="{{ $color }}">{{ $nim }}</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">
                                                <input id="nik" type="checkbox" class="required-checkbox" {{ $mahasiswa->nik ? '' : 'disabled' }} {{ $checked }}
                                                    {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="nik" class="form-control" style="{{ $color }}">{{ $nik }}</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">
                                                <input id="fakultas" type="checkbox" class="required-checkbox" {{ session('fakultas') ? '' : 'disabled' }} {{ $checked }}
                                                    {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="fakultas" class="form-control" style="{{ $color }}">Fakultas : {{ $fakultas }}</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">
                                                <input id="prodi" type="checkbox" class="required-checkbox" {{ $mahasiswa->prodi ? '' : 'disabled' }} {{ $checked }}
                                                    {{ $disabled }} required>
                                            </span>
                                            <label type="text" for="prodi" class="form-control" style="{{ $color }}">Program Studi : {{ $prodi }}</label>
                                        </div>
                                    </div>
                                    <div class="form-text">
                                        @if (session('sudah_mengisi'))
                                            <div class="alert alert-success" role="alert">Anda sudah mengisi form ini pada
                                                {{ \Carbon\Carbon::parse(session('sudah_mengisi')['updated_at'])->locale('id')->translatedFormat('d F Y') }} pukul
                                                {{ \Carbon\Carbon::parse(session('sudah_mengisi')['updated_at'])->locale('id')->translatedFormat('H:i') }}
                                            </div>
                                        @else
                                            Jika terdapat kesalahan, silahkan <button id="laporButton" class="btn btn-xs btn-outline-danger rounded-1">
                                                Lapor!
                                            </button> di tombol paling atas dan jangan menyelesaikan form ini.
                                        @endif
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
