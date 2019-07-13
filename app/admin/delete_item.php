<?php
session_start();
if (!isset($_SESSION['logged_in_user_isadmin']) or $_SESSION['logged_in_user_isadmin'] === '') {
    header("Location: ../../index.php");
    exit();
}

$link = mysqli_connect("localhost", "solopa", "q1w2e3r4", "eshop");
if (mysqli_connect_errno()) {
    echo "Connect failed: %s\n", mysqli_connect_error();
    exit();
}
$id = $_GET['item_id'];
if ($result = mysqli_query($link, "DELETE FROM items WHERE item_id=$id")) {
    header("Location: ../../index.php");
    exit();    
}
?>
