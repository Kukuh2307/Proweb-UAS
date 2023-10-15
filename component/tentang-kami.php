<?php 
require_once 'config.php';
require_once 'mitra.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 5");
$data = mysqli_fetch_assoc($querySelect);
?>
    <!-- tentang kami -->
    <section id="tentang-kami" class="mb-0">
        <div class="container">
            <div class="container">
                <div class="row gy-lg-5 align-items-center">
                    <div class="col-lg-6 order-lg-1 text-left text-lg-start">
                        <div class="title pt-3 pb-5">
                            <h2 class="position-relative d-inline-block ms-4"><?=$data['bagian']?></h2>
                        </div>
                        <?php
                        $querySelectTenrtangKami = mysqli_query($koneksi, "SELECT * FROM tentangkami");
                        $dataAboutUs = mysqli_fetch_array($querySelectTenrtangKami);
                        ?>
                        <p class="lead text-muted"><?=$dataAboutUs['judul']?></p>
                        <p><?=$dataAboutUs['deskripsi']?></p>
                    </div>
                    <div class="col-lg-6 order-lg-0">
                        <img src="<?=$url?>/img/<?=$dataAboutUs['foto']?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
    </section>
    <!-- akhir tentang kami -->