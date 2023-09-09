<?php
session_start();
require_once '../controller/controller_kriteria.php';

$kriteria = query("SELECT * FROM kriteria");
$rel_krit = query("SELECT nilai FROM rel_kriteria");

$krit = query("SELECT * FROM kriteria ORDER BY idkriteria ASC");

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];


if (isset($_POST['submit_ubah'])) {
    edit_kode_kriteria($_POST);
    $idKode1 = $_POST['kode1'];
    $idKode2 = $_POST['kode2'];

    $data_kode1 = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idKode1")[0];
    $data_kode2 = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idKode2")[0];

    $data_kode[] = $data_kode1['kode_kriteria'];
    $data_kode[] = $data_kode2['kode_kriteria'];

    for ($i = 0; $i < count($data_kode); $i++) {
        for ($j = 0; $j < count($data_kode); $j++) {
            $kode1 = $data_kode[$i];
            $kode2 = $data_kode[$j];

            $data_nilai = query("SELECT * FROM rel_kriteria WHERE ID1 = '$kode1' AND ID2 = '$kode2'")[0];
            ${"nilai_" . $i . $j} = $data_nilai['nilai'];
        }
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
                <h4 class="text-white text-center pb-3">ANALISA HIERARKI KRITERIA</h4>

                <div class="tabel text-white px-5 py-4">
                    <div class="panel-body">
                        <form class="mb-0" method="post" action="">
                            <input type="hidden" name="kriteria" value="rel_kriteria">

                            <div class="row m-0">
                                <div class="col-2 p-0 pe-2">
                                    <div class="form-group">
                                        <select class="form-select" name="kode1">
                                            <?php foreach ($krit as $k): ?>
                                                <option value="<?= $k['idkriteria']; ?>">
                                                    <?= $k['kode_kriteria']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5 p-0">
                                    <div class="form-group">
                                        <select class="form-select" name="nilai">
                                            <option value="1">1 - Sama penting dengan</option>
                                            <option value="2">2 - Mendekati sedikit lebih penting dari</option>
                                            <option value="3">3 - Sedikit lebih penting dari</option>
                                            <option value="4">4 - Mendekati lebih penting dari</option>
                                            <option value="5">5 - Lebih penting dari</option>
                                            <option value="6">6 - Mendekati sangat penting dari</option>
                                            <option value="7">7 - Sangat penting dari</option>
                                            <option value="8">8 - Mendekati mutlak dari</option>
                                            <option value="9">9 - Mutlak sangat penting dari</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 p-0 ps-2">
                                    <div class="form-group">
                                        <select class="form-select" name="kode2">
                                            <?php foreach ($krit as $k): ?>
                                                <option value="<?= $k['idkriteria']; ?>">
                                                    <?= $k['kode_kriteria']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1 d-flex align-items-center pt-1">
                                    <div class="ahp_btn">
                                        <button type="submit" name="submit_ubah">
                                            EDIT
                                        </button>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit_ubah'])): ?>
                                    <div class="col-2 px-0 d-flex align-items-center pt-1">
                                        <div class="ahp_btn" style="font-size: 10px;">
                                            <button type="submit" name="kembali">
                                                TAMPIL DATA
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-1 my-2 p-0 pt-1">
                                    <div style="font-size: 13px;">
                                        <a href="index.php" style="padding: 6px 10px;"
                                            class="back fw-medium text-decoration-none">
                                            KEMBALI
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ahp_btn mt-3 d-flex justify-content-end">
                                    <a href="hasil_ahp_kriteria.php" style="padding: 0 50px; text-decoration: none;"
                                        type="submit" name="aksi">
                                        ANALISIS
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div class="tabel mt-4">
                            <?php
                            if (isset($_POST["submit_ubah"])) { ?>

                                <table class="table mt-4 table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">KODE</th>
                                            <td class="fw-medium" scope="col">
                                                <?= $data_kode1['kode_kriteria']; ?>
                                            </td>
                                            <td class="fw-medium" scope="col">
                                                <?= $data_kode2['kode_kriteria']; ?>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">
                                                <?= $data_kode1['kode_kriteria']; ?>
                                            </td>
                                            <td>
                                                <?= round($nilai_00, 3); ?>
                                            </td>
                                            <td>
                                                <?= round($nilai_01, 3); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">
                                                <?= $data_kode2['kode_kriteria']; ?>
                                            </td>
                                            <td>
                                                <?= round($nilai_10, 3); ?>
                                            </td>
                                            <td>
                                                <?= round($nilai_11, 3); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            } else { ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">KODE</th>
                                            <?php foreach ($kriteria as $dkrit): ?>
                                                <td class="fw-medium" scope="col">
                                                    <?= $dkrit['kode_kriteria']; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kriteria as $krit):
                                            $indi_kode1 = $krit['kode_kriteria'];
                                            ?>
                                            <tr>
                                                <td class="fw-medium">
                                                    <?= $krit['kode_kriteria']; ?>
                                                </td>
                                                <?php foreach ($kriteria as $kator):
                                                    $indi_kode2 = $kator['kode_kriteria'];
                                                    $data_rel = query("SELECT nilai FROM rel_kriteria WHERE ID1 = '$indi_kode1' AND ID2 = '$indi_kode2'")[0];
                                                    $nilai_rel = round($data_rel['nilai'], 3);
                                                    ?>
                                                    <td class="fw-medium">
                                                        <?= $nilai_rel; ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            <?php } ?>
                        </div>
                    </div>
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