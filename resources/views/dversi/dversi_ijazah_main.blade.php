<div class="card">
    <div class="card-header" style="background-color: rgb(255, 255, 255)">
        <h4 class="card-title text-dark m-2">Digital Verifikasi Data Pemilik Ijazah</h4>
        <p class="card-category m-2">Verifikasi Identitas Pemilik Ijazah</p>
    </div>
    <form action="{{ route('dversi-ijazah-kirim') }}" id="dversiIjazahForm" method="POST" class="needs-validation" novalidate>
        <div class="card-body">

            @csrf
            <div class="row">
                @foreach ($data_dversi as $ijazah)
                    <div class="col-lg-6">
                        <iframe src="https://drive.google.com/file/d/{{ $ijazah->ijazah }}/preview" class="iframe-container" frameborder="0" onload="iframeLoaded()"
                            onerror="iframeError()"></iframe>
                    </div>

                    <style>
                        .iframe-container {
                            position: relative;
                            width: 100%;
                            height: 100%;
                            /* padding-top: 75%; */
                            /* 4:3 aspect ratio */
                            overflow: hidden;
                        }

                        .iframe-container iframe {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                        }
                    </style>


                    <div class="col-lg-6">
                        <input type="hidden" class="form-control" name="pisn" value="{{ $ijazah->pisn }}">
                        <input type="hidden" class="form-control" name="verifikasi" value="{{ now()->format('d-m-Y H:i:s') }}">
                        <input type="hidden" class="form-control" name="ijazah" value="https://drive.google.com/uc?id={{ $ijazah->ijazah }}">

                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark text-left">
                                        Nama Lengkap<span class="required text-danger">*</span>
                                    </label>
                                </div>

                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="nama" value="{{ $ijazah->nama }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark">
                                        TTL<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="ttl" value="{{ $ijazah->ttl }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark">
                                        NIM<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="nim" value="{{ $ijazah->nim }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark">
                                        NIK<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="nik" value="{{ $ijazah->nik }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark">
                                        Fakultas<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="fakultas" value="{{ $ijazah->fakultas }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark text-left">
                                        Program Studi<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="prodi" value="{{ $ijazah->prodi }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark text-left">
                                        Lulus Tanggal<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="lulus" value="{{ $ijazah->lulus }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row input-group">
                                <div class="col-sm-2 input-group-prepend">
                                    <label class="label-align text-dark">
                                        Gelar<span class="required text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col mb-2 input-group-prepend">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="required-checkbox" required>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control cek" name="gelar" value="{{ $ijazah->gelar }}">
                                </div>
                            </div>
                        </div>
                @endforeach
                <div class="row text-danger">
                    Jika terjadi kesalahan mohon untuk mengisi formulir di &nbsp<a href="https://forms.gle/dfzN5ay4BXq8P3217"
                        target="_blank">https://forms.gle/dfzN5ay4BXq8P3217</a>
                </div>
            </div>


        </div>
        <hr>
        <button type="submit" id="kirim" class="btn btn-primary float-right ">Kirim <i class="fa fa-sign-out"></i></button>
    </form>


</div>
