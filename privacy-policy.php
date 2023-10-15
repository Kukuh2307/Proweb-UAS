<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 7");
$data = mysqli_fetch_assoc($querySelect);
?>
<section id="delivery-information" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem;">
        <div class="row">
            <div class="col-md-10">
                <h2 class="text-center"><?=$data['bagian']?></h2>
                <?php
                $querySelectKebijakanPribadi = mysqli_query($koneksi, "SELECT * FROM kebijakanpribadi   ");
                $data = mysqli_fetch_array($querySelectKebijakanPribadi);
                echo htmlspecialchars_decode($data['deskripsi']);
                ?>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../PrakwebUas/component/footer.php';
?>