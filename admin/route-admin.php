<?php
require_once '../config.php';
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        header("Location: http://localhost/PrakwebUas/admin/index.php?msg=$msg&id=$id");
    } else {
        header("Location: http://localhost/PrakwebUas/admin/index.php?msg=$msg");
    }
} else {
    echo "gagal";
}
?>