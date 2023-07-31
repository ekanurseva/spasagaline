<?php
require_once('controller_main.php');

// Fungsi Kode Pertanyaan Otomatis
function kode_pertanyaan($idindikator)
{
    global $conn;

    $query = "SELECT * FROM pertanyaan WHERE idindikator = $idindikator";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "P1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM pertanyaan WHERE kode_pertanyaan = 'P{$i}' AND idindikator = $idindikator";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "P{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "P{$angka}";
            }
        }
        ;
    }

    return $kode;
}
// Fungsi Kode Pertanyaan Otomatis Selesai

// Fungsi Input Petanyaan
function input_pertanyaan($data)
{
    global $conn;
    $idindikator = $data['indikator'];
    $kode_pertanyaan = htmlspecialchars($data['kode_pertanyaan']);
    $pertanyaan = htmlspecialchars($data['text_pertanyaan']);

    if ($pertanyaan == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Pertanyaan tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT text_pertanyaan FROM pertanyaan WHERE text_pertanyaan = '$pertanyaan'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Pertanyaan sudah ada, silahkan masukkan pertanyaan lain',
                            'error'
                        )
                    </script>";
            exit();
        }
    }

    $query = "INSERT INTO pertanyaan
                        VALUES 
                        (NULL, '$kode_pertanyaan', '$pertanyaan', '$idindikator')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
// Fungsi Input Pertanyaan Selesai

// Fungsi Edit Pertanyaan
function edit_pertanyaan($data)
{
    global $conn;

    $idpertanyaan = $data['idpertanyaan'];
    $pertanyaan = htmlspecialchars($data['text_pertanyaan']);

    $query = "UPDATE pertanyaan SET 
                        text_pertanyaan = '$pertanyaan'
                    WHERE idpertanyaan = '$idpertanyaan'
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Pertanyaan Selesai

// Fungsi Delete Pertanyaan
function delete_pertanyaan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pertanyaan  WHERE idpertanyaan = $id");

    $deleted = true;

    return $deleted;
}

// Mengecek apakah ada permintaan penghapusan data
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Mengambil nilai parameter id dari data POST
    $id = $_POST['id'];

    // Memanggil fungsi delete untuk menghapus data
    $status = delete_pertanyaan($id);

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// Fungsi Delete Pertanyaan Selesai
?>