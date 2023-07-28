<?php
session_start();
require_once 'controller/controller_user.php';
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
        <div class="content" style="margin: 0;">
            <!-- konten -->
            <div class="contents px-4 py-3">
                <div class="tabel text-white px-5 mt-4 py-4">
                    <h4 class="text-white text-center pb-3">INPUT DATA PENGGUNA</h4>
                    <div class="row pb-1">
                        <div class="col-6">
                            <label for="nama" class="col-form-label">Nama</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="username" class="col-form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div class="col-6">
                            <label for="email" class="col-form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Alamat Email">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="password" class="col-form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="password" class="form-control" id="password" name="pwd"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div class="col-6">
                            <label for="nama" class="col-form-label">Foto Profil</label>
                            <div class="foto-profil">
                                <img src="img/default.png" class="img-preview">
                            </div>
                            <div class="col-10">
                                <div class="input-group mb-3 uploadFoto">
                                    <input type="file" class="form-control" id="profil" name="foto">
                                </div>
                            </div>
                            <label for="foto" class="foto">*kosongkan jika tidak ingin mengganti foto</label>
                        </div>
                        <div class="col-6">
                            <label for="password2" class="col-form-label">Konfirmasi Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                <input type="password" class="form-control" id="password2" name="pwd2"
                                    placeholder="Masukkan Ulang Password">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div style="margin-top: 20px" class="col-2 tombol">
                            <button type="submit" name="submit">
                                <span class="fw-medium">SUBMIT</span>
                            </button>
                        </div>
                        <div style="margin-top: 20px" class="col-2 tombol">
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
    <script src="script.js"></script>
</body>

</html>