<?php
session_start();
require_once('../controller/controller_hasil.php');
validasi();

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$indikator = query("SELECT * FROM ind_gejala");

$kriteria = query("SELECT * FROM kriteria");

$kriteriaSaatIni = null; // Inisialisasi dengan null

// Memastikan ada kriteria yang tersedia
if (!empty($kriteria)) {
    $kriteriaSaatIni = $kriteria[0]['idkriteria']; // Set the current criteria to the first one
}

if (isset($_POST['submit_hitung'])) {
    if (hitung($_POST) > 0) {
        echo "
            <script>
              document.location.href='../hasil';
            </script>
        ";
    } else {
        echo "
            <script>
              document.location.href='index.php';
            </script>
        ";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- package sweet alert (swal) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500&display=swap" rel="stylesheet">

    <title>SPASAGALINE</title>

    <!-- css -->
    <link rel="stylesheet" href="../style.css">

    <!-- logo -->
    <link rel="Icon" href="../img/Logo.png">
</head>

<body>
    <div class="main-container d-flex">
        <!-- sidebar -->
        <?php
        // Cek peran pengguna dan masukkan file sidebar yang sesuai
        if ($user['level'] === "User") {
            require_once('../sidenav/sidebar_user.php');
        } elseif ($user['level'] === "Admin") {
            require_once('../sidenav/sidebar.php');
        } else {
            // Jika peran tidak dikenali, Anda dapat menambahkan pesan error atau tindakan lain sesuai kebutuhan
            echo "Error: Peran pengguna tidak valid.";
        }
        ?>
        <!-- sidebar selesai -->

        <div class="content">
            <!-- navbar -->
            <?php
            require_once('../sidenav/navbar.php');
            ?>
            <!-- navbar selesai -->

            <!-- konten -->
            <div class="contents px-4 py-3">
                <h4 class="text-white text-center pb-3">DIAGNOSIS GEJALA KECANDUAN GAME ONLINE</h4>

                <div class="tabel text-white px-5 py-4">
                    <div class="row pb-2 d-flex justify-content-center">
                        <div class="col-12">
                            <input style="height: 30px;" type="text" readonly id="nama" value="<?= $user['nama']; ?>"
                                class="form-control fw-medium text-center">
                        </div>
                    </div>
                    <p class="text-center py-3">Silahkan Jawab Pertanyaan Di Bawah Untuk Mendapatkan Hasil Diagnosis &
                        Solusi</p>
                    <form id="diagnosisForm">
                        <div id="kriteria" class="fw-medium d-flex justify-content-center mb-2">
                            <?= $kriteriaSaatIni; ?>
                        </div>
                        <!-- Tampilkan pertanyaan saat ini -->

                        <div id="kriteriaPertanyaan" class="pertanyaan">
                            <!-- Pertanyaan akan dimuat di sini -->
                        </div>

                        <!-- Tombol "next" untuk beralih ke kriteria lain -->
                        <button type="button" id="nextButton" class="btn btn-outline-light fw-medium">Next</button>

                        <!-- Pertanyaan selesai dan lakukan perhitungan -->
                        <button type="submit" id="submitButton" name="submit_hitung" style="display: none;"
                            class="btn btn-success">Submit</button>

                        <!-- Simpan informasi saat ini kriteria dan pertanyaan yang ditampilkan -->
                        <input type="hidden" id="currentKriteria" value="<?= $kriteriaSaatIni; ?>">
                        <input type="hidden" id="currentPertanyaan" value="1">
                    </form>
                </div>

            </div>

            <!-- konten selesai -->
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once('../sidenav/footer.php');
    ?>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../script.js"></script>

    <script>
        // Daftar kriteria
        var daftarKriteria = <?= json_encode($kriteria); ?>;
        var kriteriaSaatIni = 0; // Indeks kriteria saat ini
        var indeksPertanyaanSaatIni = 0; // Indeks pertanyaan saat ini
        var data_pertanyaan = []; // Simpan pertanyaan saat ini


        // Fungsi untuk menampilkan pertanyaan saat ini
        function tampilkanPertanyaan(indeks) {
            if (indeks < data_pertanyaan.length) {
                // Tampilkan pertanyaan berdasarkan indeks
                // var pertanyaan = data_pertanyaan[indeks];
                var tampilHTML = '';
                var nomor = 1;
                for (var f = 0; f < data_pertanyaan.length; f++) {
                    var pertanyaan = data_pertanyaan[f];
                    console.log(pertanyaan);
                    tampilHTML += `
                        <h6 class="m-0 fw-medium">
                            ${nomor}.
                            ${pertanyaan.text_pertanyaan}
                        </h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" id="iya_${pertanyaan.kode_pertanyaan}" name="pertanyaan_${pertanyaan.kode_pertanyaan}" required>
                            <label class="form-check-label" for="iya_${pertanyaan.kode_pertanyaan}">Iya</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" value="0.5" id="tidak_${pertanyaan.kode_pertanyaan}" name="pertanyaan_${pertanyaan.kode_pertanyaan}" required>
                            <label class="form-check-label" for="tidak_${pertanyaan.kode_pertanyaan}">Tidak</label>
                        </div>
                    `;

                    nomor++;
                }
                var pertanyaanElement = document.getElementById("kriteriaPertanyaan");
                pertanyaanElement.innerHTML = tampilHTML;
            } else {
                // Sembunyikan tombol "Next" dan tampilkan tombol "Submit"
                var nextButton = document.getElementById("nextButton");
                nextButton.style.display = "none";

                var submitButton = document.getElementById("submitButton");
                submitButton.style.display = "block";
            }
        }

        // Fungsi untuk menampilkan kriteria berikutnya
        function tampilkanKriteriaBerikutnya() {
            if (kriteriaSaatIni < daftarKriteria.length - 1) {
                kriteriaSaatIni++; // Pindah ke kriteria berikutnya
                var kriteriaElement = document.getElementById("kriteria");
                kriteriaElement.textContent = daftarKriteria[kriteriaSaatIni].nama_kriteria;
                indeksPertanyaanSaatIni = 0; // Reset indeks pertanyaan saat pindah ke kriteria berikutnya
                muatPertanyaanKriteria(); // Muat pertanyaan untuk kriteria berikutnya

                // Sembunyikan tombol "Submit" ketika pindah ke kriteria berikutnya
                var submitButton = document.getElementById("submitButton");
                submitButton.style.display = "none";
            } else {
                // Semua kriteria dan pertanyaan telah selesai, tampilkan tombol "Submit"
                var submitButton = document.getElementById("submitButton");
                submitButton.style.display = "block";

                // Sembunyikan tombol "Next" ketika semua pertanyaan telah selesai
                var nextButton = document.getElementById("nextButton");
                nextButton.style.display = "none";
            }
        }

        // Fungsi untuk memuat pertanyaan dari kriteria yang sesuai
        function muatPertanyaanKriteria() {
            var kriteriaId = daftarKriteria[kriteriaSaatIni].idkriteria;

            // Mengambil semua pertanyaan yang sesuai dengan kriteria saat ini melalui AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Sukses mendapatkan pertanyaan, simpan dalam data_pertanyaan
                    data_pertanyaan = JSON.parse(xhr.responseText);
                    // console.log(data_pertanyaan); // Tampilkan data pertanyaan di konsol
                    tampilkanPertanyaan(indeksPertanyaanSaatIni); // Tampilkan pertanyaan pertama
                }
            };
            xhr.open("GET", "proses.php?kriteriaId=" + kriteriaId, true);
            xhr.send();
        }

        // Fungsi untuk menampilkan semua pertanyaan dari setiap kriteria
        function tampilkanSemuaPertanyaan() {
            // Reset indeks pertanyaan saat pindah ke kriteria berikutnya
            indeksPertanyaanSaatIni = 0;

            // Muat pertanyaan untuk setiap kriteria secara berurutan
            for (var i = 0; i < daftarKriteria.length; i++) {
                var kriteriaId = daftarKriteria[i].idkriteria;
                muatPertanyaanKriteria(kriteriaId);
            }
        }

        // Tampilkan pertanyaan saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function () {
            var kriteriaElement = document.getElementById("kriteria");
            kriteriaElement.textContent = daftarKriteria[kriteriaSaatIni].nama_kriteria;
            muatPertanyaanKriteria(daftarKriteria[kriteriaSaatIni].idkriteria); // Muat pertanyaan pertama
        });

        // Tangani klik tombol "next"
        var nextButton = document.getElementById("nextButton");
        nextButton.addEventListener("click", function () {
            // Pindah ke kriteria berikutnya
            tampilkanKriteriaBerikutnya();
        });

        // Tangani klik tombol "Submit"
        var submitButton = document.getElementById("submitButton");
        submitButton.addEventListener("click", function () {
            // Panggil fungsi hitung melalui AJAX ketika tombol "Submit" ditekan
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Tanggapan dari server, Anda dapat menambahkan logika di sini jika diperlukan
                    console.log(xhr.responseText);

                    // Di sini, Anda dapat menjalankan fungsi hitung jika Anda ingin melakukan sesuatu dengan respons dari server
                    // contohnya: hitung(JSON.parse(xhr.responseText));

                    // Atau, jika Anda ingin mengarahkan pengguna ke halaman hasil setelah perhitungan selesai
                    // document.location.href = '../hasil';
                }
            };
            xhr.open("POST", "proses.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Mengambil semua data form secara asinkron
            var formData = new FormData(document.getElementById("diagnosisForm"));
            formData.append("submit_hitung", "1"); // Sertakan data tambahan jika diperlukan

            // Kirim permintaan POST untuk mengeksekusi fungsi hitung
            xhr.send(formData);

            // Atur tindakan lain yang Anda butuhkan setelah mengirim permintaan AJAX, seperti pengalihan ke halaman hasil
            // Misalnya, Anda dapat mengganti baris berikut ini dengan perintah yang sesuai:
            // document.location.href = '../hasil';
        });


    </script>

</body>

</html>