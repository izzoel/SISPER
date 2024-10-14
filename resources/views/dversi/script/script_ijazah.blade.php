<script>
    Swal.fire({
        title: 'Bentar yaa...',
        text: 'Lagi nyari dokumen...',
        didOpen: () => {
            Swal.showLoading();
        }
    });

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

    $('#dversi').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdfHtml5',
                text: 'PDF',
                title: 'SISPER | DVERSI (Digital Verifikasi)',
                exportOptions: {
                    columns: [0, 1, 2, 4, 7] // Export only specific columns
                },
                customize: function(doc) {
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
                }
            },
            'excel'
        ]
    });
</script>
