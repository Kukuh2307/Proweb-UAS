<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if($msg == 'informasi-pengiriman'){
        require_once '../PrakwebUas/informasi-pengiriman.php';
    } elseif($msg == 'privacy-policy'){
        require_once '../PrakwebUas/privacy-policy.php';
    } elseif($msg == 'term-and-condition'){
        require_once '../PrakwebUas/term-and-condition.php';
    }
} else {
    require_once '../PrakwebUas/component/jumbotron.php';
    require_once '../PrakwebUas/component/collection.php';
    require_once '../PrakwebUas/component/blog.php';
    require_once '../PrakwebUas/component/mitra.php';
    require_once '../PrakwebUas/component/tentang-kami.php';
    require_once '../PrakwebUas/component/kontak.php';
}
require_once '../PrakwebUas/component/footer.php';
