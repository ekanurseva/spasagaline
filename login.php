<?php
session_start();
require_once 'controller/controller_user.php';

if (isset($_COOKIE['SPASAGALINENS'])) {
    echo "<script>
            document.location.href='pengguna/index.php';
          </script>";
    exit;
}

if (isset($_POST["login"])) {
    if (login($_POST) == 1) {
        $error = true;
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
        <div class="content" style="margin: 0;">
            <!-- konten -->
            <div class="contents px-3 py-3 text-white">
                <div class="row justify-content-center">
                    <div class="tabel glow tab px-5 table-bordered table-striped text-center py-4">
                        <div class="row">
                            <div class="title ms-3 text-start">
                                <h3>Login</h3>
                            </div>
                            <div class="title-logo">
                                <img src="img/Login.png" class="img-logo" alt="Logo">
                            </div>
                        </div>

                        <form action="" method="post">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    Username/Password Salah
                                </div>
                            <?php endif; ?>

                            <div class="input-group mt-4 input-user">
                                <span class="input-group-text grup"><i
                                        class="fs-3 bi bi-person-bounding-box"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder=" "
                                        name="username">
                                    <label for="floatingInputGroup1">Username</label>
                                    <hr style="margin-top: -7px;">
                                </div>
                            </div>
                            <div class="input-group input-pw">
                                <span class="input-group-text grup"><i class="fs-3 bi bi-key-fill"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInputGroup2" placeholder=" "
                                        name="password" id="password">
                                    <label for="floatingInputGroup2">Password</label>
                                    <hr style="margin-top: -7px;">
                                </div>
                                <i class="password-icon fas fa-eye" onclick="togglePasswordVisibility()"></i>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6 login">
                                    <a href="registrasi.php">Registrasi</a>
                                </div>
                                <div class="col-6 login">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>

                            <div class="clik">
                                <button type="submit" class="btn-long" name="login">
                                    <span class="fw-medium">LOGIN</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Forgot Password = Input Email -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Masukkan Email</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="sendemail.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-dark">Masukkan email yang
                                            terdaftar</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Forgot Password = Input Email Selesai -->
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
if (isset($_SESSION["berhasil"])) {
    $pesan = $_SESSION["berhasil"];

    echo "
              <script>
                Swal.fire(
                  'Berhasil!',
                  '$pesan',
                  'success'
                )
              </script>
          ";
    $_SESSION = [];
    session_unset();
    session_destroy();


} elseif (isset($_SESSION['gagal'])) {
    $pesan = $_SESSION["gagal"];

    echo "
            <script>
                Swal.fire(
                    'Gagal!',
                    '$pesan',
                    'error'
                )
            </script>
        ";
    $_SESSION = [];
    session_unset();
    session_destroy();

}

?>