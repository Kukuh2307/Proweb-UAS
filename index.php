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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = [''];
}

if (isset($_GET['alert'])) {
    $alert = $_GET['alert'];
} else {
    $alert = [''];
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = [''];
}

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
} else {
    $cari = [''];
}

require_once 'component/navbar.php';
if ($msg == 'informasi-pengiriman') {
    require_once '../PrakwebUas/informasi-pengiriman.php';
} elseif ($msg == 'privacy-policy') {
    require_once '../PrakwebUas/privacy-policy.php';
} elseif ($msg == 'term-and-condition') {
    require_once '../PrakwebUas/term-and-condition.php';
} elseif ($msg == 'barang') {
    require_once '../PrakwebUas/barang.php';
} elseif ($msg == 'detail-barang') {
    require_once '../PrakwebUas/detail-barang.php';
} elseif ($msg == 'detail-artikel') {
    require_once '../PrakwebUas/detail-artikel.php';
} elseif ($msg == 'keranjang') {
    require_once '../PrakwebUas/keranjang.php';
} elseif ($msg == 'searching') {
    require_once '../PrakwebUas/searching.php';
} elseif ($msg == 'daftar-transaksi') {
    require_once '../PrakwebUas/daftar-transaksi.php';
} else {
    require_once '../PrakwebUas/component/jumbotron.php';
    require_once '../PrakwebUas/component/collection.php';
    require_once '../PrakwebUas/component/blog.php';
    require_once '../PrakwebUas/component/mitra.php';
    require_once '../PrakwebUas/component/tentang-kami.php';
    require_once '../PrakwebUas/component/kontak.php';
}
require_once '../PrakwebUas/component/footer.php';
