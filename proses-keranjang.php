<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $id = $_POST['idbarang'];
    $banyak = $_POST['jumlah'];

    // ambil data di database
    $querySelectUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_depan = '$user'");
    $dataUser = mysqli_fetch_array($querySelectUser);
    $idUser = $dataUser['id'];

    $querySelectBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
    $dataBarang = mysqli_fetch_assoc($querySelectBarang);
    $harga = $dataBarang['harga'];
    $total = $banyak * $harga;

    if ($user != '' && $id > 0) {
        $insertData = mysqli_query($koneksi, "INSERT INTO keranjang (id_user, banyak, id_barang, total) VALUES ('$idUser', '$banyak', '$id', '$total')");
        if (!$insertData) {
            echo mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Barang berhasil ditambahkan ke keranjang.";
            header("location: " . $url . "/proses-support.php?msg=keranjang&alert=addbarang");
            exit;
        }
    }
}
