<script>
    $('#table_' + '{{ request()->segment(2) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('forpi_mahasiswa_table') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'nim',
                name: 'nim',
                className: 'text-center'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'prodi',
                name: 'prodi',
                className: 'text-center'
            },
            {
                data: 'pisn',
                name: 'pisn',
                className: 'text-center'
            },
            {
                data: 'periode',
                name: 'periode',
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

    $(document).on('click', '.print-btn', function() {
        let btn = $(this);
        let printUrl = btn.data('url'); // URL untuk update status
        let docUrl = btn.data('doc'); // URL dokumen yang akan dibuka

        $.get(printUrl, function() {
            window.open(docUrl, '_blank'); // Buka tab baru setelah status diperbarui
            $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(); // Refresh DataTable
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
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let formData = new FormData(this);

            // Tampilkan loading SweetAlert2
            Swal.fire({
                title: 'Ngupload data...',
                html: 'Bentaran yaa...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Kirim form dengan AJAX
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
                        location.reload(); // Reload halaman setelah sukses
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengirim data.',
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
        $("#U_route").attr('action', "/forpi/mahasiswa/update/" + nim);

        $.get("/forpi/mahasiswa/show/" + nim, function(data) {
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
            $("#U_pisn").val(data.pisn);
            $("#U_periode").val(data.periode);
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
        $("#D_route").attr('action', "/forpi/mahasiswa/destroy/" + nim);
    });
</script>
