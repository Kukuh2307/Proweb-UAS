<?php
if (isset($_GET['alert'])) {
    echo $_GET['alert'];
}
if (isset($_GET['msg'])) {
    $support = $_GET['msg'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        header("Location: index.php?msg=$support&id=$id");
        exit;
    } elseif (isset($_GET['alert'])) {
        $alert = $_GET['alert'];
        header("Location: index.php?msg=$support&alert=$alert");
        exit;
    } elseif (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        header("Location: index.php?msg=$support&cari=$cari");
        exit;
    } else {
        header("Location: index.php?msg=$support");
        exit;
    }
} else {
    echo "gagal";
}
