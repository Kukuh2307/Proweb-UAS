<?php
require_once("../../config.php");
session_start();
 
$nama = $_POST['nama'];   
$deskripsi = $_POST['deskripsi'];


// escaping
$deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);

if (isset($_POST['simpan'])) {

    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO kategori(nama,deskripsi) VALUES ('$nama','$deskripsi')");
    if (!$insertData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data kategori berhasil ditambahkan.";
    }
}

header("location:".$url."/admin/route-admin.php?msg=daftar-kategori-barang");
?>
