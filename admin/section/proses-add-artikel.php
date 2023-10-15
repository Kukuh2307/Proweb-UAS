<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];   
$judul = $_POST['judul'];   
$tumbnail = $_POST['tumbnail'];
$penulis = $_POST['penulis'];
$isi = $_POST['isi'];
$foto = $_FILES['image'];

// cek foto
if ($foto['name'] != '') {
    $foto = handleImageUpload($foto);
} else {
    $foto = 'default.png';
}

if (isset($_POST['simpan'])) {

    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO blog(foto,judul,tumbnail,penulis,isi) VALUES ('$foto','$judul','$tumbnail','$penulis','$isi')");
    if (!$insertData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data jumbotron berhasil ditambahkan.";
    }
} elseif (isset($_POST['update'])) {
    if ($id != '') {
        // update data
        $updateData = mysqli_query($koneksi, "UPDATE blog SET 
        foto='$foto',
        judul='$judul',
        tumbnail='$tumbnail',
        penulis='$penulis',
        isi='$isi'
        WHERE id='$id'
        ");
        if (!$updateData) {
            $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
        }
    }
}

header("location:".$url."/admin/route-admin.php?msg=blog");
?>
