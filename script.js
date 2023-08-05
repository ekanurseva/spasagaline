// show password
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

// delete data pengguna
function confirmDelete(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/controller_user.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (_response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          Swal.fire({
            icon: "success",
            title: "Data User Berhasil Dihapus!",
            confirmButtonText: "Ok",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.location.href = "index.php";
            }
          });
        },
        error: function (_xhr, _status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
// delete data pengguna selesai

// data tables
$(document).ready(function () {
  $("#example").DataTable();
});
$(document).ready(function () {
  $("#example2").DataTable();
});
// data tables selesai

// sidebar-menu
$(".sidebar ul li").on("click", function () {
  $(".sidebar ul li.active").removeClass("active");
  $(this).addClass("active");
});
// sidebar-menu selesai

// button sidebar on
const btn = document.getElementById("btnside");
const sidebar = document.getElementsByClassName("sidebar")[0];
const conten = document.getElementById("content");

btn.onclick = function () {
  sidebar.classList.toggle("hide");
  sidebar.classList.toggle("aktif");
};
// button sidebar on selesai

// delete data kriteria
function deleteKriteria(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/controller_kriteria.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (_response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          Swal.fire({
            icon: "success",
            title: "Data Kriteria Berhasil Dihapus!",
            confirmButtonText: "Ok",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.location.href = "index.php";
            }
          });
        },
        error: function (_xhr, _status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
// delete data kriteria selesai

// delete data indikator
function deleteIndikator(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/controller_indikator.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (_response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          Swal.fire({
            icon: "success",
            title: "Data Indikator Berhasil Dihapus!",
            confirmButtonText: "Ok",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.location.href = "index.php";
            }
          });
        },
        error: function (_xhr, _status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
// delete data indikator selesai

// delete data pertanyaan
function deletePertanyaan(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/controller_pertanyaan.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (_response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          Swal.fire({
            icon: "success",
            title: "Data pertanyaan Berhasil Dihapus!",
            confirmButtonText: "Ok",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.location.href = "index.php";
            }
          });
        },
        error: function (_xhr, _status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
// delete data pertanyaan selesai

// delete data kategori
function deleteKategori(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/controller_kategori.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (_response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          Swal.fire({
            icon: "success",
            title: "Data kategori Berhasil Dihapus!",
            confirmButtonText: "Ok",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.location.href = "index.php";
            }
          });
        },
        error: function (_xhr, _status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
// delete data kategori selesai