<?php
session_start();
require_once('../controller/controller_kategori.php');

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$dekripsi = dekripsi($_GET['id']);
$kategori = query("SELECT * FROM kategori WHERE idkategori = $dekripsi")[0];
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
                <h4 class="text-white text-center pb-3">EDIT DATA KATEGORI</h4>

                <div class="tabel text-white px-5 py-4">
                    <form method="post" action="">
                        <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']; ?>">

                        <div class="row pb-1">
                            <div class="col-6">
                                <label for="kategori" class="col-form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    placeholder="Masukkan Kategori" value="<?= $kategori['nama_kategori']; ?>">
                            </div>
                            <div class="col-3">
                                <label for="bobot1" class="col-form-label">Range Atas</label>
                                <input type="number" id="bobot1" class="form-control" name="range_atas"
                                    placeholder="Masukkan Bobot Awal" step="0.01" max="9"
                                    value="<?= $kategori['range_atas']; ?>">
                            </div>
                            <div class="col-3">
                                <label for="bobot2" class="col-form-label">Range Bawah</label>
                                <input type="number" id="bobot2" class="form-control" name="range_bawah"
                                    placeholder="Masukkan Bobot Akhir" step="0.01" max="9"
                                    value="<?= $kategori['range_bawah']; ?>">
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div style="margin-top: 20px" class="col-2 tombol">
                                <button type="submit" name="submit_kategori">
                                    <span class="fw-medium">SUBMIT</span>
                                </button>
                            </div>
                            <div style="margin-top: 20px" class="col-2 tombol">
                                <a href="index.php" class="back fw-medium text-decoration-none">
                                    <span>KEMBALI</span>
                                </a>
                            </div>
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
    <script src="../script.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit_kategori'])) {
    if (edit_kategori($_POST) > 0) {

        $_SESSION["berhasil"] = "Data Kategori Berhasil Diubah!";

        echo "
            <script>
                document.location.href='index.php';
            </script>
        "
        ;
    } else {
        $_SESSION["gagal"] = "Data Kategori Gagal Diubah!";

        echo "
            <script>
                document.location.href='index.php';
            </script>
        "
        ;
    }
}
?>