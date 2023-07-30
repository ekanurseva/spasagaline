<?php
// if (isset($_POST['submit'])) {
//     $text = $_POST['text'];
//     preg_match('/\d+/', $text, $matches);

//     echo "Katanya adalah " . $text . "<br>";
//     echo "Angkanya adalah " . $matches[0];
// }

// Cek apakah form telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap nilai kriteria dari input form
    $kriteria = $_POST['kriteria'];

    // Validasi nilai kriteria jika perlu

    // Fungsi untuk menghasilkan kode indikator berikutnya berdasarkan kriteria yang dipilih
    function generateIndicatorCode($kriteria)
    {
        // Koneksi ke database atau sumber data lainnya untuk mendapatkan kode terakhir berdasarkan kriteria yang dipilih
        // Di sini, kita hanya menggunakan data simulasi
        $lastCode = '0'; // Contoh kode terakhir, Anda harus menggantinya dengan data sebenarnya

        // Ekstrak angka terakhir dari kode terakhir menggunakan preg_match
        preg_match('/\d+$/', $lastCode, $matches);
        $lastNumber = (int) $matches[0];

        // Tambahkan 1 ke angka terakhir untuk mendapatkan angka berikutnya
        $nextNumber = $lastNumber + 1;

        // Format angka berikutnya menjadi 3 digit dengan leading zero jika perlu
        $nextNumberFormatted = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // Gabungkan dengan prefix "IND-" dan kriteria untuk mendapatkan kode lengkap
        $nextCode = 'IND-' . $nextNumberFormatted . '-' . $kriteria;

        return $nextCode;

    }

    // Contoh penggunaan fungsi untuk menghasilkan kode indikator berikutnya
    $nextIndicatorCode = generateIndicatorCode($kriteria);
    echo "Kode indikator berikutnya untuk kriteria $kriteria: " . $nextIndicatorCode;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Formulir untuk memilih kriteria -->
    <form method="post">
        <label for="kriteria">Pilih Kriteria:</label>
        <select name="kriteria" id="kriteria">
            <option value="KR1">Kriteria 1</option>
            <option value="KR2">Kriteria 2</option>
            <option value="KR3">Kriteria 3</option>
            <option value="KR4">Kriteria 4</option>
            <option value="KR5">Kriteria 5</option>
            <option value="KR6">Kriteria 6</option>
            <!-- Tambahkan opsi kriteria lainnya sesuai kebutuhan -->
        </select>
        <br>
        <input type="submit" value="Generate Kode Indikator">
    </form>
</body>

</html>