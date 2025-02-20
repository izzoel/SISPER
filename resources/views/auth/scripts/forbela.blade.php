<script>
    $('#nama, #tempat, #judul, #pencapaian, #sertifikat, #beasiswa, #organisasi, #jabatan_organisasi').on('keyup', function() {
        $(this).val($(this).val().toUpperCase());
    });
    $('#telepon').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
