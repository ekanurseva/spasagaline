<?php
require_once 'controller/controller_user.php';
session_start();

if (isset($_GET['key'])) {
    $email = dekripsi($_GET['key']);

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (!mysqli_fetch_assoc($result)) {
        $_SESSION["gagal"] = "Email tidak ditemukan";
        echo "
          <script>
              document.location.href='login.php';
          </script>";
        exit();
    } else {
        $data = query("SELECT * FROM user WHERE email = '$email'")[0];

        $enkripsi_email = enkripsi($data['email']);
    }
} else {
    echo "<script>
            document.location.href='login.php';
          </script>";
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
            <div class="contents px-3 py-3 text-center text-white">
                <div class="row justify-content-center">
                    <div class="tabel glow tab px-5 table-bordered table-striped text-center py-4 my-5">
                        <div class="title-pw ms-3 text-start">
                            <h5>Ubah</h5>
                            <h5 style="margin-top: -10px">Password</h5>
                        </div>
                        <div class="title-logo-pw">
                            <img src="img/Login.png" class="img-logo" alt="Logo">
                        </div>

                        <form method="post" action="">
                            <input type="hidden" name="iduser" value="<?= $data['iduser']; ?>">

                            <div class="input-group input-user">
                                <span class="input-group-text grup"><i
                                        class="fs-3 bi bi-person-bounding-box"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup3" placeholder=" "
                                        value="<?= $data['nama']; ?>" aria-label="Disabled input example" readonly>
                                    <label for="floatingInputGroup1">Nama</label>
                                    <hr style="margin-top: -7px;">
                                </div>
                            </div>
                            <div class="input-group input-pw">
                                <span class="input-group-text grup"><i
                                        class="fs-3 bi bi-person-bounding-box"></i></span>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingInputGroup1"
                                        placeholder=" ">
                                    <label for="floatingInputGroup1">Password</label>
                                    <hr style="margin-top: -7px;">
                                </div>
                            </div>
                            <div class="input-group input-pw">
                                <span class="input-group-text grup"><i class="fs-3 bi bi-key-fill"></i></span>
                                <div class="form-floating">
                                    <input type="password" name="password2" class="form-control"
                                        id="floatingInputGroup2" placeholder=" ">
                                    <label for="floatingInputGroup2">Konfirmasi Password</label>
                                    <hr style="margin-top: -7px;">
                                </div>
                            </div>

                            <div class="clik mt-4 mb-4">
                                <button class="btn-long" type="submit" name="update_password">
                                    <span class="fw-medium">SUBMIT</span>
                                </button>
                            </div>
                        </form>
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


<?php
if (isset($_POST['update_password'])) {
    if (update_password($_POST) > 0) {
        $_SESSION["berhasil"] = "Ubah Password Berhasil!";

        echo "
        <script>
          document.location.href='login.php';
        </script>
        ";
    } else {
        $_SESSION["gagal"] = "Ubah Password Gagal!";

        echo "
          <script>
            document.location.href='login.php';
          </script>
      ";
    }
}
?>