<?php
require_once 'controller_main.php';

// Fungsi Input Kriteria
function input_kriteria($data)
{
    global $conn;
    $kode = htmlspecialchars($data['kode_kriteria']);
    $kriteria = htmlspecialchars($data['nama_kriteria']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    if ($kriteria == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kriteria tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT nama_kriteria FROM kriteria WHERE nama_kriteria = '$kriteria'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Kriteria sudah ada, silahkan masukkan kriteria lain',
                            'error'
                        )
                    </script>";
            exit();
        }
    }

    if ($kode == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kode tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT kode_kriteria FROM kriteria WHERE kode_kriteria = '$kode'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Kode sudah ada, silahkan masukkan kode lain',
                            'error'
                        )
                    </script>";
            exit();
        }
    }

    if (strpos($kode, ' ') !== false) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kode tidak boleh mengandung spasi',
                        'error'
                    )
                </script>";
        exit();
    }

    $query = "INSERT INTO kriteria
              VALUES 
              (NULL, '$kode', '$kriteria', '$deskripsi')";


    // Menambahkan relasi ke tabel rel_kriteria antara kriteria baru dengan dirinya sendiri
    $relQuery = "INSERT INTO rel_kriteria (ID1, ID2, nilai) VALUES ('$kode', '$kode', 1)";
    mysqli_query($conn, $relQuery);

    // Menambahkan relasi ke tabel rel_kriteria antara kriteria baru dengan semua kriteria yang sudah ada
    $existingKriteriaQuery = "SELECT kode_kriteria FROM kriteria WHERE kode_kriteria <> '$kode'";
    $existingKriteriaResult = mysqli_query($conn, $existingKriteriaQuery);

    while ($row = mysqli_fetch_assoc($existingKriteriaResult)) {
        $existingKode = $row['kode_kriteria'];
        $relQueryExisting = "INSERT INTO rel_kriteria (ID1, ID2, nilai) VALUES ('$existingKode', '$kode', 1)";
        mysqli_query($conn, $relQueryExisting);

        $relQueryNew = "INSERT INTO rel_kriteria (ID1, ID2, nilai) VALUES ('$kode', '$existingKode', 1)";
        mysqli_query($conn, $relQueryNew);
    }


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function create_field($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama_kriteria']);
    $nama_kecil = strtolower($nama);

    mysqli_query($conn, "ALTER TABLE hasil ADD $nama_kecil DOUBLE");
}
// Fungsi Input Kriteria Selesai

// Fungsi Edit nilai kode kriteria
function edit_kode_kriteria($data)
{
    global $conn;

    $idKode1 = $data['kode1'];
    $idKode2 = $data['kode2'];
    $idNilai = $data['nilai'];

    $data_kode1 = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idKode1;")[0];
    $data_kode2 = query("SELECT kode_kriteria FROM kriteria WHERE idkriteria = $idKode2;")[0];

    $kode1 = $data_kode1['kode_kriteria'];
    $kode2 = $data_kode2['kode_kriteria'];

    if ($kode1 != $kode2) {
        $data_rel1 = query("SELECT * FROM rel_kriteria WHERE ID1 = '$kode1' AND ID2 = '$kode2'")[0];
        $nilai1 = $idNilai;
        $id_rel1 = $data_rel1['ID'];

        $query = "UPDATE rel_kriteria SET 
                        nilai = '$nilai1'
                    WHERE ID = '$id_rel1'
                    ";
        mysqli_query($conn, $query);

        $data_rel2 = query("SELECT * FROM rel_kriteria WHERE ID1 = '$kode2' AND ID2 = '$kode1'")[0];
        $nilai2 = 1 / $idNilai;
        $id_rel2 = $data_rel2['ID'];

        $query2 = "UPDATE rel_kriteria SET 
                        nilai = '$nilai2'
                    WHERE ID = '$id_rel2'
                    ";
        mysqli_query($conn, $query2);
    }

}


// Fungsi Edit Kriteria 

function update_field($data)
{
    global $conn;

    $oldnama = $data['oldkriteria'];
    $nama = htmlspecialchars($data['nama_kriteria']);
    $oldnama_kecil = strtolower($oldnama);
    $nama_kecil = strtolower($nama);

    if ($nama != $oldnama) {
        mysqli_query($conn, "ALTER TABLE hasil CHANGE $oldnama_kecil $nama_kecil DOUBLE");
    }
}

function edit_kriteria($data)
{
    global $conn;

    $idkriteria = $data['idkriteria'];
    $oldkriteria = $data['oldkriteria'];
    $oldkode = $data['oldkode'];
    $kriteria = htmlspecialchars($data['nama_kriteria']);
    $kode = htmlspecialchars($data['kode_kriteria']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    if ($kriteria != $oldkriteria) {
        if ($kriteria == "") {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'kriteria tidak boleh kosong',
                            'error'
                        )
                      </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT nama_kriteria FROM kriteria WHERE nama_kriteria = '$kriteria'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'kriteria sudah ada, silahkan pakai kriteria lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }
    }

    if ($kode != $oldkode) {
        if ($kode == "") {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Kode tidak boleh kosong',
                            'error'
                        )
                      </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT kode_kriteria FROM kriteria WHERE kode_kriteria = '$kode'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Kode sudah ada, silahkan pakai kode lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }

        if (strpos($kode, ' ') !== false) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Kode tidak boleh mengandung spasi',
                            'error'
                        )
                    </script>";
            exit();
        }
    }

    $query = "UPDATE kriteria SET 
                    kode_kriteria = '$kode',
                    nama_kriteria = '$kriteria',
                    deskripsi = '$deskripsi'
                  WHERE idkriteria = '$idkriteria'
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Kriteria 


// Fungsi Delete Kriteria
function delete($id)
{
    global $conn;
    $data = query("SELECT * FROM kriteria WHERE idkriteria = $id")[0];
    $kode = $data['nama_kriteria'];
    $kode_kecil = strtolower($kode);

    mysqli_query($conn, "ALTER TABLE hasil DROP COLUMN $kode_kecil");

    mysqli_query($conn, "DELETE FROM kriteria WHERE idkriteria = $id");
    mysqli_query($conn, "DELETE FROM rel_kriteria WHERE ID1 = $id or ID2 = $id");
    mysqli_query($conn, "DELETE FROM rel_indikator WHERE idkriteria = $id");

    $deleted = true;

    return $deleted;
}

// Mengecek apakah ada permintaan penghapusan data
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Mengambil nilai parameter id dari data POST
    $id = $_POST['id'];

    // Memanggil fungsi delete untuk menghapus data
    $status = delete($id);

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// Fungsi Delete Kriteria Selesai
?>