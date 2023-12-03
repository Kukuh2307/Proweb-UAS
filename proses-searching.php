<?php
session_start();
require_once 'config.php';

if (isset($_POST['cari'])) {
    $cari = $_POST['searching'];
    header("location: " . $url . "/proses-support.php?msg=searching&cari=" . urlencode($cari));
}
