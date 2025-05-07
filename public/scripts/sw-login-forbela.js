$(document).ready(function() {
  $('.forbela').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    Swal.fire({
  html: `<div class="swal2-content" style="display: flex; flex-direction: column;">
    <input type="text" id="nim" class="swal2-input" placeholder="NIM">
    <input type="text" id="nik" class="swal2-input" placeholder="NIK">
  </div>`,
  imageUrl: "/img/logo/forbela-icon.svg",
  imageHeight: 150,
  imageAlt: "FORPI",
  confirmButtonText: "Lanjut",

  didOpen: () => {
    // Inisialisasi Select2 di sini
    $('#user_forbela').select2({
      dropdownParent: $('.swal2-popup'), // penting agar dropdown muncul di atas popup
      placeholder: 'Pilih nama'
    });
  },

  preConfirm: async () => {
    const nim = $('#nim').val();
    const nik = $('#nik').val();

    try {
      const response = await $.ajax({
        url: '/portal/forbela', 
        method: 'POST',
        data: {
          nim: nim,
          nik: nik,
          _token: $('meta[name="csrf-token"]').attr('content') 
        },
        dataType: 'json'
      });

      if (response.success) {
        Swal.fire({
          title: 'Berhasil!',
          icon: 'success'
        }).then(() => {
          if (nim == "forbela") {
            window.location.href = '/forbela/dashboard';
          } else if (nim == "verifikator") {
            window.location.href = '/forbela/dashboard';
          }
          else {
            window.location.href = '/forbela';
          }
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
