<?php
require_once('controller_main.php');

// Fungsi Kode Pertanyaan Otomatis
function kode_pertanyaan()
{
    global $conn;

    $query = "SELECT * FROM pertanyaan";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "G1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM pertanyaan WHERE kode_pertanyaan = 'G{$i}'";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "G{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "G{$angka}";
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

    // Insert data pertanyaan
    $query = "INSERT INTO pertanyaan (kode_pertanyaan, text_pertanyaan, idindikator) VALUES ('$kode_pertanyaan', '$pertanyaan', '$idindikator')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi Input Pertanyaan Selesai

function create_kategori()
{
    global $conn;
    $data_kategori = query("SELECT * FROM kategori");
    $data_kriteria = query("SELECT * FROM kriteria");
    $pertanyaan = query("SELECT DISTINCT kode_pertanyaan FROM pertanyaan");

    foreach ($data_kategori as $kategori) {
        $nama_kategori[] = $kategori['nama_kategori'];
    }

    // Ambil CF User
    $nilai_cf_user = 0.5;

    foreach ($pertanyaan as $ind) {
        $parameter = $ind['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;
    }

    foreach ($data_kriteria as $krit) {
        $nama_kriteria[] = $krit['nama_kriteria'];
        $kode_kriteria = $krit['kode_kriteria'];
        ${"cf_he_" . $kode_kriteria} = [];
        // Mendapatkan idkriteria dari iterasi saat ini
        $idkriteria = $krit['idkriteria'];
        // cari data indikator
        $data_indikator = query("SELECT * FROM ind_gejala WHERE idkriteria = $idkriteria");

        foreach ($data_indikator as $dk) {
            $idindikator = $dk['idindikator'];
            $cf_pakar = $dk['cf_pakar'];

            $data_pertanyaan = query("SELECT * FROM pertanyaan WHERE idindikator = $idindikator");
            // $cf_by_kriteria[$kode_kriteria][] = ${"cf_he_" . $dk['kode_indikator']} = []; // Array untuk menyimpan hasil perhitungan CF HE

            foreach ($data_pertanyaan as $dp) {
                $hasil = $cf_pakar * $nilai_cf_user;
                ${"cf_he_" . $kode_kriteria}[] = $hasil;

                // echo "CF HE dari" . " = " . $cf_pakar . " dikali dengan " . $nilai_cf_user[$indeks] . "adalah " . $hasil . "<br><br>";
            }
        }

        if (count(${"cf_he_" . $kode_kriteria}) > 1) {
            ${"cf_old_" . $kode_kriteria . 0} = ${"cf_he_" . $kode_kriteria}[0];
            for ($c = 1; $c < count(${"cf_he_" . $kode_kriteria}); $c++) {
                ${"cf_old_" . $kode_kriteria . $c} = ${"cf_old_" . $kode_kriteria . $c - 1} + ${"cf_he_" . $kode_kriteria}[$c] * (1 - ${"cf_old_" . $kode_kriteria . $c - 1});
                $bobotTerbesar[] = number_format(${"cf_old_" . $kode_kriteria . $c}, 3);

                // var_dump(${"cf_old_" . $kode_kriteria . $c});
                ${"cf_old_" . $kode_kriteria}[0] = number_format(${"cf_old_" . $kode_kriteria . $c} * 100, 3);

                // echo "Hasil CF OLD " . $kode_kriteria . $c . " dari perkalian " . ${"cf_old_" . $kode_kriteria . $c - 1} . " + " . ${"cf_he_" . $kode_kriteria}[$c] . " * (1 - " . ${"cf_old_" . $kode_kriteria . $c - 1} . ") adalah " . ${"cf_old_" . $kode_kriteria . $c} . "<br>";

            }
        } elseif (count(${"cf_he_" . $kode_kriteria})) {
            ${"cf_old_" . $kode_kriteria . 0} = ${"cf_he_" . $kode_kriteria}[0];
            $bobotTerbesar[] = number_format(${"cf_old_" . $kode_kriteria . 0}, 3);
        } else {
            $bobotTerbesar[] = 0;
        }
    }

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bobotTerbesar); $s++) {
        $cf_total += $bobotTerbesar[$s];
    }

    // //Range Bawah
    // foreach ($data_kriteria as $krtt) {
    //     $name_krit[] = $krtt['nama_kriteria'];
    //     $kode_krit = $krtt['kode_kriteria'];
    //     ${"cf_he_" . $kode_krit} = [];
    //     // Mendapatkan idkriteria dari iterasi saat ini
    //     $idkrtt = $krtt['idkriteria'];
    //     // cari data indikator
    //     $indik = query("SELECT * FROM ind_gejala WHERE idkriteria = $idkrtt");

    //     foreach ($indik as $inkt) {
    //         $idindik = $inkt['idindikator'];
    //         $cf_pakar_t = $inkt['cf_pakar'];

    //         $dapert = query("SELECT * FROM pertanyaan WHERE idindikator = $idindik");
    //         // $cf_by_kriteria[$kode_krit][] = ${"cf_he_" . $inkt['kode_indikator']} = []; // Array untuk menyimpan hasil perhitungan CF HE

    //         foreach ($dapert as $dpt) {
    //             $hasil_t = $cf_pakar_t * $nilai_cf_user_t;
    //             ${"cf_he_" . $kode_krit}[] = $hasil_t;

    //             // echo "CF HE dari" . " = " . $cf_pakar_t . " dikali dengan " . $nilai_cf_user[$indeks] . "adalah " . $hasil_t . "<br><br>";
    //         }
    //     }

    //     if (count(${"cf_he_" . $kode_krit}) > 1) {
    //         ${"cf_old_" . $kode_krit . 0} = ${"cf_he_" . $kode_krit}[0];
    //         for ($x = 1; $x < count(${"cf_he_" . $kode_krit}); $x++) {
    //             ${"cf_old_" . $kode_krit . $x} = ${"cf_old_" . $kode_krit . $x - 1} + ${"cf_he_" . $kode_krit}[$x] * (1 - ${"cf_old_" . $kode_krit . $x - 1});
    //             $bbTerbesar[] = number_format(${"cf_old_" . $kode_krit . $x}, 3);

    //             // var_dump(${"cf_old_" . $kode_krit . $x});
    //             ${"cf_old_" . $kode_krit}[0] = number_format(${"cf_old_" . $kode_krit . $x} * 100, 3);

    //             // echo "Hasil CF OLD " . $kode_krit . $x . " dari perkalian " . ${"cf_old_" . $kode_krit . $x - 1} . " + " . ${"cf_he_" . $kode_krit}[$x] . " * (1 - " . ${"cf_old_" . $kode_krit . $x - 1} . ") adalah " . ${"cf_old_" . $kode_krit . $x} . "<br>";

    //         }
    //     } elseif (count(${"cf_he_" . $kode_krit})) {
    //         ${"cf_old_" . $kode_krit . 0} = ${"cf_he_" . $kode_krit}[0];
    //         $bbTerbesar[] = number_format(${"cf_old_" . $kode_krit . 0}, 3);
    //     } else {
    //         $bbTerbesar[] = 0;
    //     }
    // }

    // // Total Bobot untuk kategori
    // $cf_tot_t = 0;

    // for ($s = 0; $s < count($bbTerbesar); $s++) {
    //     $cf_tot_t += $bbTerbesar[$s];
    // }
    // // echo "Total nilai kategorinya adalah " . $cf_tot_t . "<br>";

    $nilai_bawah = $cf_total;
    $pembagi = count($nama_kategori);
    for ($f = 0; $f < count($nama_kategori); $f++) {
        $range_bawah = number_format($nilai_bawah + 0.001, 3);
        $atas = $f + 1;
        $nam_kat = $nama_kategori[$f];
        $range_atas = number_format(($cf_total + 2.449 * $atas), 3);

        $nilai_bawah = $range_atas;

        $query = "UPDATE kategori SET 
                        range_atas = '$range_atas',
                        range_bawah = '$range_bawah'
                    WHERE nama_kategori = '$nam_kat'
                    ";
        mysqli_query($conn, $query);
    }
}

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
    create_kategori();

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// Fungsi Delete Pertanyaan Selesai
?>