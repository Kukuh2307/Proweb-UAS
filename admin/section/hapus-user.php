<?php
require_once("../../config.php");
// menangkap nis dan foto saat di kirim dengan post dari siswa.php
$id = $_GET['id'];

$hapusData = mysqli_query($koneksi ,"DELETE FROM pengguna WHERE id = '$id'");
if(!$hapusData){
    $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "User berhasil dihapus.";
}


header("location:".$url."/admin/route-admin.php?msg=daftar-user");
return;
?>