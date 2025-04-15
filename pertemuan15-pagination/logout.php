<?php

//hapus session
session_start();
$_SESSION["login"] = false;
session_unset();
session_destroy();

//hapus cookie
setcookie("id", "", time() - 3600);
setcookie("key", "", time() - 3600);

//kembali ke halaman login
header("Location: login.php");
exit;

    
?>