// delete data
$(document).ready(function () {
    $('#example').DataTable();
});

function confirmDelete(id) {
    // Menampilkan Sweet Alert dengan tombol Yes dan No
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus data?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
            $.ajax({
                url: '../controller/controller_user.php',
                type: 'POST',
                data: {
                    action: 'delete',
                    id: id
                },
                success: function (_response) {
                    // Menampilkan pesan sukses jika data berhasil dihapus 
                    Swal.fire({
                        icon: 'success',
                        title: 'Data User Berhasil Dihapus!',
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            document.location.href = 'index.php';
                        }
                    })
                },
                error: function (_xhr, _status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan dalam menghapus data: ' + error,
                        icon: 'error'
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Menampilkan pesan jika tombol No diklik
            Swal.fire('Batal', 'Penghapusan data dibatalkan', 'info');
        }
    });
}
// delete data selesai

// sidebar-menu
$(".sidebar ul li").on('click', function () {
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
});
// sidebar-menu selesai

// button sidebar on
const btn = document.getElementById('btnside');
const sidebar = document.getElementsByClassName('sidebar')[0];
const conten = document.getElementById('content');

btn.onclick = (function () {
    sidebar.classList.toggle('hide');
    sidebar.classList.toggle('aktif');
});
// button sidebar on selesai
