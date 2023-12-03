<?php
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $querySelect = mysqli_query($koneksi, "SELECT * FROM blog WHERE id='$id'");
    $data = mysqli_fetch_assoc($querySelect);
}
?>
<section id="detail-barang" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 6rem; text-align: justify;">
    <div class="row">
        <div class="col-md-8 mx-auto">
        <img src="img/<?= $data['foto'] ?>" alt="Product Image" class="img-fluid">
            <div class="my-4">
                <p class="text-black-50">Author: <?= $data['penulis'] ?></p>
                <h3><?= $data['judul'] ?></h3>
                <p><?= $data['isi'] ?></p>
            </div>
        </div>
    </div>
    </div>
</section>
