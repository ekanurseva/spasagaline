<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h4 class="text-white text-center pb-3">MANAJEMEN BASIS PENGETAHUAN</h4>

                <!-- card -->
                <div class="row px-3">
                    <div class="card me-5">
                        <div class="card-body">
                            <a href="input-kriteria.php" class="fw-medium">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Kriteria</span>
                            </a>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">1</p>
                            <i class="icon bi bi-file-medical-fill"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="input-indikator.php" class="fw-medium">
                                <i class="bi bi-plus-square"></i>
                                <span>Input Indokator</span>
                            </a>
                            <h6 class="card-subtitle">Jumlah</h6>
                            <p class="card-text fw-bold">1</p>
                            <i class="icon bi bi-file-text-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- button ahp -->
                <div class="btn-ahp">
                    <div href="#" class="ahp fw-medium">
                        <a style="padding: 7px 15px;"><i class="bi bi-table"></i>Analisis Hierarki
                            Kriteria</a>
                    </div>
                    <div href="#" class="ahp fw-medium mt-3">
                        <a><i class="bi bi-table"></i>Analisis Hierarki Indikator</a>
                    </div>
                </div>

                <form class="d-flex mt-4" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <!-- table Kriteria -->
                <h5 class="jdl">Table Kriteria</h5>
                <div class="tabel mb-4">
                    <table class="table table-hover text-center">
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
                            <tr>
                                <th class="no" scope="row">1</th>
                                <td class="ind">Salience</td>
                                <td class="g">suatu kondisi di mana bermain game menjadi kegiatan utama yang paling
                                    penting bagi seseorang, sehingga menguasai pikiran (ketergantungan), perasaan
                                    (keinginan yang kuat), dan perilaku (penggunaan yang berlebihan)</td>
                                <td class="kg">S</td>
                                <td class="aksi">
                                    <a href="edit-kriteria.php"><i class="bi bi-pencil-fill"></i></a> | <a href="#"><i
                                            class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="garis">

                <!-- table indokator gejala -->
                <h5 class="jdl">Table Indokator Gejala</h5>
                <div class="tabel">
                    <table class="table table-hover text-center">
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
                            <tr>
                                <th class="no" scope="row">1</th>
                                <td class="ind">S</td>
                                <td class="g">suatu kondisi di mana bermain game menjadi kegiatan utama yang paling
                                    penting bagi seseorang, sehingga menguasai pikiran (ketergantungan), perasaan
                                    (keinginan yang kuat), dan perilaku (penggunaan yang berlebihan)</td>
                                <td class="kg">I1</td>
                                <td class="aksi">
                                    <a href="edit-indikator.php"><i class="bi bi-pencil-fill"></i></a> | <a href="#"><i
                                            class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
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
    <script src="../script.js"></script>
</body>

</html>