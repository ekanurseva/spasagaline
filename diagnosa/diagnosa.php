<?php
session_start();
require_once('../controller/controller_hasil.php');
validasi();

$id = dekripsi($_COOKIE['SPASAGALINENS']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$jumlah_pertanyaan = jumlah_data("SELECT * FROM pertanyaan");

$jumper1 = ceil($jumlah_pertanyaan / 2);
$jumper2 = $jumlah_pertanyaan - $jumper1;

$pertanyaan1 = query("SELECT * FROM pertanyaan LIMIT $jumper1");
$pertanyaan2 = query("SELECT * FROM pertanyaan LIMIT $jumper2 OFFSET $jumper1");

if (isset($_POST['submit_hitung'])) {
    if (hitung2($_POST) > 0) {
        echo "
            <script>
              document.location.href='../hasil/hasil.php';
            </script>
        ";
      } else {
        echo "
            <script>
              document.location.href='index.php';
            </script>
        ";
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
            require_once('../sidenav/sidebar_user.php');
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
                <h4 class="text-white text-center pb-3">DIAGNOSIS GEJALA KECANDUAN GAME ONLINE</h4>

                <div class="tabel text-white px-5 py-4">
                    <form method="post" action="">
                        <div class="row pb-2 d-flex justify-content-center">
                            <div class="col-12">
                                <input style="height: 30px;" type="text" name="anak" placeholder="Masukkan Nama Orang Yang Ingin Didiagnosis" id="nama" value=""
                                    class="form-control fw-medium text-center fs-5">
                            </div>
                        </div>
                        <p class="text-center py-3">Silahkan Jawab Pertanyaan Di Bawah Untuk Mendapatkan Hasil Diagnosis &
                            Solusi</p>
                        <div class="row">
                            <div class="col-6">
                                <?php
                                $i = 1;
                                foreach ($pertanyaan1 as $p1):
                                    ?>
                                    <h6 class="m-0 fw-medium">
                                        <?= $i; ?>.
                                        <?= $p1['text_pertanyaan']; ?>
                                    </h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            id="<?= 'iya_' . $p1['kode_pertanyaan']; ?>" name="<?= $p1['kode_pertanyaan']; ?>"
                                            required>
                                        <label class="form-check-label" for="<?= 'iya_' . $p1['kode_pertanyaan']; ?>">
                                            Iya
                                        </label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" value="0.5"
                                            id="<?= 'tidak_' . $p1['kode_pertanyaan']; ?>" name="<?= $p1['kode_pertanyaan']; ?>"
                                            required>
                                        <label class="form-check-label" for="<?= 'tidak_' . $p1['kode_pertanyaan']; ?>">
                                            Tidak
                                        </label>
                                    </div>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                            </div>
    
                            <div class="col-6">
                                <?php foreach ($pertanyaan2 as $p2):
                                    ?>
                                    <h6 class="m-0 fw-medium">
                                        <?= $i; ?>.
                                        <?= $p2['text_pertanyaan']; ?>
                                    </h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            id="<?= 'iya_' . $p2['kode_pertanyaan']; ?>" name="<?= $p2['kode_pertanyaan']; ?>"
                                            required>
                                        <label class="form-check-label" for="<?= 'iya_' . $p2['kode_pertanyaan']; ?>">
                                            Iya
                                        </label>
                                    </div>
                                    <div class="form-check  mb-4">
                                        <input class="form-check-input" type="radio" value="0.5"
                                            id="<?= 'tidak_' . $p2['kode_pertanyaan']; ?>" name="<?= $p2['kode_pertanyaan']; ?>"
                                            required>
                                        <label class="form-check-label" for="<?= 'tidak_' . $p2['kode_pertanyaan']; ?>">
                                            Tidak
                                        </label>
                                    </div>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                            </div>
                        </div>
    
                        <div class="submit text-center pt-4 btn-long">
                            <a href="../hasil/hasil.php" class="fw-medium text-decoration-none">
                                <button style="border: none; background: none; font-weight: 500;" type="submit"
                                    name="submit_hitung">SUBMIT</button>
                            </a>
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