<?php
session_start();
require_once('../controller/controller_kategori.php');
require_once('../controller/controller_solusi.php');

$jumlah_kategori = jumlah_data("SELECT * FROM kategori");
$kategori = query("SELECT * FROM kategori");

$jumlah_solusi = jumlah_data("SELECT * FROM solusi");
$solusi = query("SELECT * FROM solusi");

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
                <h4 class="text-white text-center pb-3">MANAJEMEN KATEGORI & SOLUSI</h4>
                <div class="row px-3">
                    <div class="card me-5">
                        <div class="card-body">
                            <a href="input_kategori.php" class="fw-medium">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Kategori</span>
                            </a>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_kategori; ?>
                            </p>
                            <i class="icon bi bi-file-medical-fill"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="input_solusi.php" class="fw-medium">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Solusi</span>
                            </a>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_solusi; ?>
                            </p>
                            <i class="icon bi bi-file-text-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- table Kategori -->
                <h5 class="jdl mt-4">Table Kategori</h5>
                <div class="tabel mb-4">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">KATEGORI</th>
                                <th scope="col">BOBOT</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($kategori as $k):
                                $enkripsi = enkripsi($k['idkategori']);
                                ?>
                                <tr>
                                    <th>
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $k['nama_kategori']; ?>
                                    </td>
                                    <td>
                                        <?= $k['range_atas']; ?> -
                                        <?= $k['range_bawah']; ?>
                                    </td>
                                    <td>
                                        <a href="edit_kategori.php?id=<?= $enkripsi; ?>"><i
                                                class="bi bi-pencil-fill"></i></a> | <button
                                            style="border: none; background: none;" id="deleteKategori"
                                            onclick="deleteKategori(<?= $k['idkategori']; ?>)"><i
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

                <!-- table solusi -->
                <h5 class="jdl">Table Solusi</h5>
                <div class="tabel">
                    <table id="example2" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">KATEGORI</th>
                                <th scope="col">SOLUSI</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 1; foreach ($solusi as $s):
                                $enkripsi = enkripsi($s['idsolusi']);
                                ?>
                                <tr>
                                    <th class="no">
                                        <?= $j; ?>
                                    </th>

                                    <?php
                                    $idkategori = $s['idkategori'];
                                    $ktg = query("SELECT * FROM kategori WHERE idkategori = $idkategori")[0];
                                    ?>
                                    <td class="ind">
                                        <?= $ktg['nama_kategori']; ?>
                                    </td>
                                    <td class="sol">
                                        <?= $s['nama_solusi']; ?>
                                    </td>
                                    <td class="aksi">
                                        <a href="edit_solusi.php?id=<?= $enkripsi; ?>"><i class="bi bi-pencil-fill"></i></a>
                                        | <button style="border: none; background: none;" id="deleteSolusi"
                                            onclick="deleteSolusi(<?= $s['idsolusi']; ?>)"><i
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