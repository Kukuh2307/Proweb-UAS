<?php
session_start();
require_once 'config.php';

if (isset($_POST['checkout'])) {
    if (isset($_SESSION['Username'])) {
        $user = $_SESSION['Username'];
        $querySelectUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_depan='$user'");
        $dataUser = mysqli_fetch_array($querySelectUser);
        $idUser = $dataUser['id'];
        $idBarangList = $_POST['idBarang'];
        $idProvinsi = $_POST['provinsi'];
        $idDistrik = $_POST['distrik'];
        $ekspedisi = $_POST['ekspedisi'];
        $paket = $_POST['paket'];
        $subtotal = $_POST['subtotal'];
        $metode = $_POST['metode'];

        // Mendapatkan nama provinsi dari API RajaOngkir
        $curlProvinsi = curl_init();

        curl_setopt_array(
            $curlProvinsi,
            array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=" . $idProvinsi,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Silakan isi dengan api_key dari RajaOngkir.com
                    "key: d20bee84e0494e1b5b4c0d764dd31d07"
                ),
            )
        );

        $responseProvinsi = curl_exec($curlProvinsi);
        $errProvinsi = curl_error($curlProvinsi);

        curl_close($curlProvinsi);

        if ($errProvinsi) {
            echo "cURL Error #:" . $errProvinsi;
            exit;
        } else {
            $arrayResponseProvinsi = json_decode($responseProvinsi, TRUE);
            $namaProvinsi = $arrayResponseProvinsi['rajaongkir']['results']['province'];
        }

        // Mendapatkan nama distrik dari API RajaOngkir
        $curlDistrik = curl_init();

        curl_setopt_array(
            $curlDistrik,
            array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=" . $idDistrik,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Silakan isi dengan api_key dari RajaOngkir.com
                    "key: d20bee84e0494e1b5b4c0d764dd31d07"
                ),
            )
        );

        $responseDistrik = curl_exec($curlDistrik);
        $errDistrik = curl_error($curlDistrik);

        curl_close($curlDistrik);

        if ($errDistrik) {
            echo "cURL Error #:" . $errDistrik;
            exit;
        } else {
            $arrayResponseDistrik = json_decode($responseDistrik, TRUE);
            $namaDistrik = $arrayResponseDistrik['rajaongkir']['results']['city_name'];
        }

        // Mengecek apakah ada item barang yang dipilih
        if (!empty($idBarangList)) {
            // Memasukkan data ke dalam tabel checkout
            $queryInsert = mysqli_query($koneksi, "INSERT INTO checkout (id_user, provinsi, distrik, ekspedisi, paket,subtotal,metode)
            VALUES ('$idUser', '$namaProvinsi', '$namaDistrik', '$ekspedisi', '$paket','$subtotal','$metode')");

            if ($queryInsert) {
                // Mendapatkan ID checkout yang baru saja dimasukkan
                $idCheckout = mysqli_insert_id($koneksi);

                // Memasukkan detail barang ke dalam tabel checkout_detail
                foreach ($idBarangList as $idBarang) {
                    $querySelectBarang = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id = '$idBarang' AND id_user = '$idUser'");
                    $dataBarang = mysqli_fetch_array($querySelectBarang);
                    $idBarang = $dataBarang['id_barang'];
                    $banyak = $dataBarang['banyak'];
                    $queryInsertDetail = mysqli_query($koneksi, "INSERT INTO checkout_detail (id_checkout, id_barang, banyak) VALUES ('$idCheckout', '$idBarang', '$banyak')");
                }

                // Menghapus barang dari keranjang setelah di-checkout
                $queryDeleteKeranjang = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_user = '$idUser'");

                // mengupdate stok barang
                // Mengupdate jumlah stok barang
                $queryUpdateStok = mysqli_query($koneksi, "UPDATE barang SET stok = stok - '$banyak' WHERE id = '$idBarang'");  

                // Redirect ke halaman sukses atau halaman terima kasih
                header("Location: index.php");
                exit;
            } else {
                echo "Gagal memasukkan data checkout.";
            }
        } else {
            echo "Tidak ada barang yang dipilih.";
        }
    } else {
        echo "Anda harus login terlebih dahulu.";
    }
} else {
    echo "Permintaan tidak valid.";
}
