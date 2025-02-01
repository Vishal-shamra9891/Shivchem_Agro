<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();
session_destroy();
setcookie("user_email", "", time() - 3600, "/", "", true, true); // Secure and HttpOnly
header("Location: login.php");
exit();
?>