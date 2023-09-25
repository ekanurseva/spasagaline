<?php

require_once 'vendor/autoload.php';
require_once 'controller/Controller_hasil.php';
validasi();

// $id = dekripsi($_COOKIE['SPASAGALINENS']);
$id = dekripsi($_GET['id']);

$data_hasil = query("SELECT * FROM hasil WHERE idhasil = $id")[0];

$waktu_tes = strftime('%H:%M:%S | %d %B %Y', strtotime($data_hasil['tanggal']));
$hasil = hasil_cf($data_hasil);

$iduser = $data_hasil['iduser'];
$data_user = query("SELECT * FROM user WHERE iduser = $iduser")[0];

$kriteria_cf = kriteria_cf($data_hasil);
$hasil_cf = hasil_cf($data_hasil);

$kriteria_besar = $kriteria_cf[0];

$kriteria = query("SELECT * FROM kriteria WHERE nama_kriteria = '$kriteria_besar'")[0];

$idkriteria = $kriteria['idkriteria'];
$indikator = query("SELECT * FROM ind_gejala WHERE idkriteria = $idkriteria");

$nama_kategori = $data_hasil['hsl_kategori'];
$kategori = query("SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'")[0];

$idkategori = $kategori['idkategori'];
$solusi = query("SELECT * FROM solusi WHERE idkategori = $idkategori");

use Dompdf\Dompdf;

use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

$imagePath = 'https://ekanurseva.my.id/Logo-SPASAGALINE.png';
// Buat HTML yang akan diubah menjadi PDF
$html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
                <title>Hasil Diagnosis</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid black;
                        padding: 4px;
                        text-align: center;
                        vertical-align: start;
                        font-size: 14px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    p {
                        text-align: justify; 
                        text-indent: 0.3in;
                        font-size: 14px;
                    }
                    li {
                        text-align: justify;
                        padding: 0;
                        margin: 0;
                        left: 0;
                        font-size: 14px;
                    }
                    header{
                        padding-top: 0;
                        padding-bottom: 30px;
                    }
                </style>
            </head>
            <body>
            <!-- Header dengan gambar -->
            <header>
                    <div style="width: 50%">
                        <h6 style="margin: 0">SPASAGALINE</h6>
                        <h6 style="margin: 0; font-size: 9px">Sistem Pakar Diagnosis Gejala Kecanduan Game Online</h6>
                        <h6 style="margin: 0; font-size: 9px">created by Eka Nurseva Saniyah</h6>
                    </div>
            </header>

                <h3 style="text-align: center; margin: 0;">HASIL DIAGNOSIS</h3>
                <h3 style="text-align: center; margin: 0;">GEJALA KECANDUAN GAME ONLINE</h3>

                <h4 style="text-align: center; text-transform: uppercase; margin: 0; margin-top: 20px">';
$html .= $data_hasil['anak'] . '</h4>
                <h5 style="text-align: center; margin: 0; margin-top: 10px">Orang Tua/Guru Dari Pengguna Game Online Di Atas:</h5>
                <h5 style="text-align: center; text-transform: uppercase; margin-top: 0;">';
$html .= $data_user['nama'] . '</h5>

                <table>
                    <tr>
                        <th>Hasil Kriteria</th>
                        <th>Hasil Kategori Kecanduan</th>
                        <th>Waktu</th>
                    </tr>

                    <tr>';
$html .= "<td><b>" . $kriteria_besar . "</b></td>" .
    "<td><b>" . $nama_kategori . "</b></td>" .
    "<td>" . $waktu_tes . "</td>";
$html .= '</tr>
                </table><br>

                <h4 style="margin: 0;">Rincian Hasil CF :</h4>
                <table>
                    <tr>';
foreach ($kriteria_cf as $kcf) {
    $html .= "<th>" . $kcf . "</th>";
}

$html .= '</tr>
                    <tr>';
foreach ($hasil_cf as $hcf) {
    $html .= "<td>" . $hcf . "%</td>";
}

$html .= '</tr>
                </table><br>

                <h4 style="margin: 0;">Penjabaran hasil :</h4>
                <table>
                    <tr>';
$html .= "<th>Tentang " . $kriteria_besar . "</th>" .
    "<th>Solusi Tingkat Kecanduan " . $nama_kategori . "</th>";
$html .= '</tr>;

<tr>';
$html .= "<td>
                                    <p>" . $kriteria['deskripsi'] . "</p>
                                    <p>Indikator Kriteria " . $kriteria_besar . " : </p>
                                    <ul>";
foreach ($indikator as $ind) {
    $html .= "<li>" . $ind['indikator'] . "</li>";
}
;
$html .= "</ul>
                                  </td>
                                 <td><ul>";
foreach ($solusi as $s) {
    $html .= "<li>" . $s['nama_solusi'] . "</li>";
}
;
$html .= '</ul></td>
                    </tr>
                    </table>

                    <div style="margin-top: 30px">
                        <h4 style="margin: 0; font-weight: medium;">Instrumen dan konten telah divalidari pakar</h4>
                        <h4 style="margin: 0;">Psikolog Pemeriksa,</h4><br><br>
                        <h4 style="margin: 0;">Muhammad Azka. Maulana, M.Psi, Psikolog</h4>
                        <h4 style="margin: 0; font-weight: medium;">SIPPK: 503/011-Dinkes/SIPPK/XII/2021</h4>
                    </div>
            </body>
            </html>';

// Muat HTML ke Dompdf
$dompdf->loadHtml($html);

// Render HTML menjadi PDF
$dompdf->render();

// Ambil output PDF
$output = $dompdf->output();

// Konversi output PDF menjadi data URI
$pdfDataUri = 'data:application/pdf;base64,' . base64_encode($output);

// Tampilkan pratinjau PDF di browser
echo '<embed src="' . $pdfDataUri . '" type="application/pdf" width="100%" height="100%">';

// // Set header untuk menentukan nama file yang diunduh
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="hasil tes.pdf"');
// header('Content-Length: ' . strlen($output));

// // Tampilkan output PDF
// echo $output;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hasil Diagnosis</title>
    <link rel="Icon" href="img/Logo.png">
</head>

</html>