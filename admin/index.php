<?php
// session_start();
// if (!isset($_SESSION['Login'])) {
//     header("location:auth/login.php?msg=directorytranfesal");
//     exit;
// }
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    $tittle = $msg;
} else {
    $msg = [''];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = [''];
}

if(isset($_GET['kategori'])){
    $kategori = $_GET['kategori'];
} else{
    $kategori = [''];
}
require_once("../config.php");
require_once("component/header.php");
require_once("component/navbar.php");
require_once("component/sidebar.php");
if($msg == "dashboard"){
    require_once "section/dashboard.php";
} elseif($msg == "jumbotron"){
    require_once ("section/jumbotron.php");
} elseif($msg == "addjumbotron"){
    require_once ("section/add-jumbotron.php");
} elseif($msg == "editjumbotron"){
    require_once ("section/edit-jumbotron.php");
} elseif($msg == "koleksibaru"){
    require_once ("section/koleksibaru.php");
} elseif($msg == "addbarang"){
    require_once ("section/add-barang.php");
} elseif($msg == "editbarang"){
    require_once ("section/edit-barang.php");
} elseif($msg == "blog"){
    require_once ("section/blog.php");
} elseif($msg == "addartikel"){
    require_once ("section/add-artikel.php");
} elseif($msg == "editartikel"){
    require_once ("section/edit-artikel.php");
} elseif($msg == "mitra"){
    require_once ("section/mitra.php");
} elseif($msg == "addmitra"){
    require_once ("section/add-mitra.php");
} elseif($msg == "editmitra"){
    require_once ("section/edit-mitra.php");
} elseif($msg == "tentangkami"){
    require_once ("section/tentangkami.php");
} elseif($msg == "edittentangkami"){
    require_once ("section/edit-tentangkami.php");
} elseif($msg == "informasidanpengiriman"){
    require_once ("section/informasipengiriman.php");
} elseif($msg == "editinfopengiriman"){
    require_once ("section/edit-informasipengiriman.php");
} elseif($msg == "kebijakanpribadi"){   
    require_once ("section/kebijakanpribadi.php");
} elseif($msg == "editkebijakanpribadi"){
    require_once ("section/edit-kebijakanpribadi.php");
} elseif($msg == "syaratdanketentuan"){
    require_once ("section/syaratketentuan.php");
} elseif($msg == "editsyaratdanketentuan"){
    require_once ("section/edit-syaratdanketentuan.php");
} elseif($msg == "daftar-admin"){
    require_once ("section/tabel-admin.php");
} elseif($msg == "add-daftar-admin"){
    require_once ("section/add-admin.php");
} elseif($msg == "daftar-user"){
    require_once ("section/tabel-user.php");
} elseif($msg == "add-daftar-user"){
    require_once ("section/add-user.php");
} elseif($msg == "daftar-kategori-barang"){
    require_once ("section/daftar-kategori.php");
} elseif($msg == "add-daftar-kategori"){
    require_once ("section/add-daftar-kategori.php");
}
require_once ("component/footer.php");
