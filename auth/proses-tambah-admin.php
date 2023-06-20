<?php
session_start();
require_once("../config.php");

if (isset($_POST['regist'])) {
    $namaDepan = trim(htmlspecialchars($_POST['namaDepan']));
    $namaLengkap = trim(htmlspecialchars($_POST['namaLengkap']));
    $email = trim(htmlspecialchars($_POST['email']));
    $status = trim(htmlspecialchars($_POST['status']));
    $password = trim(htmlspecialchars($_POST['password']));
    $repassword = trim(htmlspecialchars($_POST['repassword']));

    // Validasi input
    if (empty($namaDepan) || empty($namaLengkap) || empty($email) || empty($status) || empty($password) || empty($repassword)) {
        $session = $_SESSION['error'] = "Mohon lengkapi semua field.";
        header("Location: login.php?$session");
        exit;
    } elseif ($password !== $repassword) {
        $session = $_SESSION['error'] = "Konfirmasi password tidak cocok.";
        header("Location: login.php?$session");
        exit;
    }

    // Cek apakah email sudah terdaftar
    $queryCheckEmail = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($queryCheckEmail) > 0) {
        $session = $_SESSION['error'] = "Email sudah terdaftar. Silakan gunakan email lain.";
        header("Location: login.php?$session");
        exit;
    }

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data user baru ke database
    $queryInsertUser = mysqli_query($koneksi, "INSERT INTO admin (nama_depan, nama_lengkap, email,status, password) VALUES ('$namaDepan', '$namaLengkap', '$email','$status', '$hashedPassword')");
    if ($queryInsertUser) {
        $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
        header("Location: login.php?$session");
        exit;
    } else {
        $session = $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("Location: login.php?$session");
        exit;
    }
} else {
    // Jika tidak ada data yang dikirimkan melalui POST
    $session = $_SESSION['error'] = "Permintaan tidak valid.";
    header("Location: login.php?$session");
    exit;
}
?>
