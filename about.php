<?php
session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
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
            <div class="contents px-3 py-3 text-center">
                <h4 class="text-white text-center">TENTANG APLIKASI</h4>

                <div class="tabel text-center text-white px-5 py-4">
                    <img style="width: 55px;" src="img/Logo.png" alt="Logo SPASAGALINE">
                    <h3 class="py-2">SPASAGALINE</h3>
                    <p class="py-2">merupakan Sistem Pakar Diagnosa Gejala Kecanduan Game Online yang dirancang dan
                        dibuat dengan
                        tujuan memudahkan pengguna dalam melakukan diagnosa gejala kecanduan game online dengan cepat
                        dan akurat berdasarkan pakar, dan menampilkan solusi penanganan awal gejala dengan tepat.</p>
                    <div class="row pt-2">
                        <div class="col-6">
                            <h6>Terdapat 7 Kriteria Gejala Kecanduan Game Online</h6>
                            <img style="width: 70%; margin-top: -10px;" src="img/kriteria-strmwcp.png" alt="">
                        </div>
                        <div class="col-6">
                            <h6>Dengan 3 Kategori Kecanduan Game Online</h6>
                            <img style="width: 25%; margin-top: -7px;" src="img/kategori.png" alt="">
                        </div>
                    </div>
                    <p class="fst-italic">Sumber Pakar: M. Azka Maulana. S.Psi., M.Psi, Psikolog</p>
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