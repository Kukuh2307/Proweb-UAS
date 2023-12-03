<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];   
$nama = $_POST['nama'];   
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['image'];

// cek foto
if ($foto['name'] != '') {
    $foto = handleImageUpload($foto);
} else {
    $foto = 'default.png';
}

// escaping
$deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);

if (isset($_POST['simpan'])) {

    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO mitra(foto,nama,deskripsi) VALUES ('$foto','$nama','$deskripsi')");
    if (!$insertData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data jumbotron berhasil ditambahkan.";
    }
} elseif(isset($_POST['update'])){
    if ($id != '') {
        // update data
        $updateData = mysqli_query($koneksi, "UPDATE mitra SET 
        foto='$foto',
        nama='$nama',
        deskripsi='$deskripsi'
        WHERE id='$id'
        ");
        if (!$updateData) {
            $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
        }
    }
}

header("location:".$url."/admin/route-admin.php?msg=mitra");
?>
