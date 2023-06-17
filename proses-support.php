<?php
if(isset($_GET['msg'])){
    $support= $_GET['msg'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        header("Location: index.php?msg=$support&id=$id");
    } else {
        header("location:index.php?msg=$support");
    }
} else{
    echo "gagal";
}
?>