<script>
    $('#table_' + '{{ request()->segment(2) }}').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route(request()->segment(1) . '_entry_table') }}"
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
                data: 'status',
                name: 'status',
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
        order: [
            [3, 'asc']
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
        }, ]


    });


    if ('{{ $data['menuData']['menu'] }}' == 'FORPI') {

        $(document).on('click', '.resubmit-btn', function() {
            let btn = $(this);
            let resubmitUrl = btn.data('url');

            $.get(resubmitUrl, function() {
                $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(null, false);
            }).fail(function() {
                alert("Gagal memperbarui status.");
            });
        });
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

    } else if ('{{ $data['menuData']['menu'] }}' == 'DVERSI') {
        // alert("{{ $data['menuData']['menu'] }}");
        $("#M_S_ijazah").on('show.bs.modal', function(e) {
            function formatDate(dateString) {
                let [year, month, day] = dateString.split('-').map(Number);
                let date = new Date(year, month - 1, day);
                return new Intl.DateTimeFormat('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }).format(date);
            }

            $.get("/{{ request()->segment(1) }}/entry/show/", function(data) {
                $("#periode_lulus").empty().append('<option selected disabled value="">--&nbsp;Pilih&nbsp;--</option>');
                $("#tanggal_yudisium").empty().append('<option selected disabled value="">--&nbsp;Pilih&nbsp;--</option>');

                data.forEach(function(item) {
                    let formattedTanggalYudisium = formatDate(item.tanggal_yudisium);
                    $("#periode_lulus").append(`<option value="${item.periode_lulus.replace(/\//g, '-')}">${item.periode_lulus}</option>`);
                    $("#tanggal_yudisium").append(`<option value="${item.tanggal_yudisium}">${formattedTanggalYudisium}</option>`);
                });
            });
        })


        $('#formIjazah').submit(function(e) {
            e.preventDefault(); // Mencegah reload halaman
            console.log("Form submit berhasil ditangkap!"); // Debugging

            var periodeLulus = $('#periode_lulus').val();
            var tanggalYudisium = $('#tanggal_yudisium').val();

            if (!periodeLulus || !tanggalYudisium) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data tidak lengkap!',
                    text: 'Harap isi semua bidang yang diperlukan.',
                    showConfirmButton: true
                });
                return;
            }

            // Menampilkan SweetAlert2 loading
            Swal.fire({
                title: 'Tunggu yaa...',
                html: 'Lagi bikin 0 dari 0 ijazah',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => Swal.showLoading()
            });

            $.ajax({
                url: `/{{ request()->segment(1) }}/{{ request()->segment(2) }}/ijazah/${periodeLulus}/${tanggalYudisium}`,
                type: "GET",
                dataType: "json",
                success: async function(response) {
                    console.log("Data dari server:", response); // Debugging

                    if (response.status === "empty") {
                        Swal.fire({
                            icon: 'info',
                            title: 'Tidak ada data!',
                            text: 'Tidak ada data untuk diproses.',
                            showConfirmButton: true
                        });
                        return;
                    }

                    let totalData = response.total;
                    let mahasiswaList = response.data;
                    let processedData = 0;

                    async function processNext() {
                        if (processedData >= totalData) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selesai!',
                                text: `Semua ${totalData} data berhasil diproses.`,
                                showConfirmButton: false,
                                timer: 2000
                            });

                            $('#M_S_ijazah').modal('hide');
                            $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(null, false);
                            return;
                        }

                        let currentMahasiswa = mahasiswaList[processedData];
                        console.log(`Memproses mahasiswa: ${currentMahasiswa.nim}`);

                        Swal.update({
                            html: `<i class='bx bx-loader-circle bx-spin mb-3' style="font-size: 2rem; color: #007bff;"></i><br><b>Lagi bikin ${processedData + 1} dari ${totalData} ijazah</b>`
                        });

                        try {
                            let response = await fetch(`/{{ request()->segment(1) }}/{{ request()->segment(2) }}/proses/${currentMahasiswa.nim}`, {
                                method: "GET"
                            });

                            if (!response.ok) throw new Error(`HTTP status ${response.status}`);

                            console.log(`Data ${currentMahasiswa.nim} berhasil diproses.`);
                            processedData++;
                            await processNext(); // Tunggu proses selesai sebelum lanjut
                        } catch (error) {
                            console.error(`Gagal memproses ${currentMahasiswa.nim}: ${error}`);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: `Terjadi kesalahan saat memproses ${currentMahasiswa.nim}. Lanjut ke data berikutnya.`,
                                showConfirmButton: false,
                                timer: 2000
                            });

                            processedData++; // Lanjut ke data berikutnya meskipun error
                            await processNext();
                        }
                    }

                    await processNext(); // Mulai proses
                },
                error: function(xhr) {
                    console.error("Terjadi kesalahan: " + xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Terjadi kesalahan saat mengambil data dari server.',
                        showConfirmButton: true
                    });
                }
            });

        });



        $(document).on('click', '.pdf-btn', function() {
            let btn = $(this);
            let originalHtml = btn.html(); // Simpan teks asli tombol
            let nim = btn.data('nim');
            let pdfUrl = btn.data('url');

            // Tampilkan ikon loading
            btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop('disabled', true);

            $.get(pdfUrl, function() {
                $('#table_' + '{{ request()->segment(2) }}').DataTable().ajax.reload(null, false);
            }).fail(function() {
                alert("Gagal memperbarui status.");
            }).always(function() {
                btn.html(originalHtml).prop('disabled', false);
            });
        });


    }
</script>
