<?php
// Include file yang berisi fungsi hitung
require_once('../controller/controller_hasil.php');


if (isset($_GET['kriteriaId'])) {
    $kriteriaId = $_GET['kriteriaId'];

    // Ambil pertanyaan-pertanyaan berdasarkan kriteriaId yang diberikan
    $pertanyaan = query("SELECT p.* FROM pertanyaan p
                         JOIN ind_gejala i ON p.idindikator = i.idindikator
                         WHERE i.idkriteria = $kriteriaId");

    // Kembalikan pertanyaan-pertanyaan sebagai JSON
    header('Content-Type: application/json');
    echo json_encode($pertanyaan);
} else if (isset($_GET['semuaPertanyaan'])) { // Tambahkan ini untuk mengambil semua pertanyaan
    $semuaPertanyaan = query("SELECT p.* FROM pertanyaan p");

    // Kembalikan semua pertanyaan sebagai JSON
    header('Content-Type: application/json');
    echo json_encode($semuaPertanyaan);
} else {
    // Tangani kasus di mana kriteriaId tidak diberikan
    // Anda dapat mengembalikan pesan error atau menanganinya sesuai kebutuhan
    echo json_encode(array('error' => 'Kriteria ID tidak diberikan.'));
}

// Pastikan formulir telah disubmit
if (isset($_POST['submit_hitung'])) {
    // Proses jawaban dari formulir
    $hasilHitung = hitung($_POST);

    // Di sini, Anda dapat menggunakan hasilHitung untuk melakukan apa yang Anda butuhkan
    // Misalnya, jika Anda ingin mengirim hasil ini ke halaman hasil, Anda dapat menyimpannya dalam sesi PHP
    $_SESSION['hasil_hitung'] = $hasilHitung;

    // Kemudian, arahkan pengguna ke halaman hasil
    header("Location: ../hasil");
    exit();
}
?>