<?php
session_start();
session_destroy();
setcookie("user", "", time() - 100, "/");
setcookie("forgotEmail", "", time() - 100, "/");

header("Location: ../view/login.php");
exit();
?>