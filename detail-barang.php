<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';
if (isset($_GET['id'])) {
    // ambil data di database
    $id = $_GET['id'];
    $querySelect = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
    $data = mysqli_fetch_assoc($querySelect);
    $kategori = $data['kategori'];
}
?>
<section id="detail-barang" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem; text-align: justify;">
        <form action="proses-keranjang.php" method="POST">
            <div class="row">
                <!-- Baris Pertama -->
                <div class="col-md-6">
                    <img src="img/<?= $data['foto'] ?>" alt="Product Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h3><?= $data['nama'] ?></h3>
                    <p>Stok: <b><?= $data['stok'] ?></b></p>
                    <p>Kategori: <b><?= $data['kategori'] ?></b></p>
                    <p>Harga: <b>Rp <?= number_format($data['harga']) ?></b></p>
                    <div class="rating d-inline-block">
                        <?php
                        for ($i = 0; $i < $data['rating']; $i++) {
                            echo '<span style="color: var(--color1);"><i class="fas fa-star"></i></span>';
                        }
                        for ($i = $data['rating']; $i < 5; $i++) {
                            echo '<span class="text-muted"><i class="fas fa-star"></i></span>';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="user" value="<?= $_SESSION['Username'] ?>">
                    <input type="hidden" name="idbarang" value="<?= $data['id'] ?>">

                    <div class="col-md-6" style="padding-left: 0px;">
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" max="<?= $data['stok'] ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn" style="background-color: var(--color1); color:white;">Tambah ke Keranjang</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Baris Kedua -->
        <div class="row mt-4" style="width: 65%;">
            <div class=" col-md-12">
                <h4>Deskripsi</h4>
                <p><?= $data['deskripsi'] ?></p>
            </div>
        </div>

        <div class="card-container" style="display: flex; width: 100%; justify-content: space-around;">
            <?php
            $querySelect = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori='$kategori' LIMIT 3");
            while ($data2 = mysqli_fetch_array($querySelect)) {
                $rating = $data2['rating'];
            ?>
                <div class="card ">
                    <img src="img/<?= $data2['foto'] ?>" alt="<?= $data2['nama'] ?>">
                    <h3><?= $data2['nama'] ?></h3>
                    <div class="rating">
                        <?php
                        for ($i = 0; $i < $data2['rating']; $i++) {
                            echo '<span style="color: var(--color1);"><i class="fas fa-star"></i></span>';
                        }
                        for ($i = $data2['rating']; $i < 5; $i++) {
                            echo '<span class="text-muted"><i class="fas fa-star"></i></span>';
                        }
                        ?>
                    </div>
                    <p>Stok : <?= $data2['stok'] ?></p>
                    <p>Rp.<?= number_format($data2['harga']) ?>,.</p>
                    <a href="<?= $url ?>/proses-support.php?msg=detail-barang&id=<?= $data2['id'] ?>"><button type="sumbit">Detail</button></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>