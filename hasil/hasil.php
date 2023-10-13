<?php
session_start();
require_once('../controller/controller_hasil.php');
validasi();

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];


if (isset($_GET['idhasil'])) {
    $idhasil = dekripsi($_GET['idhasil']);

    $data_hasil = query("SELECT * FROM hasil WHERE idhasil = $idhasil")[0];
} else {
    $data_hasil = query("SELECT * FROM hasil WHERE iduser = $id AND idhasil = (SELECT MAX(idhasil) FROM hasil WHERE iduser = $id)")[0];
}
$idhasil = enkripsi($data_hasil['idhasil']);

$iduser = $data_hasil['iduser'];
$nama = query("SELECT * FROM user WHERE iduser = '$iduser'")[0];

$kriteria_cf = kriteria_cf($data_hasil);
$hasil_cf = hasil_cf($data_hasil);

$kriteria_besar = $kriteria_cf[0];

$kriteria = query("SELECT * FROM kriteria WHERE nama_kriteria = '$kriteria_besar'")[0];

$nama_kategori = $data_hasil['hsl_kategori'];
$kategori = query("SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'")[0];

$idkategori = $kategori['idkategori'];
$solusi = query("SELECT * FROM solusi WHERE idkategori = $idkategori");

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
        require_once('../sidenav/sidebar_user.php');
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
                <h4 class="text-white text-center pb-3">HASIL DIAGNOSIS</h4>

                <div class="tabel text-white px-5 py-4">
                    <h6 class="text-center text-uppercase">
                        <?php echo $data_hasil['anak']; ?>
                    </h6>
                    <div class="judul">
                        <p>Kriteria Gejala Kecanduan Game Online Anda Adalah:</p>
                    </div>
                    <div class="box-hasil">
                        <?php for ($j = 0; $j < count($kriteria_cf); $j++) { ?>
                            <?php if ($kriteria_cf[$j] == $kriteria['nama_kriteria']): ?>
                                <h4 class="text-uppercase text-center fw-bold">
                                    <?= $kriteria_cf[$j]; ?> :
                                    <?= $hasil_cf[$j]; ?>%
                                </h4>
                                <div class="desk text-center mb-2 mt-2 fw-medium" style="font-size: 17px;">
                                    <p>
                                        <?= $kriteria['deskripsi']; ?>
                                    </p>
                                </div>
                            <?php else: ?>
                                <h5 class="text-uppercase text-center fw-bold">
                                    <?= $kriteria_cf[$j]; ?> :
                                    <?= $hasil_cf[$j]; ?>%
                                </h5>
                            <?php endif; ?>
                        <?php } ?>
                        <h4 class="text-center mt-4">Kategori Tingkat Kecanduan <span class="fw-bold">
                                <?= $data_hasil['hsl_kategori']; ?>
                            </span>
                        </h4>
                    </div>

                    <div class="solusi mt-4">
                        <ul class="fw-medium mb-0 justify">Solusi Dari Tingkat Kecanduan Tersebut, Yaitu:</ul>
                        <?php foreach ($solusi as $ds): ?>
                            <li class="ms-4">
                                <?= $ds['nama_solusi']; ?>
                            </li>
                        <?php endforeach; ?>
                    </div>

                    <div class="submit text-center mt-4 pt-4">
                        <?php
                        if ($user['level'] === "User" || $user['level'] === "Admin") {
                            echo '<a href="../print.php?id=' . $idhasil . '" target="_blank"
                                    class="fw-medium text-decoration-none">
                                    <span><i class="bi bi-printer me-2"></i>CETAK HASIL</span>
                                </a>';
                        } else {
                            echo '<a href="../cetak.php?id=' . $idhasil . '" target="_blank"
                                    class="fw-medium text-decoration-none">
                                    <span><i class="bi bi-printer me-2"></i>CETAK HASIL</span>
                                </a>';
                        }
                        ?>

                    </div>
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
</body>

</html>