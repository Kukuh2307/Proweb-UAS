<?php
require_once 'config.php';
require_once 'collection.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 3");
$data = mysqli_fetch_assoc($querySelect);
?>
<!-- blog -->
<section id="blog" class="mb-0" style="padding: 3rem 0;">
    <div class="container">
        <div class="title text-center">
            <h1 class="position-relative d-inline-block"><?= $data['bagian'] ?></h1>
        </div>

        <div class="row g-3">
            <?php
            $querySelect = mysqli_query($koneksi, "SELECT * FROM blog ORDER BY id DESC");
            for ($dataCount = 0; $dataCount < 3 && $data = mysqli_fetch_assoc($querySelect); $dataCount++) {
            ?>
                <div class="card border-0 col-md-4 col-lg-3 my-3">
                    <!-- https://source.unsplash.com/640x426?blogs -->
                    <img src="<?= $url ?>/img/<?= $data['foto'] ?>" alt="">
                    <div class="card-body px-0 d-flex flex-column">
                        <h4 class="card-title" style="width: 90%;"><?= $data['judul'] ?></h4>
                        <p class="card-text mt-3 text-muted"><?= $data['tumbnail'] ?></p>
                        <p class="card-text mb-3">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span><?= $data['penulis'] ?>
                            </small>
                        </p>
                        <a href="<?= $url ?>/proses-support.php?msg=detail-artikel&id=<?= $data['id'] ?>" class="p-2 mt-auto">
                            <button>Read More</button>
                        </a>
                    </div>

                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- akhir blog -->