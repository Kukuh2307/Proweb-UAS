<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Login</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <div class="body">
        <div class="veen">
            <div class="login-btn splits">
                <p>Sudah mempunyai akun??</p>
                <button class="active">Login</button>
            </div>
            <div class="rgstr-btn splits">
                <p>Belum mempunyai akun??</p>
                <button>Form Daftar</button>
            </div>
            <div class="wrapper">
                <form id="login" tabindex="500" action="proses-login.php" method="post">
                    <h3>Login</h3>
                    <div class="mail">
                        <input type="email" name="username">
                        <label>Email</label>
                    </div>
                    <div class="passwd">
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <div class="submit">
                        <button class="dark" name="login">Login</button>
                    </div>
                </form>
                <form id="register" tabindex="502" action="proses-tambah-user.php" method="post">
                    <h3>Form Daftar</h3>
                    <div class="name">
                        <input type="text" name="namaDepan">
                        <label>Nama Depan</label>
                    </div>
                    <div class="name">
                        <input type="text" name="namaLengkap">
                        <label>Nama Lengkap</label>
                    </div>
                    <div class="mail">
                        <input type="mail" name="email">
                        <label>Email</label>
                    </div>
                    <div class="passwd">
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <div class="passwd">
                        <input type="password" name="repassword">
                        <label>Re-Password</label>
                    </div>
                    <div class="submit">
                        <button class="dark" name="regist">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../js/script.js"></script>
</body>

</html>