<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 6");
$data = mysqli_fetch_assoc($querySelect);
?>
<section id="delivery-information" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem; text-align: justify;">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="text-center"><?=$data['bagian']?></h2>
                <?php
                $querySelectInformasiPengiriman = mysqli_query($koneksi, "SELECT * FROM informasipengiriman");
                $data = mysqli_fetch_array($querySelectInformasiPengiriman);
                echo htmlspecialchars_decode($data['deskripsi']);
                ?>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../PrakwebUas/component/footer.php';
?>