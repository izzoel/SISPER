<div class="card">
    <div class="card-header" style="background-color: rgb(255, 255, 255)">
        <h4 class="card-title text-dark m-2">Surat Keterangan Pendamping Ijazah</h4>
        <p class="card-category m-2">Formulir Pengisisan Surat Keterangan Pendamping Ijazah</p>
    </div>
    <div class="card-body">

        <form action="{{ route('kirim') }}" id="skpiForm" method="POST" class="needs-validation" novalidate>
            @csrf
            <input type="hidden" name="today" value="{{ date('Y-m-d') }}">
            <div class="row input-group">

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Nama Lengkap<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col mb-2 input-group-prepend">
                    <input class="form-control rounded" name="nama" placeholder="..." required />
                    <div class="invalid-tooltip">Nama lengkap kosong!</div>
                </div>
            </div>


            <div class="row input-group">
                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Tempat Lahir<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col mb-1 pb-1 input-group-prepend">
                    <input class="form-control rounded" name="tempat_lahir" placeholder="..." required />
                    <div class="invalid-tooltip ">Tempat lahir kosong!</div>
                </div>

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Tanggal Lahir<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" class="datepicker form-control" name="tanggal_lahir" placeholder="..." required>
                    <div class="invalid-tooltip">
                        Tanggal lahir kosong!
                    </div>
                </div>
            </div>

            <div class="row input-group">
                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Program Studi<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col mb-2 input-group-prepend">
                    <select id="program_studi" name="program_studi" class="form-control" data-id="get_val" required>
                        <option value="">-- Pilih --</option>
                        <option disabled></option>
                        <option disabled>-[ Farmasi ]-</option>
                        <option value="Sarjana Farmasi">&nbsp;&nbsp;&nbsp;Sarjana Farmasi</option>
                        <option value="Diploma Tiga Farmasi">&nbsp;&nbsp;&nbsp;Diploma Tiga Farmasi</option>
                        <option disabled></option>
                        <option disabled>-[ Ilmu Kesehatan dan Sains Teknologi ]-</option>
                        <option value="Sarjana Administrasi Rumah Sakit">&nbsp;&nbsp;&nbsp;Sarjana Administrasi Rumah
                            Sakit</option>
                        <option value="Diploma Tiga Analis Kesehatan">&nbsp;&nbsp;&nbsp;Diploma Tiga Analis Kesehatan
                        </option>
                    </select>
                    <div class="invalid-tooltip ">Pilih program studi!</div>
                </div>
            </div>

            <div class="row input-group">
                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Nomor Induk Mahasiswa
                    </label>
                </div>
                <div class="col mb-1 pb-1 input-group-prepend">
                    <input class="form-control rounded" name="nim" placeholder="..." required disabled value="{{ $data_skpi['nim'] }}" />
                    <div class="invalid-tooltip ">NIM kosong!</div>
                </div>

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Lama Studi (tahun)<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="number" class="form-control rounded" name="lama_studi" placeholder="..." min="1" required />
                    <div class="invalid-tooltip ">Lama studi kosong!</div>
                </div>
            </div>

            <div class="row input-group">
                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Tahun Masuk<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col mb-1 pb-1 input-group-prepend">
                    <input class="datepicker2 form-control rounded" name="tahun_masuk" placeholder="..." required />
                    <div class="invalid-tooltip ">Tahun masuk kosong!</div>
                </div>

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Tanggal Lulus / Yudisium<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" class="datepicker form-control" name="tanggal_lulus" placeholder="..." required>
                    <div class="invalid-tooltip ">Tanggal lulus kosong!</div>
                </div>
            </div>

            <div class="row input-group">

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Judul Skripsi / Tugas Akhir<span class="required text-danger">*</span>
                    </label>
                </div>
                <div class="col mb-2 input-group-prepend">
                    <textarea class="form-control rounded" name="judul" rows="3" required></textarea>
                    <div class="invalid-tooltip ">Judul Skripsi / Tugas Akhir kosong!</div>
                </div>
            </div>

            <div class="row input-group">
                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Nomor Ijazah
                    </label>
                </div>
                <div class="col mb-1 pb-1 input-group-prepend">
                    <input class="form-control rounded" name="ijazah" placeholder="..." disabled value="{{ $data_skpi['ijazah'] }}" />
                </div>

                <div class="col-sm-2 input-group-prepend">
                    <label class="label-align text-dark">
                        Nilai TOEFL<span class="required text-danger">*</span </label>
                </div>
                <div class="col input-group-prepend">
                    <input class="form-control rounded" name="toefl" placeholder="..." required />
                    <div class="invalid-tooltip ">Nilai TOEFL kosong!</div>
                </div>
            </div>

            {{-- Pencapaian --}}
            <div class="row input-group a">

                <div class="col-sm-2 input-group-prepend">
                    <label class="text-dark mb-0 mb-0">
                        Pencapaian / Penghargaan Kejuaraan <br>
                        <span class="required text-danger"><i>kosongkan jika tidak
                                ada</i></span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" class="form-control" name="pencapaian[]" placeholder="pencapaian">
                </div>

            </div>

            <div class="row input-group mt-1">

                <div class="col-sm-2 input-group">
                </div>
                <div class="col input-group">
                    <div id="newRow"></div>
                    <button type="button" onclick="addPencapaian()" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" onclick="removePencapaian()" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>

                    <br>
                    <br>
                </div>

            </div>
            {{--  --}}


            {{-- Sertifikasi --}}
            <div class="row input-group b">
                <div class="col-sm-2 input-group-prepend">
                    <label class="text-dark mb-0">
                        Sertifikat profesi / kompetensi<br>
                        <span class="required text-danger"><i>kosongkan jika tidak
                                ada</i></span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" class="form-control" name="sertifikasi[]" placeholder="sertifikasi">
                </div>

            </div>


            <div class="row input-group mt-1">

                <div class="col-sm-2 input-group">
                </div>
                <div class="col input-group">
                    <div id="newSertifikasi"></div>
                    <button type="button" onclick="addSertifikasi()" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" onclick="removeSertifikasi()" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>
                    <br>
                    <br>
                </div>

            </div>
            {{--  --}}

            {{-- Beasiswa --}}
            <div class="row input-group c">
                <div class="col-sm-2 input-group-prepend">
                    <label class="text-dark mb-0">
                        Beasiswa selama kuliah<br>
                        <span class="required text-danger"><i>kosongkan jika tidak
                                ada</i></span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" id="inputBeasiswa" class="form-control" name="beasiswa[]" placeholder="beasiswa">
                </div>
            </div>


            <div class="row input-group mt-1">

                <div class="col-sm-2 input-group">
                </div>
                <div class="col input-group">
                    <div id="newBeasiswa"></div>
                    <button type="button" onclick="addBeasiswa()" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" onclick="removeBeasiswa()" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>
                    <br>
                    <br>
                </div>

            </div>
            {{--  --}}

            {{-- Organisasi --}}
            <div class="row input-group d">
                <div class="col-sm-2 input-group-prepend">
                    <label class="text-dark mb-0">
                        Pengalaman Organisasi<br>
                        <span class="required text-danger"><i>kosongkan jika tidak
                                ada</i></span>
                    </label>
                </div>
                <div class="col input-group-prepend">
                    <input type="text" id="inputOrganisasi" class="form-control" name="organisasi[]" placeholder="organisasi">
                </div>

            </div>


            <div class="row input-group mt-1">

                <div class="col-sm-2 input-group">
                </div>
                <div class="col input-group">
                    <div id="newOrganisasi"></div>
                    <button type="button" onclick="addOrganisasi()" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" onclick="removeOrganisasi()" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>
                    <br>
                    <br>
                </div>

            </div>
            {{--  --}}

            <hr>
            <button type="submit" id="kirim" class="btn btn-primary float-right ">Kirim <i class="fa fa-sign-out"></i></button>


        </form>
    </div>
</div>
