<?php
$secret_key = '6LfmJSEpAAAAAHSx-rGf6MzaHax0trZsXfmN6X2I';
session_start();
require_once("../config.php");

// Versi baru
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validasi captcha
    $secretKey = "YOUR_RECAPTCHA_SECRET_KEY";
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secret_key,
        'response' => $recaptchaResponse
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if ($response['success'] == false) {
        // Captcha tidak valid
        header("Location: login.php?msg=errorcaptcha");
        exit();
    }

    // validasi user dan admin
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));


    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");
    $cekadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email= '$username'");
    if (mysqli_num_rows($cekuser) == 1) {
        $row = mysqli_fetch_array($cekuser);
        if (password_verify($password, $row['password'])) {
            $name = $row['nama_depan'];
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $name;
            header("location:../index.php?msg=success");
        } else {
            header("location:../auth/login.php?msg=falsepassword");
            exit;
        }
        // cek admin
    } elseif (mysqli_num_rows($cekadmin) == 1) {
        $row = mysqli_fetch_array($cekadmin);
        if (password_verify($password, $row['password'])) {
            $name = $row['nama_depan'];
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $name;
            header("location:../admin/index.php?msg=dashboard");
            exit;
        } else {
            header("location:../auth/login.php?msg=falsepassword");
            exit;
        }
    } else {
        header("location:../auth/login.php?msg=usernotfound");
        exit;
    }
} else {
    header("Location: login.php");
    exit();
}
