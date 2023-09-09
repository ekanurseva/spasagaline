<?php
// if (isset($_POST['submit'])) {
//     $text = $_POST['text'];
//     preg_match('/\d+/', $text, $matches);

//     echo "Katanya adalah " . $text . "<br>";
//     echo "Angkanya adalah " . $matches[0];
// }

// Cek apakah form telah di-submit
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Tangkap nilai kriteria dari input form
//     $kriteria = $_POST['kriteria'];

//     // Validasi nilai kriteria jika perlu

//     // Fungsi untuk menghasilkan kode indikator berikutnya berdasarkan kriteria yang dipilih
//     function generateIndicatorCode($kriteria)
//     {
//         // Koneksi ke database atau sumber data lainnya untuk mendapatkan kode terakhir berdasarkan kriteria yang dipilih
//         // Di sini, kita hanya menggunakan data simulasi
//         $lastCode = '0'; // Contoh kode terakhir, Anda harus menggantinya dengan data sebenarnya

//         // Ekstrak angka terakhir dari kode terakhir menggunakan preg_match
//         preg_match('/\d+$/', $lastCode, $matches);
//         $lastNumber = (int) $matches[0];

//         // Tambahkan 1 ke angka terakhir untuk mendapatkan angka berikutnya
//         $nextNumber = $lastNumber + 1;

//         // Format angka berikutnya menjadi 3 digit dengan leading zero jika perlu
//         $nextNumberFormatted = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

//         // Gabungkan dengan prefix "IND-" dan kriteria untuk mendapatkan kode lengkap
//         $nextCode = 'IND-' . $nextNumberFormatted . '-' . $kriteria;

//         return $nextCode;

//     }

//     // Contoh penggunaan fungsi untuk menghasilkan kode indikator berikutnya
//     $nextIndicatorCode = generateIndicatorCode($kriteria);
//     echo "Kode indikator berikutnya untuk kriteria $kriteria: " . $nextIndicatorCode;
// }

// // Koneksi ke database
// require_once 'controller/controller_main.php';

// // ID Kriteria yang akan diolah
// $idKriteria = 24;

// // Ambil data dari tabel rel_indikator berdasarkan ID Kriteria
// $query = "SELECT kode1, kode2, nilai FROM rel_indikator WHERE idkriteria = $idKriteria";
// $result = mysqli_query($conn, $query);

// // Matriks untuk menyimpan nilai-nilai
// $matriks = [];

// // Inisialisasi matriks dengan nilai 0
// $kodeUnik = [];
// while ($row = mysqli_fetch_assoc($result)) {
//     $kode1 = $row['kode1'];
//     $kode2 = $row['kode2'];
//     $nilai = $row['nilai'];

//     if (!in_array($kode1, $kodeUnik)) {
//         $kodeUnik[] = $kode1;
//     }
//     if (!in_array($kode2, $kodeUnik)) {
//         $kodeUnik[] = $kode2;
//     }
// }

// foreach ($kodeUnik as $kodeBaris) {
//     $baris = [];
//     foreach ($kodeUnik as $kodeKolom) {
//         if ($kodeBaris == $kodeKolom) {
//             $data = 1; // Nilai diagonal utama
//         } else {
//             // Cari nilai dari rel_indikator
//             $query = "SELECT nilai FROM rel_indikator WHERE kode1 = '$kodeBaris' AND kode2 = '$kodeKolom' AND idkriteria = $idKriteria";
//             $result = mysqli_query($conn, $query);
//             $row = mysqli_fetch_assoc($result);
//             $data = $row ? $row['nilai'] : 0; // Jika tidak ada data, nilai 0
//         }
//         $baris[] = $data;
//     }
//     $matriks[] = $baris;
// }

// // Cetak matriks
// echo "<pre>";
// foreach ($matriks as $baris) {
//     echo implode("\t", $baris) . "\n";
// }
// echo "</pre>";
// require 'vendor/autoload.php'; // Sesuaikan path ke autoload.php

// use Dompdf\Dompdf;

// $dompdf = new Dompdf();

// $html = '<html><body><h1>Hello, World!</h1></body></html>';
// $dompdf->loadHtml($html);

// $dompdf->render();

// $output = $dompdf->output();
// file_put_contents('output.pdf', $output);

// $dompdf->stream('output.pdf', array('Attachment' => 0));
// phpinfo();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <title>Document</title> -->

    <!-- <style>
        /* Ganti nilai sesuai dengan kebutuhan Anda */
        .select-wrapper {
            width: 200px;
            /* Lebar pilihan */
            /* overflow: hidden; */
        }

        .select-wrapper select {
            width: 100%;
        }

        .select-wrapper select option {
            white-space: normal;
            width: 200px;
            max-width: 200px;
            /* overflow: hidden; */
            /* Menghindari teks yang melebihi lebar option */
        }
    </style> -->
</head>

<body>
    <!-- Formulir untuk memilih kriteria -->
    <!-- <form method="post">
        <label for="kriteria">Pilih Kriteria:</label>
        <div class="select-wrapper">
            <select>
                <option value="1">Pilihan 1 yang sangat panjang sekali yang sangat panjang sekali yang sangat panjang
                    sekali yang sangat panjang sekali yang sangat panjang sekali</option>
                <option value="2">Pilihan 2 yang juga cukup panjang</option>
                <option value="3">Pilihan 3 dengan teks yang lumayan banyak</option> -->
    <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
    <!-- </select>
        </div>
        <br> -->
    <!-- <input type="submit" value="Generate Kode Indikator"> -->
    <!-- </form> -->

    <!-- 
    <h1>Aplikasi Pertanyaan</h1>
    <div id="pertanyaan"></div>
    <button id="nextButton">Next</button>

    <script src="script.js"></script> -->
</body>

</html>