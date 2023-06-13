<?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$fotoName = $_FILES['image'];


if (isset($_POST['update'])) {
    if ($id != '') {
        if ($fotoName != '') { // apabila tidak kosong
            if ($fotoName != $data['foto']) { 
                // Mengunggah gambar baru dan mendapatkan nama file
                $foto = handleImageUpload($fotoName);
            } else {
                $foto = $data['foto']; // Gunakan foto sebelumnya
            }
        } else {
            $foto = $data['foto']; // Gunakan foto sebelumnya jika tidak ada foto baru
        }

        // Update data
        $updateData = mysqli_query($koneksi, "UPDATE tentangkami SET 
        foto='$foto',
        judul='$judul',
        deskripsi='$deskripsi'
        WHERE id='$id'");

        if (!$updateData) {
            $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
        }
    }
}



header("location:" . $url . "/admin/route-admin.php?msg=tentangkami");
