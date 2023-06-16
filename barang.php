<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

?>
<section id="delivery-information" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem; text-align: justify">
        <div class="row">
            <div class="card-container">
                <?php
                $querySelect = mysqli_query($koneksi, "SELECT * FROM barang");
                while ($data = mysqli_fetch_array($querySelect)) {
                    $rating = $data['rating'];
                ?>
                    <div class="card">
                        <img src="img/<?= $data['foto'] ?>" alt="<?= $data['nama'] ?>">
                        <h3><?= $data['nama'] ?></h3>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < $rating; $i++) {
                            ?>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            <?php
                            }
                            ?>
                        </div>
                        <p>Stok : <?= $data['stok'] ?></p>
                        <p>Rp.<?= number_format($data['harga']) ?>,.</p>
                        <button>Add to Cart</button>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
</section>


<?php
require_once '../PrakwebUas/component/footer.php';
?>