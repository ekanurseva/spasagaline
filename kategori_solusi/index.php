<?php
session_start();
require_once('../controller/controller_kategori.php');
require_once('../controller/controller_solusi.php');

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

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
                <h4 class="text-white text-center pb-3">MANAJEMEN SOLUSI</h4>
                <div class="row px-3">
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

                <!-- table solusi -->
                <h5 class="jdl mt-4">Table Solusi</h5>
                <div class="tabel">
                    <table id="example" class="table table-hover text-center">
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
                            $j = 1;
                            foreach ($solusi as $s):
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
                                    <td class="sol text-start">
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
    <script>
        function deleteSolusi(id) {
            // Menampilkan Sweet Alert dengan tombol Yes dan No
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
                    $.ajax({
                        url: "../controller/controller_solusi.php",
                        type: "POST",
                        data: {
                            action: "delete",
                            id: id,
                        },
                        success: function (_response) {
                            // Menampilkan pesan sukses jika data berhasil dihapus
                            Swal.fire({
                                icon: "success",
                                title: "Data Solusi Berhasil Dihapus!",
                                confirmButtonText: "Ok",
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    document.location.href = "index.php";
                                }
                            });
                        },
                        error: function (_xhr, _status, error) {
                            // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan dalam menghapus data: " + error,
                                icon: "error",
                            });
                        },
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Menampilkan pesan jika tombol No diklik
                    Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
                }
            });
        }
    </script>
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