<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>SPASAGALINE</title>
</head>

<body>

</body>

</html>

<?php
session_start();
require_once 'controller/controller_main.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (!mysqli_fetch_assoc($result)) {
        $_SESSION["gagal"] = "Email tidak ditemukan";

        echo "
                <script>
                    document.location.href='login.php';
                </script>";
        exit();
    } else {
        $data = query("SELECT email FROM user WHERE email = '$email'")[0];

        $enkripsi_email = enkripsi($data['email']);
    }
} else {
    echo "<script>
                document.location.href='login.php';
              </script>";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'ekanursevas@gmail.com'; //SMTP username
    $mail->Password = 'rdulywwemwxvgajo'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('spasagaline@gmail.com', 'SPASAGALINE');
    $mail->addAddress($data['email']); //Add a recipient

    $gambarURL = 'https://ekanurseva.my.id/Logo-SPASAGALINE.png'; // Ganti dengan URL gambar yang sesuai

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Ubah Password Akun SPASAGALINE';
    $mail->Body = '<html>
    <body>
        <table width="100%" height="100%" style="min-width:348px; border: 0;" cellspasing="0" cellpadding="0" lang="en">
            <tbody>
                <tr height="15" style="height:15px;">
                    <td></td>
                </tr>
                <tr align="center">
                    <td>
                        <div>
                            <div></div>
                        </div>
                        <table style="padding-bottom:20px; max-width:516px; min-width:220px;">
                            <tbody>
                                <tr>
                                    <td style="width:8px"></td>
                                    <td style="text-align: center; border-style:solid; border-width:thin; border-color:#dadce0; border-radius:8px;padding:40px 20px;">
                                        <img src="' . $gambarURL . '" style="width: 40px; height: 40px;" alt="logo SPASAGALINE">
                                        <div>
                                            <h2 class="text-center">Ubah Password Akun SPASAGALINE Anda</h2>
                                        </div>
                                        <hr>
                                        <div>
                                            <p style="text-align: justify;">Klik tombol di bawah <br> Anda akan diarahkan pada halaman ubah password, agar dapat login akun SPASAGALINE dengan password baru</p>
                                            <div style="padding-top:15px; text-align:center;">
                                                <a href="http://localhost/spasagaline/ubah_password.php?key=' . $enkripsi_email . '"
                                                    class="justify-content-center"
                                                    style="display: inline-block; font-weight: bold; background-color: rgb(121, 134, 199, 0.4); color: #272247; padding: 10px 20px; text-decoration: none; border-radius: 8px; border: 0.7px solid #272247;">Ubah
                                                    Password</a>
                                            </div>
                                            <div
                                                style="padding-top:45px; font-size:12px; line-height:16px; color:#5f6368; letter-spacing:0.3px; text-align:center">
                                                Copyright © 2023 Create By Eka Nurseva Saniyah
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr height="15" style="height:15px;">
                    <td></td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION["berhasil"] = "Berhasil kirim email, silahkan check email " . $data['email'];

    echo "
            <script>
                document.location.href='login.php';
            </script>
        ";
} catch (Exception $e) {
    $_SESSION["gagal"] = "Email gagal dikirim";

    echo "
            <script>
                document.location.href='login.php';
            </script>
        ";
}

?>