<?php
session_start();
require_once('../controller/controller_main.php');
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

    <!-- bootstrap css -->
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
        if ($user['level'] === "User" || $user['level'] === "Ortu") {
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
            <div class="contents px-3 py-3 text-center">
                <h4 class="text-white text-center">
                    <?= $user['nama']; ?>
                </h4>
                <h1 class="text-white text-center pb-3">Welcome to SPASAGALINE</h1>

                <?php
                if ($user['level'] === "User") {
                    echo '<a href="../diagnosa" class="text-decoration-none fw-bold">
                            <i class="bi bi-controller"></i>
                            <span>Mulai Deteksi</span>
                          </a>';
                } else {
                    echo '<a type="button" class="text-decoration-none fw-bold" data-bs-toggle="modal" data-bs-target="#deteksi"><i class="bi bi-controller"></i>
                    <span>Mulai Deteksi</span></a>';
                }
                ?>

                <div class="kritera pt-3">
                    <img style="width: 93%" src="../img/Home.png" alt="kriteria kecanduan game online">
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