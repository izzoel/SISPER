<script>
    $('#table_' + '{{ request()->segment(1) }}_' + 'setting_fakultas').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route(request()->segment(1) . '_setting_fakultas') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'fakultas',
                name: 'fakultas',
            },
            {
                data: 'dekan',
                name: 'dekan'
            },
            {
                data: 'tanggal_terbit',
                name: 'tanggal_terbit',
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

    $('#table_' + '{{ request()->segment(1) }}_' + 'setting_prodi').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route(request()->segment(1) . '_setting_prodi') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'prodi',
                name: 'prodi',
            },
            {
                data: 'kaprodi',
                name: 'kaprodi'
            },
            {
                data: 'tanggal_terbit',
                name: 'tanggal_terbit',
                className: 'text-center'
            },
            {
                data: 'akreditasi',
                name: 'akreditasi',
            },
            {
                data: 'no_akreditasi',
                name: 'no_akreditasi',
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

    $('#table_' + '{{ request()->segment(1) }}_' + 'setting_rektor').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route(request()->segment(1) . '_setting_rektor') }}"
        },
        columns: [{
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'nik',
                name: 'nik',
                className: 'text-center'
            },
            {
                data: 'jabatan',
                name: 'jabatan',
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
    });

    $(document).on('click', '.U_B_fakultas', function() {
        let id = $(this).data("fakultas").split('-').pop();

        $(".modalFakultas").attr("id", "M_U_fakultas-" + id);
        $("#M_U_fakultas-" + id).modal('show');
        $("#U_fakultas").attr('action', "/{{ request()->segment(1) }}/setting/fakultas/update/" + id);

        $.get("/{{ request()->segment(1) }}/setting/fakultas/show/" + id, function(data) {
            $("#F_fakultas").val(data.fakultas);
            $("#F_dekan").val(data.dekan);
            $("#F_nik").val(data.nik);
            $("#F_tanggal_terbit").val(data.tanggal_terbit);
        });
    });
    $(document).on('click', '.U_B_prodi', function() {
        let id = $(this).data("prodi").split('-').pop();

        $(".modalProdi").attr("id", "M_U_prodi-" + id);
        $("#M_U_prodi-" + id).modal('show');
        $("#U_prodi").attr('action', "/{{ request()->segment(1) }}/setting/prodi/update/" + id);

        $.get("/{{ request()->segment(1) }}/setting/prodi/show/" + id, function(data) {
            $("#P_prodi").val(data.prodi);
            $("#P_kaprodi").val(data.kaprodi);
            $("#P_nik").val(data.nik);
            $("#P_tanggal_terbit").val(data.tanggal_terbit);
            $("#P_akreditasi").val(data.akreditasi);
            $("#P_no_akreditasi").val(data.no_akreditasi);

        });
    });
    $(document).on('click', '.U_B_rektor', function() {
        let id = $(this).data("rektor").split('-').pop();

        $(".modalRektor").attr("id", "M_U_rektor-" + id);
        $("#M_U_rektor-" + id).modal('show');
        $("#U_rektor").attr('action', "/{{ request()->segment(1) }}/setting/rektor/update/" + id);

        $.get("/{{ request()->segment(1) }}/setting/rektor/show/" + id, function(data) {
            $("#R_nama").val(data.nama);
            $("#R_nik").val(data.nik);
        });

    });
</script>
