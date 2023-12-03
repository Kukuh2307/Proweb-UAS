<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];
$deskripsi = $_POST['deskripsi'];


if (isset($_POST['update'])) {
    if ($id != '') {
        if ($deskripsi != '') { // apabila tidak kosong
            $newDeskripsi = mysqli_real_escape_string($koneksi, $deskripsi);

            // Update data
            $query = "UPDATE informasipengiriman SET deskripsi = '$newDeskripsi' WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);

        if (!$updateData) {
            $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
        }
        } else {

        }
    }
}



header("location:" . $url . "/admin/route-admin.php?msg=informasidanpengiriman");
