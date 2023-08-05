<?php
require_once 'controller_main.php';

// Fungsi login
function login($data)
{
    global $conn;

    $username = $data["username"];
    $password = $data["password"];

    //cek username apakah ada di database atau tidak
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
        //parameternya yaitu string yang belum diacak dan string yang sudah diacak
        if (password_verify($password, $row["password"])) {
            $enkripsi = enkripsi($row['iduser']);

            setcookie('SPASAGALINENS', $enkripsi, time() + 10800);
            echo "<script>
                    document.location.href='pengguna/index.php';
                </script>";
            exit;
        }
    }

    $error = true;

    return $error;
}
// Fungsi login selesai

// Fungsi update password
function update_password($data)
{
    global $conn;

    $iduser = $data['iduser'];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password == "") {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Password tidak boleh kosong',
                    'error'
                )
              </script>";
        exit();
    } elseif ($password2 == "") {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Silahkan isi konfirmasi password',
                    'error'
                )
              </script>";
        exit();
    }


    if ($password !== $password2) {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Password tidak sesuai',
                    'error'
                )
              </script>";
        exit();
    }

    $password = password_hash($password2, PASSWORD_DEFAULT);

    $query = "UPDATE user SET 
                password = '$password'
              WHERE iduser = '$iduser'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi update password selesai

// Fungsi Delete Akun
function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE iduser = $id");

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
// Fungsi Delete Akun selesai

// Fungsi Upload Foto
function uploadFoto()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah ada gambar yang diupload atau tidak
    if ($namaFile != "") {
        //cek apakah yang di upload gambar atau bukan
        $validFoto = ['jpg', 'jpeg', 'png'];
        $kesesuaianFoto = explode('.', $namaFile);
        $kesesuaianFoto = strtolower(end($kesesuaianFoto));

        //cek apakah ekstensinya ada atau tidak di dalam array $validFoto
        if (!in_array($kesesuaianFoto, $validFoto)) {
            echo "<script>
                    alert('Periksa Kembali File yang Anda Upload');
                    </script>";
            return false;
        }
    }


    //cek jika ukurannya terlalu besar, ukurannya dalam byte
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, jangan melebihi 5mb');
                </script>";
        return false;
    }

    //generate nama gambar baru
    if ($namaFile != "") {
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $kesesuaianFoto;
        //parameternya file namenya, lalu tujuannya
        move_uploaded_file($tmpName, '../profil/' . $namaFileBaru);

        return $namaFileBaru;
    } else {
        $namaFileBaru = "";

        return $namaFileBaru;
    }
}
// Fungsi Upload Foto Selesai


// Fungsi Registrasi User
function register_user($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $foto = uploadFoto();
    if ($foto == "") {
        $foto = "default.png";
    }
    $level = "User";

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username sudah digunakan, silahkan pakai username lain',
                        'error'
                    )
                </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password tidak sesuai',
                        'error'
                    )
                </script>";
        exit();
    }


    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$nama', '$username', '$password', '$email', '$foto', '$level')");
    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi User Selesai

// Fungsi Registrasi Admin
function register_admin($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $foto = uploadFoto();
    if ($foto == "") {
        $foto = "default.png";
    }
    $level = "Admin";

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username sudah digunakan, silahkan pakai username lain',
                        'error'
                    )
                </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password tidak sesuai',
                        'error'
                    )
                </script>";
        exit();
    }


    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$nama', '$username', '$password', '$email', '$foto', '$level')");
    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi Admin selesai

// Fungsi Edit Data Pengguna
function update($data)
{
    global $conn;
    $iduser = $data['iduser'];
    $oldpassword = $data['oldpassword'];
    $oldusername = $data['oldusername'];
    $oldemail = $data['oldemail'];
    $oldfoto = $data['oldfoto'];

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $foto = uploadFoto();
    if ($foto == "") {
        $foto = $oldfoto;
    }
    $level = "Admin";

    if (isset($data['oldlevel'])) {
        $level = $data['oldlevel'];
    } else {
        $level = $data['level'];
    }


    if ($username !== $oldusername) {
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username sudah digunakan, silahkan pakai username lain',
                        'error'
                    )
                  </script>";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password tidak sesuai',
                        'error'
                    )
                  </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Email sudah digunakan, silahkan pakai email lain',
                        'error'
                    )
                  </script>";
            exit();
        }
    }

    if ($foto != $oldfoto && $oldfoto != "default.png") {
        unlink("../profil/$oldfoto");
    }

    $query = "UPDATE user SET 
                nama = '$nama',
                username = '$username',
                password = '$password',
                email = '$email',
                foto = '$foto',
                level = '$level'
              WHERE iduser = $iduser
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Data Pengguna Selesai

// Fungsi Edit Profil Pengguna
function update_profil($data)
{
    global $conn;
    $iduser = $data['iduser'];
    $oldpassword = $data['oldpassword'];
    $oldusername = $data['oldusername'];
    $oldemail = $data['oldemail'];
    $oldfoto = $data['oldfoto'];
    $oldlevel = $data['oldlevel'];

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $foto = uploadFoto();
    if ($foto == "") {
        $foto = $oldfoto;
    }

    if (isset($data['level'])) {
        $level = $data['level'];
    } else {
        $level = $oldlevel;
    }


    if ($username !== $oldusername) {
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username sudah digunakan, silahkan pakai username lain',
                        'error'
                    )
                  </script>";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password tidak sesuai',
                        'error'
                    )
                  </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Email sudah digunakan, silahkan pakai email lain',
                        'error'
                    )
                  </script>";
            exit();
        }
    }

    if ($foto != $oldfoto && $oldfoto != "default.png") {
        unlink("../profil/$oldfoto");
    }

    $query = "UPDATE user SET 
                nama = '$nama',
                username = '$username',
                password = '$password',
                email = '$email',
                foto = '$foto',
                level = '$level'
              WHERE iduser = $iduser
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Profil Pengguna Selesai
?>