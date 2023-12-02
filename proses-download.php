<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

$user = $_SESSION['Username'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$querySelectUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_depan='$user'");
$dataUser = mysqli_fetch_array($querySelectUser);
$username = $dataUser['nama_depan'];
$namaLengkap = $dataUser['nama_lengkap'];
$email = $dataUser['email'];
?>

<form action="proses-checkout.php" method="POST">
    <section id="keranjang" style="margin-bottom: 0px; background-color: white;">
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

            <a href="cetak-struk.php?id=<?= $data2['id'] ?>&user=<?= $data2['id_user'] ?>" class="btn" name="download" style="background-color:#008744; color:white">Cetak</a>
        </div>
    </section>
</form>

<?php
require_once '../PrakwebUas/component/footer.php';
?>