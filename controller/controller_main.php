<?php
// koneksi ke database mysql
$conn = mysqli_connect("localhost:8111", "root", "", "spasagaline");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan error
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}

// Fungsi query fetch
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Fungsi query fetch selesai

// Fungsi jumlah data dari query yang terbaca
function jumlah_data($data)
{
    global $conn;
    $query = mysqli_query($conn, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}
// Fungsi jumlah data selesai


function generateRandomKey()
{
    $keyLength = 32;
    $randomBytes = openssl_random_pseudo_bytes($keyLength, $strong);

    if (!$strong) {
        // Jika openssl_random_pseudo_bytes() tidak menghasilkan kunci yang kuat, Anda bisa menggunakan alternatif lain.
        $randomBytes = random_bytes($keyLength);
    }

    return base64_encode($randomBytes);
}

function enkripsi($kata)
{
    $key = generateRandomKey();
    $string = openssl_encrypt($kata, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    $hasilEnkripsi = base64_encode($key . $string);

    return $hasilEnkripsi;
}

function dekripsi($kata)
{
    $string = base64_decode($kata);
    $key = substr($string, 0, 44); // Panjang kunci enkripsi adalah 44 (dalam base64)
    $enkripsi = substr($string, 44);
    $hasil = openssl_decrypt($enkripsi, 'AES-256-CBC', $key, 0, substr($key, 0, 16));

    return $hasil;
}
?>