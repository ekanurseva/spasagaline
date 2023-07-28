<?php
session_start();

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
    <link rel="stylesheet" href="style.css">

    <!-- logo -->
    <link rel="Icon" href="img/Logo.png">
</head>

<body>
    <div class="main-container d-flex">
        <!-- sidebar -->
        <?php
        require_once('sidebar.php');
        ?>
        <!-- sidebar selesai -->

        <div class="content">
            <!-- navbar -->
            <?php
            require_once('sidenav/navbar.php');
            ?>
            <!-- navbar selesai -->

            <!-- konten -->
            <div class="contents px-4 py-3">
                <h4 class="text-white text-center pb-3">HASIL DIAGNOSA</h4>

                <div class="tabel text-white px-5 py-4">
                    <h6 class="text-center">Eka Nurseva Saniyah (22thn)</h6>
                    <div class="judul">
                        <p>Kriteria Gejala Kecanduan Game Online Anda Adalah:</p>
                    </div>
                    <div class="box-hasil"
                        style=" border: solid #e68574; background: #ef9b8c; border-radius: 8px; padding: 20px 0;">
                        <h4 class="text-uppercase text-center">Salience : 79%</h4>
                        <div class="desk text-center">
                            <p>merupakan kriteriakriteria dimana bermain game online menjadi aktivitas penting dan
                                mendominasi pikirannya</p>
                        </div>
                        <h6 class="text-center">Tingkat Kecanduan Sedang</h6>
                    </div>

                    <div class="solusi mt-4">
                        <ul>Solusi Dari Tingkat Kecanduan Tersebut, Yaitu:</ul>
                        <li>Mengurangi waktu bermain game online dengan lebih memperhatikan lingkungan sekitar dan fokus
                            terhadap hal positif yang mendukung aktivitas dalam mengalihkan keinginan untuk bermain game
                            online</li>
                        <li>Sebaiknya konsultasi dengan psikolog/psikiater</li>
                    </div>

                    <div class="submit text-center pt-4">
                        <a href="#" class="fw-medium text-decoration-none">
                            <span><i class="bi bi-printer me-2"></i>CETAK HASIL</span>
                        </a>
                    </div>
                </div>

            </div>
            <!-- konten selesai -->
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>