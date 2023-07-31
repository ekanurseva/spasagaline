<?php
require_once('controller_main.php');

// Fungsi Input Solusi
function input_solusi($data)
{
    global $conn;
    $idkategori = htmlspecialchars($data['kategori']);
    $solusi = htmlspecialchars($data['nama_solusi']);

    if ($idkategori == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kategori tidak boleh kosong, silahkan pilih kategori',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($solusi == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Solusi tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "INSERT INTO solusi
                    VALUES
                    (NULL, '$idkategori', '$solusi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Input solusi Selesai

// Fungsi Edit Solusi
function edit_solusi($data)
{
    global $conn;

    $id = $data['idsolusi'];
    $idkategori = htmlspecialchars($data['nama_kategori']);
    $solusi = htmlspecialchars($data['solusi']);

    if ($solusi == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Solusi tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "UPDATE solusi SET 
                idkategori = '$idkategori',
                nama_solusi = '$solusi'
            WHERE idsolusi = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Solusi Selesai

// Fungsi Delete Kategori
// function delete_kategori($id)
// {
//     global $conn;
//     mysqli_query($conn, "DELETE FROM kategori  WHERE idkategori = $id");

//     $deleted = true;

//     return $deleted;
// }

// // Mengecek apakah ada permintaan penghapusan data
// if (isset($_POST['action']) && $_POST['action'] === 'delete') {
//     // Mengambil nilai parameter id dari data POST
//     $id = $_POST['id'];

//     // Memanggil fungsi delete untuk menghapus data
//     $status = delete_kategori($id);

//     // Mengirimkan respons ke JavaScript
//     if ($status) {
//         echo 'success';
//     } else {
//         echo 'error';
//     }
// }
// Fungsi Delete Kategori Selesai
?>