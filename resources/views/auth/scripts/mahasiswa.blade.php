<script>
    if ('{{ $data['menuData']['menu'] }}' == 'FORPI') {
        $('#table_' + '{{ request()->segment(2) }}').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route(request()->segment(1) . '_mahasiswa_table') }}"
            },
            columns: [{
                    data: 'nim',
                    name: 'nim',
                    className: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'pisn',
                    name: 'pisn',
                    className: 'text-center',
                    orderable: true,
                },
                {
                    data: 'nik',
                    name: 'nik',
                    className: 'text-center'
                },
                {
                    data: 'prodi',
                    name: 'prodi',
                    className: 'text-center'
                },
                {
                    data: 'periode_lulus',
                    name: 'periode_lulus',
                    className: 'text-center'
                },
                {
                    data: 'tanggal_yudisium',
                    name: 'tanggal_yudisium',
                    className: 'text-center'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className: 'text-center'
                }
            ],
            dom: '<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
                "emptyTable": "Tidak ada data yang tersedia",
                "zeroRecords": "Tidak ada data yang ditemukan"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            columnDefs: [{
                responsivePriority: 1,
                targets: -1
            }]
        });
    } else if ('{{ $data['menuData']['menu'] }}' == 'DVERSI') {
        $('#table_' + '{{ request()->segment(2) }}').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route(request()->segment(1) . '_mahasiswa_table') }}"
            },
            columns: [{
                    data: 'nim',
                    name: 'nim',
                    className: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'pisn',
                    name: 'pisn',
                    className: 'text-center',
                    orderable: true,
                },
                {
                    data: 'nik',
                    name: 'nik',
                    className: 'text-center'
                },
                {
                    data: 'prodi',
                    name: 'prodi',
                    className: 'text-center'
                },
                {
                    data: 'periode_lulus',
                    name: 'periode_lulus',
                    className: 'text-center'
                },
                {
                    data: 'tanggal_yudisium',
                    name: 'tanggal_yudisium',
                    className: 'text-center'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className: 'text-center'
                }
            ],
            dom: '<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
                "emptyTable": "Tidak ada data yang tersedia",
                "zeroRecords": "Tidak ada data yang ditemukan"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            columnDefs: [{
                responsivePriority: 1,
                targets: -1
            }]
        });
    } else if ('{{ $data['menuData']['menu'] }}' == 'FORBELA') {
        $('#table_' + '{{ request()->segment(2) }}').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route(request()->segment(1) . '_mahasiswa_table') }}"
            },
            columns: [{
                    data: 'nim',
                    name: 'nim',
                    className: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'pisn',
                    name: 'pisn',
                    className: 'text-center',
                    orderable: true,
                },
                {
                    data: 'nik',
                    name: 'nik',
                    className: 'text-center'
                },
                {
                    data: 'prodi',
                    name: 'prodi',
                    className: 'text-center'
                },
                {
                    data: 'periode_lulus',
                    name: 'periode_lulus',
                    className: 'text-center'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className: 'text-center'
                }
            ],
            dom: '<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
                "emptyTable": "Tidak ada data yang tersedia",
                "zeroRecords": "Tidak ada data yang ditemukan"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            columnDefs: [{
                responsivePriority: 1,
                targets: -1
            }]
        });
    }
    $(document).on('click', '.print-btn', function() {
        let btn = $(this);
        let printUrl = btn.data('url');
        let docUrl = btn.data('doc');

        $.get(printUrl, function() {
            window.open(docUrl, '_blank');
            $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(null, false);
        }).fail(function() {
            alert("Gagal memperbarui status.");
        });
    });

    $("#M_S_mahasiswa").on('show.bs.modal', function(e) {
        ["#S_nim", "#S_nama", "#S_tempat_lahir", "#S_alamat"].forEach(function(selector) {
            $(selector).on('keyup', function() {
                this.value = this.value.toUpperCase();
            });
        });
    })

    $(document).ready(function() {
        $(".importForm").on("submit", function(event) {
            event.preventDefault();

            let form = $(this);
            let formData = new FormData(this);
            let totalRows = 100; // simulasi, nanti diganti otomatis
            let currentRow = 0;

            // Ambil jumlah baris excel (opsional, kalau bisa dari Excel rows)
            const fileInput = form.find('input[type="file"]')[0];
            const file = fileInput.files[0];

            const reader = new FileReader();
            reader.onload = function(e) {
                const lines = e.target.result.split("\n").length;
                totalRows = lines - 1; // dikurangi header
                $('#total-row').text(totalRows);
            };
            reader.readAsText(file);


            // --- SweetAlert loading + progress ---
            Swal.fire({
                title: 'Mengimpor data...',
                html: `
                <div class="progress mt-3" style="height: 20px;">
                    <div id="progress-bar" class="progress-bar" style="width:0%">0%</div>
                </div>
                <div class="mt-2">Importing <span id="current-row">0</span> dari <span id="total-row">${totalRows}</span> data...</div>
            `,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();

                    // Simulasi progres
                    let interval = setInterval(() => {
                        if (currentRow >= totalRows) {
                            clearInterval(interval);
                            return;
                        }
                        currentRow++;
                        let percent = Math.round((currentRow / totalRows) * 100);
                        $('#progress-bar').css('width', percent + '%').text(percent + '%');
                        $('#current-row').text(currentRow);
                    }, 250); // 150ms per baris → 100 baris ≈ 15 detik

                }
            });

            // Kirim AJAX
            $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil diimport!',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengimpor data.',
                        footer: 'Error: ' + xhr.status + ' ' + xhr.statusText
                    });
                }
            });
        });
    });

    $(document).on('click', '.U_B_mahasiswa', function() {
        let nim = $(this).data("nim").split('-').pop();

        $(".modalUpdate").attr("id", "M_U_mahasiswa-" + nim);
        $("#M_U_mahasiswa-" + nim).modal('show');
        $("#U_route").attr('action', "/{{ request()->segment(1) }}/mahasiswa/update/" + nim);

        $.get("/{{ request()->segment(1) }}/mahasiswa/show/" + nim, function(data) {
            if (data.kelamin == "L") {
                var kelamin = "#U_l";
            } else {
                var kelamin = "#U_p";
            }
            $("#U_nim").val(data.nim);
            $("#U_nama").val(data.nama);
            $("#U_tempat_lahir").val(data.tempat_lahir);
            $("#U_tanggal_lahir").val(data.tanggal_lahir);
            $(kelamin).val(data.kelamin).prop('checked', true);
            $("#U_prodi").val(data.prodi).prop('selected', true);
            $("#U_hp").val(data.no_hp);
            $("#U_alamat").val(data.alamat);
            $("#U_nik").val(data.nik);
            $("#U_pisn").val(data.pisn);
            $("#U_periode").val(data.periode_lulus);
            $("#U_yudisium").val(data.tanggal_yudisium);
        });

        ["#U_nim", "#U_nama", "#U_tempat_lahir", "#U_alamat"].forEach(function(selector) {
            $(selector).on('keyup', function() {
                this.value = this.value.toUpperCase();
            });
        });
    });

    $(document).on("click", ".D_B_mahasiswa", function() {
        let nim = $(this).data("nim");

        $(".modalDelete").attr("id", "M_D_mahasiswa-" + nim);
        $("#M_D_mahasiswa-" + nim).modal('show');
        $("#D_route").attr('action', "/{{ request()->segment(1) }}/mahasiswa/destroy/" + nim);
    });
</script>
