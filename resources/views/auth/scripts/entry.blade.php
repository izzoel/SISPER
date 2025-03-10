<script>
    $('#table_' + '{{ request()->segment(2) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('forpi_entry_table') }}"
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
                name: 'nama',
                className: 'text-center'
            },
            {
                data: 'prodi',
                name: 'prodi',
                className: 'text-center'
            },
            {
                data: 'status',
                name: 'status',
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
</script>
