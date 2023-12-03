<?php
session_start();
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if ($msg == 'usernotfound') {
        $alert = 'User tidak di temukan atau belum terdaftar';
    } elseif ($msg == 'passwordnotsame') {
        $alert = 'Password tidak sama';
    } elseif ($msg == 'wrongpassword') {
        $alert = 'Password yang anda masukkan salah';
    }
} else {
    $msg = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Reset Password</title>
    <style>
        .alert {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alertBox = document.getElementById('errorAlert');
            if (alertBox) {
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 3000); // Mengatur alert untuk menghilang setelah 3 detik
            }
        });
    </script>

    <div class="body">
        <?php
        if ($msg != '') {
            echo "<div class='alert alert-danger' id='errorAlert'>" . $alert . "</div>";
        }
        ?>
        <div class="veen">
            <div class="wrapper" style="padding-top: 10rem; margin-left: 25%;">
                <form id="cek-email" tabindex="500" action="proses-cek-email.php" method="post">
                    <h3>Masukkan email yang sudah terdaftar</h3>
                    <div class="mail">
                        <input type="email" name="username">
                        <label>Email</label>
                    </div>
                    <div class="submit">
                        <button class="dark" name="cek" onclick="showErrorAlert">Cek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan alert gagal
        function showErrorAlert() {
            var errorAlert = document.getElementById('errorAlert');
            errorAlert.style.display = 'block';
            setTimeout(function() {
                errorAlert.style.display = 'none';
            }, 3000); // Setelah 3 detik alert akan hilang
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/login.js"></script>
</body>

</html>