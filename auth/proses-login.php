<?php
session_start();
require_once("../config.php");

if(isset($_POST['login'])){
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    // cek user
    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");
    $cekadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email= '$username'");
    if(mysqli_num_rows($cekuser) == 1){
        $row = mysqli_fetch_array($cekuser);
        if(password_verify($password,$row['password'])){
            $name = $row['nama_depan'];
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $name;
            header("location:../index.php?msg=succes");
            exit;
        } else{
            header("location:../auth/login.php?msg=falsepassword");
            exit;
        }
        // cek admin
    } elseif(mysqli_num_rows($cekadmin) == 1) {
        $row = mysqli_fetch_array($cekadmin);
        if(password_verify($password,$row['password'])){
            $name = $row['nama_depan'];
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $name;
            header("location:../admin/index.php?msg=dashboard");
            exit;
        } else{
            header("location:../auth/login.php?msg=falsepassword");
            exit;
        }
    } else{
        header("location:../auth/login.php?msg=usernotfound");
        exit;
    }
}
?>
