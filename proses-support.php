<?php
if (isset($_GET['msg'])) {
    $support = $_GET['msg'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        header("Location: index.php?msg=$support&id=$id");
    } elseif (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        header("Location: index.php?msg=$support&cari=$cari");
    } else {
        header("Location: index.php?msg=$support");
    }
} else {
    echo "gagal";
}

?>