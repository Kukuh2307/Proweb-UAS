<?php
require_once '../config.php';
if(isset($_GET['msg'])){
    $msg= $_GET['msg'];
    header("location:http://localhost/PrakwebUas/admin/index.php?msg=$msg");
} else{
    echo "gagal";
}
?>