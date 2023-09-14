<?php
session_start();
require_once('../controller/controller_hasil.php');
validasi();

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$data_hasil = query("SELECT * FROM hasil");

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
        // Cek peran pengguna dan masukkan file sidebar yang sesuai
        if ($user['level'] === "User") {
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
            <div class="contents px-4 py-3">
                <h4 class="text-white text-center pb-3">RIWAYAT HASIL DIAGNOSIS</h4>
                <div class="px-3">
                    <div class="tabel">
                        <table id="example" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">HASIL</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data_hasil as $h):
                                    $enkripsi_hasil = enkripsi($h['idhasil']);
                                    $iduser = $h['iduser'];
                                    $waktu = strftime('%H:%M:%S | %d %B %Y', strtotime($h['tanggal']));
                                    $nama = query("SELECT nama FROM user WHERE iduser = $iduser")[0];
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i; ?>
                                        </th>
                                        <td>
                                            <?= $nama['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $waktu; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $nama_kategori = $h['hsl_kategori'];
                                            $kategori = query("SELECT nama_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'")[0];
                                            ?>
                                            Kecanduan
                                            <?= $kategori['nama_kategori']; ?>
                                        </td>
                                        <td>
                                            <a class="detail" href="../hasil?idhasil=<?= $enkripsi_hasil ?>">
                                                DETAIL
                                            </a>
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