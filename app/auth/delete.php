<?php
session_start();

if (!isset($_SESSION['logged_in_user']) or $_SESSION['logged_in_user'] === '') {
    header("Location: ../../index.php");
    exit();
}

$userid_to_del = $_SESSION['logged_in_user_id'];

$link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
    if (mysqli_connect_errno()) {
        echo "Connect failed: %s\n", mysqli_connect_error();
        exit();
    }
if ($result = mysqli_query($link, "UPDATE users SET isactive=0 where user_id=$userid_to_del")) {
    mysqli_close($link);
    $_SESSION['logged_in_user'] = '';
    $_SESSION['logged_in_user_id'] = '';
    header("Location: ../../index.php");
    exit();
}
?>
