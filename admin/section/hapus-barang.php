<?php
require_once("../../config.php");
// menangkap nis dan foto saat di kirim dengan post dari siswa.php
$id = $_GET['id'];

// query mengambil foto
$querySelect = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
$data = mysqli_fetch_array($querySelect);
$foto = $data['foto'];

$hapusData = mysqli_query($koneksi ,"DELETE FROM barang WHERE id = '$id'");
if(!$hapusData){
    $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data barang berhasil dihapus.";
}

if ($foto != 'default.png') {
    // mencegah admin menghapus foto default 
    unlink("../../img/" . $foto);
}

header("location:".$url."/admin/route-admin.php?msg=koleksibaru");
return;
?>