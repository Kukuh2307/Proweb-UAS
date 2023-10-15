<?php
require_once 'config.php';
require_once 'blog.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 4");
$data = mysqli_fetch_assoc($querySelect);
?>
<!-- mitra -->
<section id="mitra" class="mb-0">
    <div class="container">
        <div class="title text-center py-5">
            <h1 class="position-relative d-inline-block"><?= $data['bagian'] ?></h1>
        </div>
        <div class="mitra-logos text-center">
            <?php
            $querySelectMitra = mysqli_query($koneksi, "SELECT * FROM mitra");
            while ($data = mysqli_fetch_array($querySelectMitra)) {
            ?>
                <div class="<?=$data['nama']?>">
                <!-- https://img.icons8.com/ios-filled/50/ibm.png -->
                    <img width="612" height="612" src="<?=$url?>/img/<?=$data['foto']?>" alt="<?=$data['nama']?>" />
                </div>
            <?php
            }
            ?>
            <!-- <div class="google">
                <img width="612" height="612" src="https://img.icons8.com/nolan/512/google-logo.png" alt="google-logo" />
            </div>
            <div class="microsoft">
                <img width="612" height="612" src="https://img.icons8.com/color/48/microsoft.png" alt="microsoft" />
            </div> -->
        </div>
    </div>
</section>
<!-- akhir mitra -->