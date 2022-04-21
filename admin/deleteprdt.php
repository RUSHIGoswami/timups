<?php
include '../config/constants.php';
session_start();
if ($_SESSION['loginCheck'] != true) {
    header('Location: adminlogin.php');
}
if (isset($_GET['name'])) {
    $wname = $_GET['name'];
    $delete = "DELETE FROM `watches` WHERE wname='$wname'";
    $result = mysqli_query($conn, $delete);
    if ($result) {
        header('Location: products.php');
    }
} else {
    echo "Didn't get the Product name";
}
