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
    <link rel="stylesheet" href="../style.css">

    <!-- logo -->
    <link rel="Icon" href="../img/Logo.png">
</head>

<body>
    <div class="main-container d-flex">
        <!-- sidebar -->
        <?php
        require_once('../sidenav/sidebar.php');
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
                <h4 class="text-white text-center pb-3">INPUT DATA KRITERIA</h4>

                <div class="tabel text-white px-5 py-4">
                    <div class="row pb-1">
                        <div class="col-6">
                            <label for="nama" class="col-form-label">Kode Kriteria</label>
                            <input type="text" value="K1" class="form-control" readonly>
                        </div>
                        <div class="col-6">
                            <label for="kriteria" class="col-form-label">Kriteria</label>
                            <input type="text" class="form-control" placeholder="Masukkan Jenis Kriteria">
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div class="col-6">
                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                            <textarea style="height: 70px" type="text" class="form-control"
                                placeholder="Masukkan Deskripsi Kriteria"></textarea>
                        </div>
                        <div class="col-2 tombol">
                            <button type="submit" name="submit">
                                <span class="fw-medium">SUBMIT</span>
                            </button>
                        </div>
                        <div class="col-2 tombol">
                            <a href="index.php" class="back fw-medium text-decoration-none">
                                <span>KEMBALI</span>
                            </a>
                        </div>
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
    <script src="../script.js"></script>
</body>

</html>