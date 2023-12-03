<?php
session_start();
require_once("../config.php");

if (isset($_POST['reset'])) {
    $username = $_POST['email'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $repassword = $_POST['repassword'];

    // cek user
    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");

    // reset password user
    if (mysqli_num_rows($cekuser) > 0) {
        $user = mysqli_fetch_assoc($cekuser);
        $password = $user['password'];
        if (password_verify($oldpassword, $password)) {
            if ($newpassword == $repassword) {
                $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT); // Enkripsi password baru, bukan password lama
                $updatepassword = mysqli_query($koneksi, "UPDATE pengguna SET password='$hashed_password' WHERE email='$username'");
                header("location:../auth/login.php?msg=succesresetpassword");
                exit;
            } else {
                header("location:../auth/lupa-password.php?msg=passwordnotsame");
                exit;
            }
        } else {
            header("location:../auth/lupa-password.php?msg=wrongpassword");
            exit;
        }
    }
}
