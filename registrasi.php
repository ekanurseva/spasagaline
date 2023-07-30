<?php
require_once 'controller/controller_user.php';
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
        <div class="content" style="margin: 0;">
            <!-- konten -->
            <div class="contents px-3 py-3 text-center text-white">
                <div class="tabel glow tab px-2 py-4 text-center" style="margin: 8% 25%;">
                    <div class="title-regt text-center">
                        <h4>Registrasi</h4>
                    </div>
                    <div class="title-logo-pw">
                        <img src="img/Login.png" class="img-logo-regt" alt="Logo">
                    </div>

                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="input-group input-user">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-person-lines-fill"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder=" " required>
                                <label for="nama">Nama</label>
                                <hr style="margin-top: -7px;">
                            </div>
                        </div>
                        <div class="input-group input-item">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-person-bounding-box"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" name="username" placeholder=" "
                                    required>
                                <label for="username">Username</label>
                                <hr style="margin-top: -7px;">
                            </div>
                        </div>
                        <div class="input-group input-item">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-key"></i></span>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="pwd" placeholder=" "
                                    required>
                                <label for="password">Password</label>
                                <hr style="margin-top: -7px;">
                            </div>
                        </div>
                        <div class="input-group input-item">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-key-fill"></i></span>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password2" name="pwd2" placeholder=" "
                                    required>
                                <label for="password2">Konfirmasi Password</label>
                                <hr style="margin-top: -7px;">
                            </div>
                        </div>
                        <div class="input-group input-item">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-envelope-at-fill"></i></span>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder=" "
                                    required>
                                <label for="email">Email</label>
                                <hr style="margin-top: -7px;">
                            </div>
                        </div>
                        <div class="input-group input-pw">
                            <span class="input-group-text grup"><i class="fs-3 bi bi-camera-fill"></i></span>
                            <div class="foto-profil">
                                <img src="img/default.png" class="img-preview">
                            </div>
                            <div class="col-10">
                                <div class="input-group mb-3 uploadFoto">
                                    <input type="file" class="form-control regt" id="profil" name="foto">
                                </div>
                            </div>
                        </div>

                        <div class="clik">
                            <button type="submit" name="submit" class="btn-long">
                                <span class="fw-medium">SUBMIT</span>
                            </button>
                        </div>
                    </form>

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


<?php
if (isset($_POST['submit'])) {
    if (register_user($_POST) > 0) {
        $_SESSION["berhasil"] = "Registrasi User Berhasil!";
        echo "
              <script>
                document.location.href='login.php';
              </script>
          ";
    } elseif (register_user($_POST) == 0) {
        echo "
          <script>
              Swal.fire(
                'Gagal!',
                'Registrasi User Gagal!',
                'error'
            )
          </script>
          ";
    }
}
?>