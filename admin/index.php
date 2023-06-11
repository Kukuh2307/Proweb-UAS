<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    $tittle = $msg;
} else {
    $msg = [''];
}
require_once("../config.php");
require_once("component/header.php");
require_once("component/navbar.php");
require_once("component/sidebar.php");
if($msg == "dashboard"){
    require_once "section/dashboard.php";
} elseif($msg == "jumbotron"){
    require_once ("section/jumbotron.php");
} elseif($msg == "koleksibaru"){
    require_once ("section/koleksibaru.php");
} elseif($msg == "blog"){
    require_once ("section/blog.php");
} elseif($msg == "mitra"){
    require_once ("section/mitra.php");
} elseif($msg == "tentangkami"){
    require_once ("section/tentangkami.php");
} elseif($msg == "informasidanpengiriman"){
    require_once ("section/informasipengiriman.php");
} elseif($msg == "kebijakanpribadi"){
    require_once ("section/kebijakanpribadi.php");
} elseif($msg == "syaratdanketentuan"){
    require_once ("section/syaratketentuan.php");
}
require_once ("component/footer.php");
