<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];
$deskripsi = $_POST['deskripsi'];

if (isset($_POST['update'])) {
    if ($id != '') {
        if ($deskripsi != '') {
            // Melindungi variabel $deskripsi
            $newDeskripsi = mysqli_real_escape_string($koneksi, $deskripsi);

            // Update data
            $query = "UPDATE kebijakanpribadi SET deskripsi = '$newDeskripsi' WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
            }
        }
    }
}

header("location:" . $url . "/admin/route-admin.php?msg=kebijakanpribadi");
?>
