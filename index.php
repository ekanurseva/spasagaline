<?php
include("controller/controller_user.php");

if (!isset($_COOKIE['SPASAGALINENS'])) {
    echo "<script>
                document.location.href='login.php';
              </script>";
    exit;
} else {
    echo "<script>
                document.location.href='logout.php';
              </script>";
    exit;
}
?>