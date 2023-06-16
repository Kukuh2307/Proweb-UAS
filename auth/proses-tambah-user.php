<?php
session_start();
require_once("../config.php");

if (isset($_POST['regist'])) {
    $namaDepan = trim(htmlspecialchars($_POST['namaDepan']));
    $namaLengkap = trim(htmlspecialchars($_POST['namaLengkap']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $repassword = trim(htmlspecialchars($_POST['repassword']));

    // Validasi input
    if (empty($namaDepan) || empty($namaLengkap) || empty($email) || empty($password) || empty($repassword)) {
        $_SESSION['error'] = "Mohon lengkapi semua field.";
        header("Location: login.php");
        exit;
    } elseif ($password !== $repassword) {
        $_SESSION['error'] = "Konfirmasi password tidak cocok.";
        header("Location: login.php");
        exit;
    }

    // Cek apakah email sudah terdaftar
    $queryCheckEmail = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$email'");
    if (mysqli_num_rows($queryCheckEmail) > 0) {
        $_SESSION['error'] = "Email sudah terdaftar. Silakan gunakan email lain.";
        header("Location: login.php");
        exit;
    }

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data user baru ke database
    $queryInsertUser = mysqli_query($koneksi, "INSERT INTO pengguna (nama_depan, nama_lengkap, email, password) VALUES ('$namaDepan', '$namaLengkap', '$email', '$hashedPassword')");
    if ($queryInsertUser) {
        $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("Location: login.php");
        exit;
    }
} else {
    // Jika tidak ada data yang dikirimkan melalui POST
    $_SESSION['error'] = "Permintaan tidak valid.";
    header("Location: login.php");
    exit;
}
?>
