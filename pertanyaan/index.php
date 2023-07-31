<?php
session_start();
require_once '../controller/controller_pertanyaan.php';

$jumlah_pertanyaan = jumlah_data("SELECT * FROM pertanyaan");
$pertanyaan = query("SELECT * FROM pertanyaan");
$ind = query("SELECT * FROM ind_gejala ORDER BY idindikator DESC");
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
                <h4 class="text-white text-center pb-3">MANAJEMEN DATA PERTANYAAN</h4>
                <div class="row px-3">
                    <div class="card me-5">
                        <div class="card-body">
                            <button class="fw-medium" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Pertanyaan</span>
                            </button>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_pertanyaan; ?>
                            </p>
                            <i class="icon bi bi-question-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal Input Pertanyaan = Pilih Indikator -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Indikator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="input_pertanyaan.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="indikator" class="form-label">Pilih indikator untuk menambahkan
                                            pertanyaan</label>

                                        <div class="">
                                            <select id="indikator" class="form-select"
                                                aria-label="Default select example" name="indikator">
                                                <?php foreach ($ind as $g): ?>
                                                    <option value="<?= $g['idindikator']; ?>">
                                                        <?= $g['kode_indikator']; ?>
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
                <!-- Modal Input Pertanyaan = Pilih Indikator Selesai -->

                <div class="tabel mt-4">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">KODE INDIKATOR</th>
                                <th scope="col">PERTANYAAN</th>
                                <th scope="col">KODE</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; foreach ($pertanyaan as $p):
                                $enkripsi = enkripsi($p['idpertanyaan']);
                                ?>
                                <tr>
                                    <th class="no">
                                        <?= $i; ?>
                                    </th>

                                    <?php
                                    $idindikator = $p['idindikator'];
                                    $kode_indikator = query("SELECT kode_indikator FROM ind_gejala WHERE idindikator = $idindikator")[0];
                                    ?>

                                    <td class="ind">
                                        <?= $kode_indikator['kode_indikator']; ?>
                                    </td>
                                    <td class="g">
                                        <?= $p['text_pertanyaan']; ?>
                                    </td>
                                    <td class="kg">
                                        <?= $p['kode_pertanyaan']; ?>
                                    </td>
                                    <td class="aksi">
                                        <a href="edit_pertanyaan.php?id=<?= $enkripsi; ?>"><i
                                                class="bi bi-pencil-fill"></i></a> | <button
                                            style="border: none; background: none;" id="deletePertanyaan"
                                            onclick="deletePertanyaan(<?= $p['idpertanyaan']; ?>)"><i
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