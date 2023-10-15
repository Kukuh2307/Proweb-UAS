<?php
session_start();

if (isset($_GET['user'])) {
    $user = $_GET['user'];
} else {
    $user = [''];
}
if (isset($_GET['email'])) {
    $key = "resetpassword";
    $decript = $_GET['email'];
    $email = openssl_decrypt($decript, "AES-128-ECB", $key);
} else {
    $email = [''];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Reset Password <?= $user ?></title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <div class="body">
        <div class="veen">
            <div class="wrapper" style="padding-top: 10rem; margin-left: 25%;">
                <form id="reset-password" tabindex="500" action="proses-reset-password.php" method="post">
                    <h3>Email yang sudah terdaftar</h3>
                    <div class="mail">
                        <input type="email" name="username" value="<?= $email ?>" disabled>
                        <label>Email</label>
                        <input type="hidden" name="email" id="email" value="<?= $email ?>">
                    </div>
                    <div class="passwd">
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <div class="passwd">
                        <input type="password" name="repassword">
                        <label>Masukkan konfirmasi password</label>
                    </div>
                    <div class="submit">
                        <button class="dark" name="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/login.js"></script>
</body>

</html>