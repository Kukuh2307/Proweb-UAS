<?php
session_start();
require_once("../config.php");

if (isset($_POST['cek'])) {
    $username = trim(htmlspecialchars($_POST['username']));

    // cek user atau admin
    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");
    $cekadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email= '$username'");
    $key = "resetpassword";
    // url reset password user atau admin
    if (mysqli_num_rows($cekuser) == 1) {
        $enkripsi = openssl_encrypt($username, "AES-128-ECB", $key);
        $status = "User";
        // header("location:../auth/reset-password.php?user=$status");
        header("location:../auth/reset-password.php?user=$status&email=$enkripsi");
        exit;
    } elseif (mysqli_num_rows($cekadmin) == 1) {
        $enkripsi = openssl_encrypt($username, "AES-128-ECB", $key);
        $status = "Admin";
        // header("location:../auth/reset-password.php?user=$status");
        header("location:../auth/reset-password.php?user=$status&email=$enkripsi");
        exit;
    } else {
        header("location:../auth/lupa-password.php?msg=usernotfound");
        exit;
    }
}
