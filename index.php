<?php
// session_start();

// cek session
require_once 'config.php';
// require_once ('auth/proses-login.php');

// if(isset($_GET['user'])){
//     $user = $_GET['user'];
// } else{
//     $user = '';
// }

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = [''];
}
require_once 'component/navbar.php';
if ($msg == 'informasi-pengiriman') {
    require_once '../PrakwebUas/informasi-pengiriman.php';
} elseif ($msg == 'privacy-policy') {
    require_once '../PrakwebUas/privacy-policy.php';
} elseif ($msg == 'term-and-condition') {
    require_once '../PrakwebUas/term-and-condition.php';
} elseif($msg == 'kategori') {
    require_once '../PrakwebUas/kategori.php';
} else{
    require_once '../PrakwebUas/component/jumbotron.php';
    require_once '../PrakwebUas/component/collection.php';
    require_once '../PrakwebUas/component/blog.php';
    require_once '../PrakwebUas/component/mitra.php';
    require_once '../PrakwebUas/component/tentang-kami.php';
    require_once '../PrakwebUas/component/kontak.php';
}
require_once '../PrakwebUas/component/footer.php';
