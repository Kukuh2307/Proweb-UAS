<?php
require_once 'config.php';
require_once 'navbar.php';
?>
<!-- header -->
<header id="header" class="vh-100 carousel slide" data-ride="carousel">
    <div class="d-flex align-items-center carousel-inner">
        <?php
        $querySelect = mysqli_query($koneksi, "SELECT * FROM jumbotron");
        $jumlah = mysqli_num_rows($querySelect);
        $no = 0;
        $active = true; // Inisialisasi variabel active dengan nilai true
        while ($data = mysqli_fetch_array($querySelect)) {
            if ($active) {
        ?>
                <div class="text-center carousel-item active custom-img" style="background-image: url('img/<?= $data['foto'] ?>');">
                    <h2 class="text-capitalize text-white" style="padding-top: 240px"><?= $data['heading1'] ?></h2>
                    <h1 class="text-uppercase py-2 fw-bold text-white"><?= $data['heading2'] ?></h1>
                    <a href="#" class="btn mt-3 text-uppercase" style=" margin-bottom: 210px;"><?= $data['tombol'] ?></a>
                </div>
            <?php
                $active = false; // Set active ke false setelah item pertama ditampilkan
            } else {
            ?>
                <div class="text-center carousel-item custom-img" style="background-image:url('img/<?= $data['foto'] ?>');">
                    <h2 class="text-capitalize text-white" style="padding-top: 240px"><?= $data['heading1'] ?></h2>
                    <h1 class="text-uppercase py-2 fw-bold text-white"><?= $data['heading2'] ?></h1>
                    <a href="#" class="btn mt-3 text-uppercase" style=" margin-bottom: 210px;"><?= $data['tombol'] ?></a>
                </div>
        <?php
            }
            $no++;
        }
        ?>
    </div>

    <a class="carousel-control-prev" href="#header" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#header" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</header>
<!-- akhir header -->