<script>
    //Cek admin login
    if (window.location.href.indexOf("admin") > -1) {
        (async () => {
            const {
                value: password
            } = await Swal.fire({
                title: 'Hai Admin!',
                input: 'password',
                inputPlaceholder: 'ssst..',
                confirmButtonText: 'Sew!',
                showLoaderOnConfirm: true,

                inputAttributes: {
                    maxlength: 10,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                allowOutsideClick: () => Swal.isLoading()
            })

            if (password != 'luz') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Eiit salah..!',
                    showConfirmButton: false
                })
                allowOutsideClick: () => Swal.isLoading()

                location.reload();
            }
        })()
    } else {

        Swal.fire({
            title: 'Bentar yaa...',
            text: 'Lagi nyari dokumen...',
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
    // Function to handle the iframe loading
    function iframeLoaded() {
        // Close the loading alert once the iframe is loaded
        Swal.close();
    }

    function iframeError() {
        // Close the loading alert
        Swal.close();
        // Reload the page if the iframe fails to load
        location.reload();
    }


    $('.cek').hover(
        function() {
            $(this).prop('readonly', true); // Prevent editing on hover
        },
        function() {
            $(this).prop('readonly', false); // Allow editing after hover
        }
    );

    $(document).ready(function() {
        $('#dversiIjazahForm').on('submit', async function(event) {
            event.preventDefault();

            let allChecked = true; // Flag to check if all checkboxes are checked
            $('.required-checkbox').each(function() {
                if (!$(this).is(':checked')) {
                    $(this).addClass('is-invalid'); // Add validation error if not checked
                    $(this).closest('.input-group-prepend').next('input').addClass('is-invalid');
                    $(this).closest('.input-group-prepend').next('input').removeClass('was-validated');
                    allChecked = false;
                } else {
                    $(this).removeClass('is-invalid'); // Remove validation error if checked
                    $(this).closest('.input-group-prepend').next('input').removeClass('is-invalid');
                    $(this).closest('.input-group-prepend').next('input').addClass('was-validated');
                    $(this).addClass('was-validated');
                }
            });

            if (!this.checkValidity() || !allChecked) {
                // Display error message if form is invalid or checkboxes are not all checked
                Swal.fire(
                    'Gagal',
                    'Di centangin dulu yak..!',
                    'error'
                );
                event.stopPropagation(); // Stop event propagation
            } else {
                // Show Swal dialog with checkbox for terms and conditions
                const {
                    value: accept
                } = await Swal.fire({
                    icon: "warning",
                    title: "Kesesuaian Data",
                    input: "checkbox",
                    inputValue: 0,
                    inputPlaceholder: 'Dengan ini menyatakan bahwa semua data yang saya kirimkan sudah benar. Saya bersedia menanggung biaya dan konsekuensi jika terjadi kesalahan pada pengisian',
                    confirmButtonText: 'Lanjutkan <i class="fa fa-arrow-right"></i>',
                    inputValidator: (result) => {
                        return !result && "Kamu harus menyetujui pernyataan diatas";
                    }
                });

                // Check if user accepted terms and conditions
                if (accept) {
                    Swal.fire({
                        title: 'Sipp!',
                        text: 'Data berhasil dikirim.',
                        icon: 'success',
                        timer: 2000, // Auto-close after 2 seconds
                        showConfirmButton: false // Hides the confirm button
                    }).then(() => {
                        this.submit(); // Submits the form after the alert is closed
                    });
                }
            }

            // Optional: Mark the form as validated
        });

        // Remove the invalid state when checkboxes are clicked
        $('.required-checkbox').on('change', function() {
            $(this).removeClass('is-invalid');
            $(this).closest('.input-group-prepend').next('input').removeClass('is-invalid');
        });
    });

    var dynamicDate = new Date().toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    $('#jenjangFilter').on('change', function() {
        var jenjang = $(this).val();
    })


    var tableDversi = $('#dversi').DataTable({
        responsive: true,
        dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex flex-row-reverse"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex flex-row-reverse"p>>',
        language: {
            info: "Showing _START_ to _END_ of _TOTAL_ entries", // Custom showing text
            infoEmpty: "Tidak ada data",
            infoFiltered: "(filtered from _MAX_ total entries)",
            lengthMenu: "Show _MENU_ entries", // Showing entries menu
            search: "Cari:",
            zeroRecords: "Data tidak ditemukan",
        },
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        buttons: [{
                extend: 'pdfHtml5',
                text: 'PDF',
                title: 'SISPER | DVERSI (Digital Verifikasi)',
                exportOptions: {
                    columns: ':visible' // Export only specific columns
                },
                orientation: 'landscape', // Set the orientation to landscape
                pageSize: 'A4',
                customize: function(doc) {
                    // Add a small header in the upper-left corner
                    doc.content.unshift({
                        text: 'Biro Administrasi Akademik dan Kemahasiswaan (BAAK) -- Universitas Borneo Lestari -- Digital Verifikasi',
                        alignment: 'left',
                        margin: [0, 10, 0, 30], // [left, top, right, bottom]
                        fontSize: 9, // Small font size for the header
                        italics: true,
                        color: '#555' // Optional: Grey color for a subtle look
                    });

                    // Ensure the title is centered
                    doc.content[1].alignment = 'center';

                    // Find the table within doc.content dynamically
                    var tableNode = doc.content.find(function(node) {
                        return node.table; // Locate the table node
                    });

                    if (tableNode) {

                        // Center the table
                        tableNode.alignment = 'center'; // Center the table
                        // Apply the grid-style layout to the found table
                        tableNode.layout = {
                            hLineWidth: function(i, node) {
                                return (i === 0 || i === node.table.body.length) ? 1 : 0.5;
                            },
                            vLineWidth: function() {
                                return 0.5;
                            },
                            hLineColor: function() {
                                return '#aaa';
                            },
                            vLineColor: function() {
                                return '#aaa';
                            },
                            paddingLeft: function() {
                                return 8;
                            },
                            paddingRight: function() {
                                return 8;
                            },
                            paddingTop: function() {
                                return 5;
                            },
                            paddingBottom: function() {
                                return 5;
                            }
                        };


                    }

                    // Add signature slots at the bottom
                    doc.content.push({
                        margin: [0, 20, 0, 0], // Margin for spacing above the signature slots
                        table: {
                            widths: ['*', '*'], // Two equal-width columns for signatures
                            body: [
                                [{
                                        text: 'Ketua Program Studi',
                                        alignment: 'center',
                                        border: [false, true, false, false]
                                    },
                                    {
                                        text: "Banjarbaru, " + dynamicDate,
                                        alignment: 'center',
                                        border: [false, true, false, false]
                                    }
                                ],
                                [{
                                        text: 'Administrasi Rumah Sakit',
                                        alignment: 'center',
                                        border: [false, false, false, false]
                                    }, // Placeholder for signature 1
                                    {
                                        text: 'Kabid. Akademik dan Kemahasiswaan',
                                        alignment: 'center',
                                        border: [false, false, false, false]
                                    } // Placeholder for signature 2
                                ],
                                [{
                                        text: '',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 40, 0, 0]
                                    }, // Placeholder for signature 1
                                    {
                                        text: '',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 40, 0, 0]
                                    } // Placeholder for signature 2
                                ],
                                [{
                                        text: 'Hj. Liana Fitriani Hasymi, S.Pi, M.Kes',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 10, 0, 0]
                                    }, // Placeholder for signature 1
                                    {
                                        text: 'Ibrahim Rully Effendy, S.Kom, MM',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 10, 0, 0]
                                    } // Placeholder for signature 2
                                ],
                                [{
                                        text: 'NIK. 010915075',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 0, 0, 0]
                                    }, // Placeholder for signature 1
                                    {
                                        text: 'NIK. 010313041',
                                        alignment: 'center',
                                        border: [false, false, false, false],
                                        margin: [0, 0, 0, 0]
                                    } // Placeholder for signature 2
                                ]
                            ]
                        },
                        layout: 'noBorders' // Remove borders from the signature table
                    });
                },

            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                title: '',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        body: function(data, row, column, node) {
                            // Check if the current column is 3 or 4
                            if (column === "1" || column === 4 || column === 5) {
                                // Return the formula without additional quotes

                                return "\0" + data; // Adjust as needed to concatenate other cell references
                            }
                            return data; // Return data as is for other columns
                        }


                    }
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];


                    $('row', sheet).each(function(index) {
                        var row = $(this);
                        if (index === 0) { // For header row
                            row.append('<c t="inlineStr"><is><t>FAKULTAS</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>AKREDITASI</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>NAKREDITASI</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>LULUS</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>GELAR</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>DEKAN</t></is></c>');
                            row.append('<c t="inlineStr"><is><t>DNIK</t></is></c>');
                        } else {
                            // Append specific data for each student
                            var prodi = row.children('c').eq(7).text();

                            if ($("#jenjangFilter").val() === "DIPLOMA" && prodi === "FARMASI") {
                                row.append('<c t="inlineStr"><is><t>FARMASI</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Terakreditasi Baik Sekali oleh LAM-PTKes</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Nomor 0068/LAM-PTKes/Akr/Dip/I/2023</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>30 SEPTEMBER 2024</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Ahli Madya Farmasi (A.Md.Farm)</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>apt. Eka Fitri Susiani, M.Sc.</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>NIK. 010512024</t></is></c>');
                            }
                            if ($("#jenjangFilter").val() === "DIPLOMA" && prodi === "ANALIS KESEHATAN") {
                                row.append('<c t="inlineStr"><is><t>ILMU KESEHATAN DAN SAINS TEKNOLOGI</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Terakreditasi Baik Sekali oleh LAM-PTKes</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Nomor 0619/LAM-PTKes/Akr/Dip/Khs/VII/2022</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>30 SEPTEMBER 2024</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Ahli Madya Analis Kesehatan (A.Md.AK)</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Eny Hastuti, S.KM., M.Pd., M.PH</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>NIK. 020418099</t></is></c>');
                            }
                            if ($("#jenjangFilter").val() === "SARJANA" && prodi === "ADMINISTRASI RUMAH SAKIT") {
                                row.append('<c t="inlineStr"><is><t>ILMU KESEHATAN DAN SAINS TEKNOLOGI</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Terakreditasi Baik oleh LAM-PTKes</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Nomor 0312/LAM-PTKes/Akr/Sar/IV/2023</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>30 AGUSTUS 2024</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Sarjana Kesehatan (S.Kes)</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Eny Hastuti, S.KM., M.Pd., M.PH</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>NIK. 020418099</t></is></c>');
                            }
                            if ($("#jenjangFilter").val() === "SARJANA" && prodi === "FARMASI") {
                                row.append('<c t="inlineStr"><is><t>FARMASI</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Terakreditasi Baik Sekali oleh LAM-PTKes</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Nomor 0287/LAM-PTKes/Akr/Sar/V/2024</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>31 AGUSTUS 2024</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>Sarjana Farmasi (S.Farm)</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>apt. Eka Fitri Susiani, M.Sc.</t></is></c>');
                                row.append('<c t="inlineStr"><is><t>NIK. 010512024</t></is></c>');
                            }
                        }
                    });
                }
            },
            'colvis'
        ],
        initComplete: function() {
            // Populate the Prodi filter dropdown with unique values
            var columnJenjang = this.api().column(6); // Change the index to match the "Prodi" column
            // var columnJenjang
            columnJenjang.data().unique().sort().each(function(d, j) {
                $('#jenjangFilter').append('<option value="' + d + '">' + d + '</option>');
            });
        }
    });

    // Apply the filter
    $('#jenjangFilter').on('change', function() {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        // alert(val);
        tableDversi.column(6).search(val ? '^' + val + '$' : '', true, false).draw(); // Adjust the index for the "Prodi" column

    });
</script>
