<div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-3 d-flex">
        <img src="../img/Logo.png" alt="spasagaline">
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
        <a href="../pengguna/profil.php"><button class="rounded-circle"><i class="bi bi-pencil-fill"></i></button></a>
        <h1>
            <?= $user['nama']; ?>
        </h1>
    </div>
    <!--PROFIL SELESAI-->

    <!-- menu -->
    <ul class="list-unstyled pt-2 fw-medium">
        <li class="">
            <a type="button" class="text-decoration-none d-block text-center" data-bs-toggle="modal"
                data-bs-target="#deteksi">Mulai Deteksi</a>
        </li>
        <li class="">
            <a href="../pengguna" class="text-decoration-none d-block">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="">
            <a href="../riwayat" class="text-decoration-none d-block">
                <i class="bi bi-card-list"></i>
                <span>Riwayat Diagnosa</span>
            </a>
        </li>
        <li class="">
            <a href="../manajemen_pengguna" class="text-decoration-none d-block">
                <i class="bi bi-people"></i>
                <span>Manajemen Pengguna</span>
            </a>
        </li>
        <li class="">
            <a href="../basis" class="text-decoration-none d-block">
                <i class="bi bi-journals"></i>
                <span>Basis Pengetahuan</span>
            </a>
        </li>
        <li class="">
            <a href="../pertanyaan" class="text-decoration-none d-block">
                <i class="bi bi-files-alt"></i>
                <span>Manajemen Pertanyaan</span>
            </a>
        </li>
        <li class="">
            <a href="../kategori_solusi" class="text-decoration-none d-block">
                <i class="bi bi-files"></i>
                <span>Manajemen Solusi</span>
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
<div class="side-deteksi">
    <!-- Modal Deteksi -->
    <div class="modal fade" id="deteksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Diagnosis Gejala
                        Kecanduan
                        Game Online
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <div class="mb-2 text-start">
                        <label for="email" class="form-label fw-medium text-dark">Mulai Deteksi
                            Untuk:</label>
                    </div>
                    <div class="mb-3 text-start">
                        <a href="../diagnosa/diagnosa.php"
                            style="text-decoration: none; color: black;  border: solid #978fcc; border-radius: 8px; padding-top: 5px; padding-bottom: 5px; background: rgb(121, 134, 199, 0.4);  padding-right: 200px; padding-left: 20px;">Anak/Siswa</a>
                    </div>
                    <div class="mb-3 text-start">
                        <a href="../diagnosa"
                            style="text-decoration: none; color: black; border: solid #978fcc; border-radius: 8px;background: rgb(121, 134, 199, 0.4); padding-top: 5px; padding-bottom: 5px; padding-right: 206px; padding-left: 20px;">Diri
                            Sendiri</a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Deteksi Selesai -->
</div>