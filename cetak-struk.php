<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- font awesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="<?= $url ?>/css/style.css">
    <link rel="stylesheet" href="<?= $url ?>/css/style-login.css">
    <link rel="stylesheet" href="<?= $url ?>/css/card.css">
    <title>Print Struk</title>
</head>

<body onload="window.print()" style="background-color: white;">
    <?php
    $user = $_GET['user'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }

    $querySelectUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$user'");
    $dataUser = mysqli_fetch_array($querySelectUser);
    $username = $dataUser['nama_depan'];
    $namaLengkap = $dataUser['nama_lengkap'];
    $email = $dataUser['email'];
    ?>

    <div class="container" style="margin-top: 4rem;">
        <h1 style="text-decoration: underline; margin-bottom:1rem;">INVOICE</h1>
        <div class="row justify-content-between align-items-start g-2 my-4">
            <div class="col">
                <h3>KISAWA</h3>
                <p>Jl.Jembatan Timbang Pojok<br> Kec.Ngantru<br> Kab.Tulungagung<br> </p>
            </div>
            <div class="col">
                <h3>PENERIMA</h3>
                <p>
                    <?php
                    echo $username . "<br>";
                    echo $namaLengkap . "<br>";
                    echo strtolower($email) . "<br>";
                    ?>
                </p>
            </div>
            <div class="col">
                <h3>DATE</h3>
                <p>
                    <?php
                    echo date("Y-m-d") . "<br>";
                    echo date("H:i:s") . "<br>";
                    ?>
                </p>
            </div>
        </div>
        <table class="table table-striped table" style="width: 100%; table-layout: fixed; margin: auto;">
            <thead>
                <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Banyak</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $totalBelanja = 0;

                // Menggunakan parameter $id pada query
                $querySelectCheckout = mysqli_query($koneksi, "SELECT barang.nama, checkout_detail.banyak, barang.harga, (barang.harga * checkout_detail.banyak) AS total,checkout.provinsi,checkout.distrik,checkout.ekspedisi,checkout.paket
                        FROM checkout_detail
                        JOIN barang ON checkout_detail.id_barang = barang.id
                        JOIN checkout ON checkout_detail.id_checkout = checkout.id 
                        WHERE checkout.id = '$id'");

                if ($querySelectCheckout) {
                    while ($data = mysqli_fetch_array($querySelectCheckout)) {
                        $nama_barang = $data['nama'];
                        $banyak = $data['banyak'];
                        $harga = $data['harga'];
                        $total = $data['total'];

                        $totalBelanja += $total;

                ?>
                        <tr>
                            <input type="hidden" name="idBarang[]" value="<?= $data['id'] ?>">
                            <input type="hidden" name="subtotal" value="<?= $totalBelanja ?>">
                            <th scope="row">
                                <?= $no++ ?>
                            </th>
                            <td align="left">
                                <?= $nama_barang ?>
                            </td>
                            <td align="left">
                                <?= $banyak ?>
                            </td>
                            <td align="left">
                                <?= number_format($harga) ?>
                            </td>
                            <td align="left">
                                <?= number_format($total) ?>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "gagal";
                }
                ?>
                <tr>
                    <td colspan="4" align="right"><strong>Total Belanja:</strong></td>
                    <td align="left"><strong>
                            <span name="totalbelanja"><?= number_format($totalBelanja) ?></span>
                        </strong></td>
                </tr>
            </tbody>
        </table>
        <!-- Sisipkan input hidden untuk menyimpan nilai $id -->
        <input type="hidden" name="id_checkout" value="<?= $id ?>">
        <?php
        $querySelectCheckout2 = mysqli_query($koneksi, "SELECT * FROM checkout where id='$id'");
        $data2 = mysqli_fetch_array($querySelectCheckout2);
        ?>
        <!-- Bagian Opsi Provinsi -->
        <div class="row justify-content-between align-items-start g-2">
            <div class="col-12">
                <h2>PENGIRIMAN</h2>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select readonly name="provinsi" id="provinsi" class="form-control">
                        <option value=""><?= $data2['provinsi'] ?></option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="distrik">Distrik</label>
                    <select readonly name="distrik" id="distrik" class="form-control">
                        <option value=""><?= $data2['distrik'] ?></option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="ekspedisi">Ekspedisi</label>
                    <select readonly name="ekspedisi" id="Ekspedisi" class="form-control">
                        <option value="" selected><?= $data2['ekspedisi'] ?></option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="paket">Paket</label>
                    <select readonly name="paket" id="paket" class="form-control">
                        <option value=""><?= $data2['paket'] ?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-between align-items-start g-2 mt-5">
            <div class="col-12">
                <h2>METODE PEMBAYARAN</h2>
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="metode">Metode</label>
                    <select readonly name="metode" id="metode" class="form-control">
                        <option value="" selected><?= $data2['metode'] ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</body>

</html>