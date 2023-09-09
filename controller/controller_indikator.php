<?php
require_once 'controller_main.php';
require_once 'controller_indikator.php';

// Fungsi Kode Indikator
function kode($query, $idkriteria)
{
    global $conn;
    $kriteria = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idkriteria")[0];
    $kode_kriteria = $kriteria['kode_kriteria'];

    $jumlah = jumlah_data($query);
    $kode = "";

    if ($jumlah == 0) {
        $kode = "IND1-" . $kode_kriteria;
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM ind_gejala WHERE idkriteria = $idkriteria AND kode_indikator = 'IND{$i}-{$kode_kriteria}'";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];

            if ($total == 0) {
                $kode = "IND" . $i . "-" . $kode_kriteria;
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "IND" . $angka . "-" . $kode_kriteria;
            }
        }
        ;
    }

    return $kode;

}
// Fungsi Kode Indikator Selesai


// Fungsi Input Indikator
function input_indikator($data)
{
    global $conn;
    $idkriteria = $data['kriteria'];
    $kode_indikator = htmlspecialchars($data['kode_indikator']);
    $indikator = htmlspecialchars($data['indikator']);

    if ($indikator == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Indikator tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT indikator FROM ind_gejala WHERE indikator = '$indikator'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Indikator sudah ada, silahkan masukkan indikator lain',
                            'error'
                        )
                    </script>";
            exit();
        }
    }

    $query = "INSERT INTO ind_gejala
                        VALUES 
                        (NULL, '$kode_indikator', '$indikator', '$idkriteria', '')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
// Fungsi Input Indikator Selesai

// Fungsi input nilai kode indikator dari pilih kriteria
function input_kode_indikator($kode)
{
    global $conn;
    $indikator = query("SELECT * FROM ind_gejala WHERE idkriteria = $kode");

    foreach ($indikator as $ind) {
        $kode_ind[] = $ind["kode_indikator"];
    }

    for ($i = 0; $i < count($kode_ind); $i++) {
        for ($j = 0; $j < count($kode_ind); $j++) {
            $kode1 = $kode_ind[$i];
            $kode2 = $kode_ind[$j];

            $cek = jumlah_data("SELECT * FROM rel_indikator WHERE kode1 = '$kode1' AND kode2 = '$kode2'");

            if ($cek == 0) {
                $query = "INSERT INTO rel_indikator
                        VALUES 
                        (NULL, '$kode', '$kode1', '$kode2', 1)";
                mysqli_query($conn, $query);
            }
            $combinations[] = $kode_ind[$i] . $kode_ind[$j];
        }
    }

}
// Fungsi input nilai kode indikator dari pilih kriteria Selesai

// Fungsi edit nilai kode indikator dari pilih kriteria
function edit_kode_indikator($data)
{
    global $conn;

    $idKode1 = $data['kode1'];
    $idKode2 = $data['kode2'];
    $idNilai = $data['nilai'];

    $data_kode1 = query("SELECT kode_indikator FROM ind_gejala WHERE idindikator = $idKode1;")[0];
    $data_kode2 = query("SELECT kode_indikator FROM ind_gejala WHERE idindikator = $idKode2;")[0];

    $kode1 = $data_kode1['kode_indikator'];
    $kode2 = $data_kode2['kode_indikator'];

    if ($kode1 != $kode2) {
        $data_rel1 = query("SELECT * FROM rel_indikator WHERE kode1 = '$kode1' AND kode2 = '$kode2'")[0];
        $nilai1 = $idNilai;
        $id_rel1 = $data_rel1['ID'];

        $query = "UPDATE rel_indikator SET 
                        nilai = '$nilai1'
                    WHERE ID = '$id_rel1'
                    ";
        mysqli_query($conn, $query);

        $data_rel2 = query("SELECT * FROM rel_indikator WHERE kode1 = '$kode2' AND kode2 = '$kode1'")[0];
        $nilai2 = 1 / $idNilai;
        $id_rel2 = $data_rel2['ID'];

        $query2 = "UPDATE rel_indikator SET 
                        nilai = '$nilai2'
                    WHERE ID = '$id_rel2'
                    ";
        mysqli_query($conn, $query2);
    }

}
// Fungsi edit nilai kode indikator dari pilih kriteria Selesai


// Fungsi Edit Indikator 
function edit_indikator($data)
{
    global $conn;

    $idindikator = $data['idindikator'];
    $indikator = htmlspecialchars($data['indikator']);

    $query = "UPDATE ind_gejala SET 
                        indikator = '$indikator'
                    WHERE idindikator = '$idindikator'
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Kriteria 

// Fungsi Delete Kriteria
function delete_indikator($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ind_gejala  WHERE idindikator = $id");

    $deleted = true;

    return $deleted;
}

// Mengecek apakah ada permintaan penghapusan data
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Mengambil nilai parameter id dari data POST
    $id = $_POST['id'];

    // Memanggil fungsi delete untuk menghapus data
    $status = delete_indikator($id);

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// Fungsi Delete Kriteria Selesai
?>