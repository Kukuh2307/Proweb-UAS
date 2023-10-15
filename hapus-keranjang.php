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
    $_SESSION['msg'] = "Data keranjang berhasil dihapus.";
}

// Define the URL path or use $_SERVER['HTTP_REFERER'] for the previous page
$redirectUrl = $url . "/proses-support.php?msg=keranjang";

header("location: " . $redirectUrl);
exit;
?>
