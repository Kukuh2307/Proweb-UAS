<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

?>
<section id="delivery-information" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem; text-align: justify; padding: 0; width: 100%;">
        <div class="row">
            <div class="card-container" style="display: flex; width: 100%;">
                <?php
                $querySelect = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
                while ($data = mysqli_fetch_array($querySelect)) {
                    $rating = $data['rating'];
                ?>
                    <div class="card ">
                        <img src="img/<?= $data['foto'] ?>" alt="<?= $data['nama'] ?>">
                        <h3><?= $data['nama'] ?></h3>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < $data['rating']; $i++) {
                                echo '<span style="color: var(--color1);"><i class="fas fa-star"></i></span>';
                            }
                            for ($i = $data['rating']; $i < 5; $i++) {
                                echo '<span class="text-muted"><i class="fas fa-star"></i></span>';
                            }
                            ?>
                        </div>
                        <p>Stok : <?= $data['stok'] ?></p>
                        <p>Rp.<?= number_format($data['harga']) ?>,.</p>
                        <a href="<?= $url ?>/proses-support.php?msg=detail-barang&id=<?= $data['id'] ?>"><button type="sumbit">Detail</button></a>
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