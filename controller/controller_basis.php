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
                            'Kriteria sudah ada, silahkan pakai kriteria lain',
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

    $query = "INSERT INTO kriteria
                    VALUES 
                    (NULL, '$kode', '$kriteria', '$deskripsi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
// Fungsi Input Kriteria Selesai

// Fungsi Edit Kriteria 
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
function delete_kriteria($id)
{
    global $conn;
    $data = query("SELECT * FROM kriteria WHERE idkriteria = $id")[0];
    $kode = $data['kode'];
    $kode_kecil = strtolower($kode);

    mysqli_query($conn, "ALTER TABLE hasil DROP COLUMN $kode_kecil");
    mysqli_query($conn, "DELETE FROM kriteria WHERE idkriteria = $id");

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

// Fungsi Input Kriteria
// function input_indikator($data)
// {
//     global $conn;
//     $kode = htmlspecialchars($data['kode_kriteria']);
//     $kriteria = htmlspecialchars($data['nama_kriteria']);
//     $deskripsi = htmlspecialchars($data['deskripsi']);

//     if ($kriteria == "") {
//         echo "<script>
//                     Swal.fire(
//                         'Gagal!',
//                         'Kriteria tidak boleh kosong',
//                         'error'
//                     )
//                   </script>";
//         exit();
//     } else {
//         $result = mysqli_query($conn, "SELECT nama_kriteria FROM kriteria WHERE nama_kriteria = '$kriteria'") or die(mysqli_error($conn));
//         if (mysqli_fetch_assoc($result)) {
//             echo "<script>
//                         Swal.fire(
//                             'Gagal!',
//                             'Kriteria sudah ada, silahkan pakai kriteria lain',
//                             'error'
//                         )
//                     </script>";
//             exit();
//         }
//     }

//     if ($kode == "") {
//         echo "<script>
//                     Swal.fire(
//                         'Gagal!',
//                         'Kode tidak boleh kosong',
//                         'error'
//                     )
//                   </script>";
//         exit();
//     } else {
//         $result = mysqli_query($conn, "SELECT kode_kriteria FROM kriteria WHERE kode_kriteria = '$kode'") or die(mysqli_error($conn));
//         if (mysqli_fetch_assoc($result)) {
//             echo "<script>
//                         Swal.fire(
//                             'Gagal!',
//                             'Kode sudah ada, silahkan pakai kode lain',
//                             'error'
//                         )
//                     </script>";
//             exit();
//         }
//     }


//     if (strpos($kode, ' ') !== false) {
//         echo "<script>
//                     Swal.fire(
//                         'Gagal!',
//                         'Kode tidak boleh mengandung spasi',
//                         'error'
//                     )
//                 </script>";
//         exit();
//     }

//     $query = "INSERT INTO kriteria
//                     VALUES 
//                     (NULL, '$kode', '$kriteria', '$deskripsi')";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);

// }
// Fungsi Input Kriteria Selesai
?>