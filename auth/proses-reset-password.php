<?php
session_start();
require_once("../config.php");



if (isset($_POST['reset'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // cek user atau admin
    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");
    $cekadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email= '$username'");

    // reset password user atau admin
    if (mysqli_num_rows($cekuser) == 1) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updatepassword = mysqli_query($koneksi, "UPDATE pengguna SET password='$hashed_password' WHERE email='$username'");
        header("location:../auth/login.php?msg=succesresetpassword");
        exit;
    } elseif (mysqli_num_rows($cekadmin) == 1) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updatepassword = mysqli_query($koneksi, "UPDATE admin SET password='$hashed_password' WHERE email='$username'");
        header("location:../auth/login.php?msg=succesresetpassword");
        exit;
    } else {
        header("location:../auth/lupa-password.php?msg=usernotfound");
        exit;
    }
}
