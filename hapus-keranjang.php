<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

$hapusData = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id = '$id'");
if (!$hapusData) {
    $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
} else {
    // $_SESSION['msg'] = "Data keranjang berhasil dihapus.";
    $alert = 'deletefromkeranjang';
    $redirectUrl = $url . "/proses-support.php?msg=keranjang&alert=$alert";

    header("location: " . $redirectUrl);
    exit;
}
