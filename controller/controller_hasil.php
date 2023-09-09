<?php
require_once 'controller_main.php';

function hitung($data)
{
    global $conn;

    $data_kategori = query("SELECT * FROM kategori");
    $data_kriteria = query("SELECT * FROM kriteria");
    $pertanyaan = query("SELECT DISTINCT kode_pertanyaan FROM pertanyaan");

    // Ambil CF User
    foreach ($pertanyaan as $ind) {
        $parameter = $ind['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;

        $jawaban = $data[$parameter];

        $nilai = ($jawaban === '1') ? 1 : 0.5;

        $nilai_cf_user[] = $nilai;
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

                $kata = str_replace(" ", "_", $dp['kode_pertanyaan']);
                $indeks = array_search($kata, $nama_pertanyaan);

                $hasil = $cf_pakar * $nilai_cf_user[$indeks];
                ${"cf_he_" . $kode_kriteria}[] = $hasil;

                // echo "CF HE " . $krit['kode_kriteria'] . " dari" . " = " . $cf_pakar . " dikali dengan " . $nilai_cf_user[$indeks] . "adalah " . $hasil . "<br><br>";
            }
            // var_dump(${"cf_he_" . $kode_kriteria});
        }

        if (count(${"cf_he_" . $kode_kriteria}) > 1) {
            ${"cf_old_" . $kode_kriteria . 0} = ${"cf_he_" . $kode_kriteria}[0];
            for ($c = 1; $c < count(${"cf_he_" . $kode_kriteria}); $c++) {
                ${"cf_old_" . $kode_kriteria . $c} = ${"cf_old_" . $kode_kriteria . $c - 1} + ${"cf_he_" . $kode_kriteria}[$c] * (1 - ${"cf_old_" . $kode_kriteria . $c - 1});
                $bobotTerbesar[] = number_format(${"cf_old_" . $kode_kriteria . $c}, 3);

                // var_dump(${"cf_old_" . $kode_kriteria . $c});
                ${"cf_old_" . $kode_kriteria}[] = number_format(${"cf_old_" . $kode_kriteria . $c} * 100, 3);

                // echo "Hasil CF OLD " . $kode_kriteria . $c . " dari perkalian " . ${"cf_old_" . $kode_kriteria . $c - 1} . " + " . ${"cf_he_" . $kode_kriteria}[$c] . " * (1 - " . ${"cf_old_" . $kode_kriteria . $c - 1} . ") adalah " . ${"cf_old_" . $kode_kriteria . $c} . "<br>";

            }
        } elseif (count(${"cf_he_" . $kode_kriteria})) {
            ${"cf_old_" . $kode_kriteria . 0} = ${"cf_he_" . $kode_kriteria}[0];
            $bobotTerbesar[] = number_format(${"cf_old_" . $kode_kriteria . 0}, 3);
            ${"cf_old_" . $kode_kriteria}[] = number_format(${"cf_old_" . $kode_kriteria . 0} * 100, 3);

            // echo "Hasil CF OLD " . $kode_kriteria . "0 adalah " . ${"cf_old_" . $kode_kriteria . 0} . "<br>";
        } else {
            $bobotTerbesar[] = 0;
            ${"cf_old_" . $kode_kriteria}[] = 0;
        }


        ${"cf_old_" . $kode_kriteria}[] = 0;

        ${"nilai_terbesar_" . $kode_kriteria} = ${"cf_old_" . $kode_kriteria}[0];

        for ($o = 1; $o < count(${"cf_old_" . $kode_kriteria}); $o++) {
            if (${"cf_old_" . $kode_kriteria}[$o] > ${"nilai_terbesar_" . $kode_kriteria}) {
                ${"nilai_terbesar_" . $kode_kriteria} = ${"cf_old_" . $kode_kriteria}[$o];
            }
        }
        $CFterbesar[] = ${"nilai_terbesar_" . $kode_kriteria};
    }

    // Bobot hasil
    $cf_besar = $CFterbesar[0];

    for ($z = 1; $z < count($CFterbesar); $z++) {
        if ($CFterbesar[$z] > $cf_besar) {
            $cf_besar = $CFterbesar[$z];
        }
    }

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bobotTerbesar); $s++) {
        $cf_total += $bobotTerbesar[$s];
    }

    // echo "bobot kategori adalah = " . $cf_total . "<br>";

    $kategori_terpilih = '';

    // Memeriksa nilai total pada setiap kategori
    foreach ($data_kategori as $kategori) {
        if ($cf_total >= $kategori['range_bawah'] && $cf_total <= $kategori['range_atas']) {
            $kategori_terpilih = $kategori['nama_kategori'];
            break; // Hentikan perulangan jika kategori ditemukan
        }
    }

    // echo "kategori dari bobot kategori adalah " . $kategori_terpilih;
    $id = dekripsi($_COOKIE['SPASAGALINENS']);

    foreach ($data_kriteria as $dkr) {
        $value[] = ${"nilai_terbesar_" . $dkr['kode_kriteria']};
    }

    $hasilString = implode(", ", $value);

    $query = "INSERT INTO hasil
                    VALUES
                    (NULL, '$id', CURRENT_TIMESTAMP(), '$kategori_terpilih', ";

    $query .= $hasilString . ")";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function kriteria_cf($data)
{

    $data_kriteria = query("SELECT * FROM kriteria");
    $idhasil = $data['idhasil'];

    foreach ($data_kriteria as $dakr) {
        $nama_kecil = strtolower($dakr['nama_kriteria']);
        $nama = str_replace(" ", "_", $nama_kecil);
        $hasil_cf[] = $data[$nama];
    }

    rsort($hasil_cf);
    $tiga_terbesar = array_slice($hasil_cf, 0, 3);

    $array_cf = array_values(array_unique($tiga_terbesar));

    for ($i = 0; $i < count($array_cf); $i++) {
        $nilai_yang_dicari = $array_cf[$i];
        foreach ($data_kriteria as $dakit) {
            $nama_kecil = strtolower($dakit['nama_kriteria']);
            $nama = str_replace(" ", "_", $nama_kecil);
            $kolom = $nama;

            // Kueri mencari nilai
            $query = jumlah_data("SELECT * FROM hasil WHERE $kolom = $nilai_yang_dicari AND idhasil = $idhasil");

            if ($query == 1) {
                $kriteria_cf[] = $dakit['nama_kriteria'];
            }
        }
    }

    return $kriteria_cf;
}

function hasil_cf($data)
{
    $data_kriteria = query("SELECT * FROM kriteria");

    foreach ($data_kriteria as $dakr) {
        $nama_kecil = strtolower($dakr['nama_kriteria']);
        $nama = str_replace(" ", "_", $nama_kecil);
        $hasil_cf[] = $data[$nama];
    }

    rsort($hasil_cf);
    $tiga_terbesar = array_slice($hasil_cf, 0, 3);
    $array_cf = array_values(array_unique($tiga_terbesar));

    $jumlah_nilai = 0;
    for ($f = 0; $f < count($array_cf); $f++) {
        foreach ($hasil_cf as $nilai) {
            if ($nilai === $array_cf[$f]) {
                $jumlah_nilai++;
            }
        }
    }

    $terbesar = array_slice($hasil_cf, 0, $jumlah_nilai);

    return $terbesar;
}

?>