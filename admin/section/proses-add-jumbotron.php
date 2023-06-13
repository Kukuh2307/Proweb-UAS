<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tombol = $_POST['tombol'];
$foto = $_FILES['image'];

// cek foto
if ($foto['name'] != '') {
    $foto = handleImageUpload($foto);
} else {
    $foto = 'default.png';
}

if (isset($_POST['simpan'])) {
    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO jumbotron(foto, heading1, heading2, tombol) VALUES ('$foto', '$judul', '$deskripsi','$tombol')");
    if (!$insertData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data jumbotron berhasil ditambahkan.";
    }
} elseif(isset($_POST['update'])){
    if($id != ''){
    // update data
    $updateData = mysqli_query($koneksi, "UPDATE jumbotron SET 
    foto='$foto',
    heading1='$judul',
    heading2='$deskripsi',
    tombol='$tombol'
    WHERE id='$id'
    ");
    if (!$updateData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
    }
    }
}

header("location:".$url."/admin/route-admin.php?msg=jumbotron");
?>
