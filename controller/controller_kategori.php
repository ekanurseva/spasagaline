<?php
require_once('controller_main.php');

// Fungsi Input Kategori
function input_kategori($data)
{
    global $conn;

    $kategori = htmlspecialchars($data['kategori']);
    $range_atas = $data["range_atas"];
    $range_bawah = $data["range_bawah"];

    $result = mysqli_query($conn, "SELECT nama_kategori FROM kategori WHERE nama_kategori = '$kategori'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kategori sudah digunakan, silahkan masukkan kategori lain',
                        'error'
                    )
                </script>";
        exit();
    }

    $result = mysqli_query($conn, "SELECT range_atas FROM kategori WHERE range_atas = '$range_atas'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Bobot sudah digunakan, silahkan masukkan nilai bobot lain',
                        'error'
                    )
                </script>";
        exit();
    }

    $result = mysqli_query($conn, "SELECT range_bawah FROM kategori WHERE range_bawah = '$range_bawah'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Bobot sudah digunakan, silahkan masukkan nilai bobot lain',
                        'error'
                    )
                </script>";
        exit();
    }
    mysqli_query($conn, "INSERT INTO kategori VALUES (NULL, '$kategori', '$range_atas', '$range_bawah')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input Kategori Selesai

// Fungsi Edit Kategori
function edit_kategori($data)
{
    global $conn;

    $idkategori = $data['idkategori'];
    $kategori = htmlspecialchars($data['kategori']);
    $range_atas = $data["range_atas"];
    $range_bawah = $data["range_bawah"];

    $query = "UPDATE kategori SET 
                        nama_kategori = '$kategori',
                        range_atas = '$range_atas',
                        range_bawah = '$range_bawah'
                    WHERE idkategori = '$idkategori'
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Kategori Selesai

// Fungsi Delete Kategori
function delete_kategori($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kategori  WHERE idkategori = $id");

    $deleted = true;

    return $deleted;
}

// Mengecek apakah ada permintaan penghapusan data
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Mengambil nilai parameter id dari data POST
    $id = $_POST['id'];

    // Memanggil fungsi delete untuk menghapus data
    $status = delete_kategori($id);

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// Fungsi Delete Kategori Selesai
?>