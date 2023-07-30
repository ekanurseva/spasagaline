<?php
// Fungsi Kode Indikator
function generateIndicatorCode($kriteria)
{
    $lastCode = 'IND-' . $kriteria . '-000'; // Contoh kode terakhir, Anda harus menggantinya dengan data sebenarnya

    // Ekstrak angka terakhir dari kode terakhir menggunakan preg_match
    preg_match('/\d+/', $lastCode, $matches);
    $lastNumber = (int) $matches[0];

    // Tambahkan 1 ke angka terakhir untuk mendapatkan angka berikutnya
    $nextNumber = $lastNumber + 1;

    // Format angka berikutnya menjadi 3 digit dengan leading zero jika perlu
    $nextNumberFormatted = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    // Gabungkan dengan prefix "IND-" dan kriteria untuk mendapatkan kode lengkap
    $nextCode = 'IND-' . $nextNumberFormatted . '-' . $kriteria;

    return $nextCode;

}


// Contoh penggunaan fungsi untuk menghasilkan kode indikator berikutnya dengan kode kriteria

// Fungsi Kode Indikator Selesai
?>