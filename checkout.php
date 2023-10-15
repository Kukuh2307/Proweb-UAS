<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

$user = $_SESSION['Username'];
$querySelect = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_depan='$user'");
$data = mysqli_fetch_array($querySelect);
$username = $data['nama_depan'];
$namaLengkap = $data['nama_lengkap'];
$email = $data['email'];
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
                        echo $email . "<br>";
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
            <table class="table table-striped table">
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
                    $totalBelanja = 0; // Inisialisasi variabel total belanja
                    $querySelect = mysqli_query($koneksi, "SELECT keranjang.id,barang.nama AS nama_barang, keranjang.banyak, barang.harga, (barang.harga * keranjang.banyak) AS total
                FROM keranjang
                JOIN barang ON keranjang.id_barang = barang.id
                JOIN pengguna ON keranjang.id_user = pengguna.id
                WHERE pengguna.nama_depan = '$user'");
                    if ($querySelect) {
                        while ($data = mysqli_fetch_array($querySelect)) {
                            $id = $data['id'];
                            $nama_barang = $data['nama_barang'];
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
                                    <?= $data['nama_barang'] ?>
                                </td>
                                <td align="left">
                                    <?= $data['banyak'] ?>
                                </td>
                                <td align="left">
                                    <?= number_format($data['harga']) ?>
                                </td>
                                <td align="left">
                                    <?= number_format($data['total']) ?>
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

            <div class="row justify-content-between align-items-start g-2">
                <div class="col-12">
                    <h2>PENGIRIMAN</h2>
                </div>

                <!-- Bagian Opsi Provinsi -->
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control">
                            <option value="">Pilih Provinsi</option>
                            <!-- Mengambil data provinsi dari file dataprovinsi.php -->
                            <?php include 'dataprovinsi.php'; ?>
                        </select>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Mengambil data distrik berdasarkan provinsi yang dipilih
                        $('#provinsi').on('change', function() {
                            var idProvinsi = $(this).val();
                            if (idProvinsi !== '') {
                                $.ajax({
                                    url: 'datadistrik.php',
                                    type: 'POST',
                                    data: {
                                        id_provinsi: idProvinsi
                                    },
                                    success: function(response) {
                                        $('#distrik').html(response);
                                    }
                                });
                            } else {
                                $('#distrik').html('<option value="">Pilih Distrik</option>');
                            }
                        });
                    });
                </script>

                <!-- Bagian Opsi Distrik -->
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="distrik">Distrik</label>
                        <select name="distrik" id="distrik" class="form-control">
                            <option value="">Pilih Distrik</option>
                        </select>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Mengambil data distrik berdasarkan provinsi yang dipilih
                        $('#provinsi').on('change', function() {
                            var idProvinsi = $(this).val();
                            if (idProvinsi !== '') {
                                $.ajax({
                                    url: 'datadistrik.php', // Ganti dengan file dataprovinsi.php yang sesuai
                                    type: 'POST',
                                    data: {
                                        id_provinsi: idProvinsi
                                    },
                                    success: function(response) {
                                        $('#distrik').html(response);
                                    }
                                });
                            } else {
                                $('#distrik').html('<option value="">Pilih Distrik</option>');
                            }
                        });
                    });
                </script>


                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="ekspedisi">Ekspedisi</label>
                        <select name="ekspedisi" id="ekspedisi" class="form-control">
                            <option value="">Pilih Ekspedisi</option>
                            <!-- Opsi ekspedisi akan diisi melalui JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="paket">Paket</label>
                        <select name="paket" id="paket" class="form-control">
                            <option value="">Pilih Paket</option>
                            <!-- Opsi paket akan diisi melalui JavaScript -->
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group" style="margin-top: 10px;">

                <div class="row justify-content-between align-items-start g-2 mt-5">
                    <div class="col-12">
                        <h2>METODE PEMBAYARAN</h2>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="metode">metode</label>
                            <select name="metode" id="metode" class="form-control">
                                <option value="" selected>Pilih Metode</option>
                                <option value="Tranfer Bank">Tranfer Bank</option>
                                <option value="COD">COD</option>
                                <option value="E-Money">E-Money</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn" name="checkout" style="background-color:#008744; color:white">Checkout</button>
            </div>
        </div>
    </section>
</form>

<?php
require_once '../PrakwebUas/component/footer.php';
?>