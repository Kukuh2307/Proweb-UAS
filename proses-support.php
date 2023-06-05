<?php
if(isset($_GET['msg'])){
    $support= $_GET['msg'];
    header("location:index.php?msg=$support");
} else{
    echo "gagal";
}
?>