<div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-3 d-flex">
        <img src="../img/Logo.png" alt="logo spasagaline">
        <span class="fs-5 fw-bold text-white" style="margin-top: 1.6px;">SPASAGALINE</span>

        <!-- button sidebar -->
        <button id="btnside" class="btn px-0 py-0 text-white btn-open">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </button>
        <!-- button sidebar selesai -->
    </div>

    <!--PROFIL-->
    <div class="profil">
        <img src="../profil/<?= $user['foto']; ?>" class="rounded-circle" alt="profi">
        <a href="../pengguna/profil.php"><button class="rounded-circle"><i class="bi bi-pencil-fill"></i></button></a>;

        <h1>
            <?= $user['nama']; ?>
        </h1>
    </div>
    <!--PROFIL SELESAI-->

    <!-- menu -->
    <ul class="list-unstyled pt-2 fw-medium">
        <li class="">
            <?php
            if ($user['level'] === "User") {
                echo '<a href="../diagnosa" class="text-decoration-none d-block text-center">
                        <i class="bi bi-controller"></i>
                        <span>Mulai Deteksi</span>
                      </a>';
            } else {
                echo '<a href="../diagnosa/diagnosa.php" class="text-decoration-none d-block text-center">
                        <i class="bi bi-controller"></i>
                        <span>Mulai Deteksi</span>
                      </a>';
            }
            ?>
        </li>
        <li class="">
            <a href="../pengguna" class="text-decoration-none d-block">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="">
            <a href="../riwayat/riwayat.php" class="text-decoration-none d-block">
                <i class="bi bi-card-list"></i>
                <span>Riwayat Diagnosa</span>
            </a>
        </li>
        <li class="">
            <a href="../about" class="text-decoration-none d-block">
                <i class="bi bi-question-square"></i>
                <span>About</span>
            </a>
        </li>
    </ul>
    <hr class="hr-color">

    <ul class="list-unstyled fw-medium">
        <li>
            <a href="../logout.php" class="text-decoration-none d-block">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>