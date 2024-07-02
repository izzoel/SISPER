$('#dat-setting-user').DataTable( {
    dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'><'col-sm-7'p>>",
    buttons: [
        {
            text: '+ Tambah User',
            className: 'buttons-tambah btn-sm',
            action: function(e, dt, node, config){
                $('#tambah-user').modal('toggle');
            }
        }
    ]
});


$('.buttons-tambah').each(function() {
   $(this).removeClass('btn-default').addClass('btn-success')
});

// // function myFunction() {
// // $(document).ready(function () {
//     $("#edit-btn").click(function () {
//     //     // $("#edit-inp").hide();
//     //     console.log('klik');
//     });
