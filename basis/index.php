<?php
session_start();

require_once('../controller/controller_indikator.php');
require_once('../controller/controller_kriteria.php');

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$jumlah_kriteria = jumlah_data("SELECT * FROM kriteria");
$jumlah_ind = jumlah_data("SELECT * FROM ind_gejala");

$krit = query("SELECT * FROM kriteria ORDER BY idkriteria DESC");

$kriteria = query("SELECT * FROM kriteria");
$indikator = query("SELECT * FROM ind_gejala");
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

    <!-- package data tables bootstrap-5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

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
                <h4 class="text-white text-center pb-3">MANAJEMEN BASIS PENGETAHUAN</h4>

                <!-- card -->
                <div class="row px-3">
                    <div class="card me-5">
                        <div class="card-body">
                            <a href="input_kriteria.php" class="fw-medium">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Kriteria</span>
                            </a>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_kriteria; ?>
                            </p>
                            <i class="icon bi bi-file-medical-fill"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button class="fw-medium" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Indokator</span>
                            </button>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_ind; ?>
                            </p>
                            <i class="icon bi bi-file-text-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal Input Indikator = Pilih Kriteria -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Kriteria</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="input_indikator.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kriteria" class="form-label">Pilih kriteria untuk menambahkan
                                            indikator gejala</label>

                                        <div class="">
                                            <select id="kriteria" class="form-select"
                                                aria-label="Default select example" name="kriteria">
                                                <?php foreach ($krit as $ink): ?>
                                                    <option value="<?= $ink['idkriteria']; ?>">
                                                        <?= $ink['kode_kriteria']; ?> - <?= $ink['nama_kriteria']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Pilih</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Input Indikator = Pilih Kriteria Selesai -->

                <!-- button ahp -->
                <div class="btn-ahp">
                    <span style="font-size: 9px; color: white; margin-left: 10px;">Lakukan Analisis Hierarki Kriteria
                        Terlebih Dahulu</span>
                    <div class="ahp fw-medium mt-2">
                        <button style="background: none; border: none;">
                            <a href="ahp_kriteria.php" style="padding-right: 20px;">
                                <i class="bi bi-table"></i>
                                Analisis Hierarki Kriteria
                            </a>
                        </button>
                    </div>
                    <div class="ahp fw-medium mt-2">
                        <button style="background: none; border: none;">
                            <a data-bs-toggle="modal" data-bs-target="#ahpindikator">
                                <i class="bi bi-table"></i>
                                Analisis Hierarki Indikator
                            </a>
                        </button>
                    </div>
                </div>

                <!-- Modal Input Kode Untuk AHP = Pilih Kriteria -->
                <div class="modal fade" id="ahpindikator" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="ahpindikatorLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ahpindikatorLabel">Pilih Kriteria</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="ahp_indikator.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kriteria" class="form-label">Pilih kriteria untuk memulai analisis
                                            Indikator</label>

                                        <div class="">
                                            <select id="kriteria" class="form-select"
                                                aria-label="Default select example" name="kriteria">
                                                <?php foreach ($krit as $ink): ?>
                                                    <?php
                                                    $idkrit = $ink['idkriteria'];
                                                    $jumlah_data = jumlah_data("SELECT * FROM ind_gejala WHERE idkriteria = $idkrit");
                                                    if ($jumlah_data > 1):
                                                        ?>
                                                        <option value="<?= $ink['idkriteria']; ?>">
                                                            <?= $ink['kode_kriteria']; ?> - <?= $ink['nama_kriteria']; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Pilih</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Kembali
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Input Kode Untuk AHP = Pilih Kriteria Selesai -->

                <!-- table Kriteria -->
                <h5 class="jdl mt-4">Table Kriteria</h5>
                <div class="tabel mb-4">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">KRITERIA</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">KODE</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; foreach ($kriteria as $k):
                                $enkripsi = enkripsi($k['idkriteria']);
                                ?>
                                <tr>
                                    <th class="no">
                                        <?php echo $i; ?>
                                    </th>
                                    <td class="ind">
                                        <?= $k['nama_kriteria']; ?>
                                    </td>
                                    <td class="g">
                                        <?= $k['deskripsi']; ?>
                                    </td>
                                    <td class="kg">
                                        <?= $k['kode_kriteria']; ?>
                                    </td>
                                    <td class="aksi">
                                        <a href="edit_kriteria.php?id=<?= $enkripsi; ?>"><i
                                                class="bi bi-pencil-fill"></i></a> | <button
                                            style="border: none; background: none;" id="deleteKriteria"
                                            onclick="deleteKriteria(<?= $k['idkriteria']; ?>)"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <hr class="garis">

                <!-- table indokator gejala -->
                <h5 class="jdl">Table Indokator Gejala</h5>
                <div class="tabel">
                    <table id="example2" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">KODE KRITERIA</th>
                                <th scope="col">INDIKATOR GEJALA</th>
                                <th scope="col">KODE</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 1; foreach ($indikator as $g):
                                $enkripsi = enkripsi($g['idindikator']);
                                ?>
                                <tr>
                                    <th class="no">
                                        <?php echo $j; ?>
                                    </th>
                                    <?php
                                    $idkriteria = $g['idkriteria'];
                                    $kode_kriteria = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idkriteria")[0];
                                    ?>

                                    <td class="ind">
                                        <?= $kode_kriteria['kode_kriteria']; ?>
                                    </td>
                                    <td class="g">
                                        <?= $g['indikator']; ?>
                                    </td>
                                    <td class="kg">
                                        <?= $g['kode_indikator']; ?>
                                    </td>
                                    <td class="aksi">
                                        <a href="edit_indikator.php?id=<?= $enkripsi; ?>"><i
                                                class="bi bi-pencil-fill"></i></a> | <button
                                            style="border: none; background: none;" id="deleteIndikator"
                                            onclick="deleteIndikator(<?= $g['idindikator']; ?>)"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                                <?php
                                $j++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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