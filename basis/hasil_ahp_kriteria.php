<?php
session_start();
require_once '../controller/controller_kriteria.php';

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$rel_krit = query("SELECT * FROM kriteria");

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
                <h4 class="text-white text-center">HASIL ANALISIS KRITERIA UNTUK CF PAKAR</h4>

                <div class="text-white px-5 py-4">
                    <div class="panel-body">
                        <form class="mb-0" method="post" action="">
                            <input type="hidden" name="kriteria" value="rel_kriteria">
                        </form>

                        <div class="mb-4 d-flex justify-content-end">
                            <div style="font-size: 13px;">
                                <a href="index.php" style="padding: 6px 10px;"
                                    class="back fw-medium text-decoration-none">
                                    KEMBALI
                                </a>
                            </div>
                        </div>
                        <div class="tabel">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            &nbsp;
                                        </th>
                                        <?php foreach ($rel_krit as $dain): ?>
                                            <th scope="col">
                                                <?= $dain['kode_kriteria']; ?>
                                            </th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalRows = count($rel_krit);
                                    $totalColumns = array(); // Inisialisasi array untuk menyimpan total kolom
                                    
                                    foreach ($rel_krit as $indi) {
                                        $indi_kode1 = $indi['kode_kriteria'];
                                        echo '<tr>';
                                        echo '<th>' . $indi['kode_kriteria'] . '</th>';

                                        foreach ($rel_krit as $kator) {
                                            $indi_kode2 = $kator['kode_kriteria'];
                                            $data_rel = query("SELECT nilai FROM rel_kriteria WHERE ID1 = '$indi_kode1' AND ID2 = '$indi_kode2'")[0];
                                            $nilai_rel = round($data_rel['nilai'], 3);

                                            if (!isset($totalColumns[$indi_kode2])) {
                                                $totalColumns[$indi_kode2] = 0;
                                            }
                                            $totalColumns[$indi_kode2] += $nilai_rel; // Tambahkan nilai ke total kolom
                                    
                                            echo '<td class="fw-medium">' . $nilai_rel . '</td>';
                                        }

                                        echo '</tr>';
                                    }
                                    ?>
                                    <tr>
                                        <td class="fw-medium">Total</td>
                                        <?php foreach ($rel_krit as $kator): ?>
                                            <td class="fw-medium">
                                                <?php
                                                $indi_kode2 = $kator['kode_kriteria'];
                                                echo $totalColumns[$indi_kode2];
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tabel mt-4">
                            <table class="table table-hover">
                                <thead class="p-2">
                                    <tr>
                                        <th scope="col">
                                            &nbsp;
                                        </th>
                                        <?php foreach ($rel_krit as $dain): ?>
                                            <th scope="col">
                                                <?= $dain['kode_kriteria']; ?>
                                            </th>
                                        <?php endforeach; ?>
                                        <th>CF Pakar</th>
                                    </tr>
                                </thead>
                                <tbody class="p-2">
                                    <?php
                                    $totalRows = count($rel_krit); foreach ($rel_krit as $indi) {
                                        $indi_kode1 = $indi['kode_kriteria'];
                                        $idkriteria = $indi['idkriteria'];
                                        echo '<tr>';
                                        echo '<th>' . $indi['kode_kriteria'] . '</th>';

                                        // Cari kode_indikator yang memiliki relasi dengan idkriteria (ind_kode1)
                                    
                                        $totalNormalisasi = 0; // Inisialisasi total normalisasi untuk kolom ini
                                    
                                        foreach ($rel_krit as $kator) {
                                            $indi_kode2 = $kator['kode_kriteria'];
                                            $data_rel = query("SELECT nilai FROM rel_kriteria WHERE ID1 = '$indi_kode1' AND ID2 = '$indi_kode2'")[0];
                                            $nilai_rel = round($data_rel['nilai'], 3);

                                            // Hitung nilai normalisasi dengan membagi nilai_rel dengan total kolom
                                            $nilai_normalisasi = $nilai_rel / $totalColumns[$indi_kode2];
                                            $totalNormalisasi += $nilai_normalisasi;

                                            echo '<td class="fw-medium">' . round($nilai_normalisasi, 3) . '</td>';
                                        }
                                        $totalNormalisasiKolom = $totalNormalisasi / $totalRows;
                                        // Tampilkan total normalisasi untuk kolom ini
                                        echo '<td class="fw-medium">' . round($totalNormalisasiKolom, 3) . '</td>';
                                        echo '</tr>';

                                        $updateQuery = "UPDATE ind_gejala SET cf_pakar = $totalNormalisasiKolom WHERE idkriteria = $idkriteria";
                                        mysqli_query($conn, $updateQuery);
                                    }
                                    ?>
                                </tbody>
                            </table>
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