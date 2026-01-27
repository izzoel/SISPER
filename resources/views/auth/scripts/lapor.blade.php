<script>
    $('#table_' + '{{ request()->segment(2) }}').DataTable({
        serverSide: true,
        processing: true,

        ajax: {
            url: "{{ route(request()->segment(1) . '_lapor_table') }}"
        },
        columns: [{
                data: 'nim',
                name: 'nim',
                className: 'text-wrap',
                searchable: true,
            },
            {
                data: 'lapor',
                name: 'lapor',
                className: 'text-wrap',
                searchable: true
            },
            {
                data: 'status',
                name: 'status',
                className: 'text-center',
                searchable: true,
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
        responsive: {
            details: false
        }

    });

    $(document).on('change', '.status-btn', function() {
        let btn = $(this);
        let id = btn.data('id');
        let status = btn.is(':checked') ? 1 : 0;

        $.get("{{ route(request()->segment(1) . '_lapor_status') }}", {
                id: id,
                status: status
            })
            .done(function(response) {
                console.log(response.success);
                $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(null, false);
            })
            .fail(function() {
                alert("Gagal memperbarui status.");
                btn.prop('checked', !status);
            });
    });
</script>
