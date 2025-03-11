<script>
    $('#table_' + '{{ request()->segment(2) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('forpi_setting_table') }}"
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

    document.addEventListener("DOMContentLoaded", function() {
        // var parts = $("#t_terbit").val().split("/"); // Pisahkan berdasarkan "-"
        // var formattedTanggal = parts[2] + "-" + parts[1] + "-" + parts[0]; // Susun kembali jadi yyyy-mm-dd

        new AirDatepicker('#t_terbit', {
            // selectedDates: [new Date(formattedTanggal)],
            dateFormat: 'dd/MM/yyyy',
            autoClose: true,
            locale: {
                days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                daysMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                today: 'Hari Ini',
                clear: 'Hapus',
                firstDay: 1
            }
        });
    });

    $(document).on('click', '.U_B_setting', function() {
        let id = $(this).data("id").split('-').pop();
        console.log(id);

        $(".modalUpdate").attr("id", "M_U_setting-" + id);
        $("#M_U_setting-" + id).modal('show');
        $("#U_route").attr('action', "/forpi/setting/update/" + id);

        $.get("/forpi/setting/show/" + id, function(data) {
            $("#U_prodi").val(data.prodi);
            $("#U_kaprodi").val(data.kaprodi);
            $("#U_nik").val(data.nik);
            $("#U_tanggal_terbit").val(data.tanggal_terbit);
        });

    });
</script>
