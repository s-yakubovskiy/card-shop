<?php
session_start();
$_SESSION['logged_in_user'] = '';
$_SESSION['logged_in_user_id'] = '';
$_SESSION['logged_in_user_isadmin'] = 0;
header("Location: ../../index.php");
?>
