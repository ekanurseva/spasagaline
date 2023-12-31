<?php
session_start();
require_once '../controller/controller_indikator.php';

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$id_indikator = dekripsi($_GET['id']);

$indikator = query("SELECT * FROM ind_gejala WHERE idindikator = $id_indikator")[0];

$idkriteria = $indikator['idkriteria'];
$kriteria = query("SELECT * FROM kriteria WHERE idkriteria = $idkriteria")[0];
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
                <h4 class="text-white text-center pb-3">EDIT DATA INDIKATOR</h4>

                <div class="tabel text-white px-5 py-4">
                    <form action="" method="post">
                        <input type="hidden" name="idindikator" id="" value="<?= $id_indikator; ?>">
                        <div class="row pb-1">
                            <div class="col-6">
                                <label for="nama" class="col-form-label">Kode Indikator</label>
                                <input type="text" value="<?= $indikator['kode_indikator']; ?>" class="form-control"
                                    readonly name="kode_indikator">
                            </div>
                            <div class="col-6">
                                <label for="kriteria" class="col-form-label">Kriteria</label>
                                <input type="text" class="form-control" value="<?= $kriteria['nama_kriteria']; ?>"
                                    name="kriteria" readonly>
                            </div>
                        </div>
                        <div class="row pb-1">
                            <div class="col-6">
                                <label for="indikator" class="col-form-label">Indikator</label>
                                <textarea rows="5" type="text" class="form-control"
                                    placeholder="Masukkan Indikator Kriteria"
                                    name="indikator"><?= $indikator['indikator']; ?></textarea>
                            </div>
                            <div class="col-2 tombol">
                                <button type="submit" name="submit"
                                    class="fw-medium text-decoration-none">UPDATE</button>
                            </div>
                            <div class="col-2 tombol">
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
if (isset($_POST['submit'])) {
    if (edit_indikator($_POST) > 0) {

        $_SESSION["berhasil"] = "Data Indikator Berhasil Diubah!";

        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    } else {
        $_SESSION["gagal"] = "Data Indikator Gagal Diubah!";

        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    }
}
?>