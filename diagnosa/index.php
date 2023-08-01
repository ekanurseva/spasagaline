<?php
session_start();
validasi();

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

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
                <h4 class="text-white text-center pb-3">DIAGNOSA GEJALA KECANDUAN GAME ONLINE</h4>

                <div class="tabel text-white px-5 py-4">
                    <div class="row pb-2">
                        <div class="col-auto" style="margin-right: 0.5px;">
                            <label for="nama" class="col-form-label">Nama</label>
                        </div>
                        <div class="col-6">
                            <input style="height: 30px;" type="text" readonly id="nama" value="Eka Nurseva"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto" style="margin-right: 10px;">
                            <label for="usia" placeholder="Masukkan Usia Anda" class="col-form-label">Usia</label>
                        </div>
                        <div class="col-6">
                            <input style="height: 30px;" type="text" id="nama" class="form-control">
                        </div>
                    </div>
                    <p class="text-center py-3">Silahkan Jawab Pertanyaan Di Bawah Untuk Mendapatkan Hasil Diagnosa &
                        Solusi</p>
                    <div class="row pt-2">
                        <div class="col-6">
                            <p>1. pertanyaan 1 ............................?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <p>2. pertanyaan 2 ............................?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="submit text-center pt-4">
                        <a href="hasil.php" class="fw-medium text-decoration-none">
                            <span>SUBMIT</span>
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