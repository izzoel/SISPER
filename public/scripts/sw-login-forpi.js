$(document).ready(function() {
  $('.forpi').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    Swal.fire({
      html: `<div class="swal2-content" style="display: flex; flex-direction: column;">
      <input type="text" id="nim" class="swal2-input" placeholder="NIM">
      <input type="text" id="pisn" class="swal2-input" placeholder="PISN">
      </div>`,
      imageUrl: "/img/logo/forpi-icon.svg",
      imageHeight: 150,
      imageAlt: "FORPI",
      confirmButtonText: "Lanjut",
      preConfirm: async () => {
        const nim = $('#nim').val();
        const pisn = $('#pisn').val();

        try {
          const response = await $.ajax({
            url: '/portal/forpi', 
            method: 'POST',
            data: {
              nim: nim,
              pisn: pisn,
              _token: $('meta[name="csrf-token"]').attr('content') 
            },
            dataType: 'json'
          });

          if (response.success) {
            Swal.fire({
              title: 'Berhasil!',
              icon: 'success'
            }).then(() => {
              window.location.href = '/forpi';
            });
          } else {
            Swal.showValidationMessage(`NIM atau PISN Salah!`);
          }
        } catch (error) {
          Swal.showValidationMessage(`Request failed: ${error}`);
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    });
  });
});
