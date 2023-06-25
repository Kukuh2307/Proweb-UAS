<?php
session_start();
require_once 'config.php';
require_once '../PrakwebUas/component/navbar.php';

$user = $_SESSION['Username'];
?>
<section id="keranjang" style="margin-bottom: 0px;">
    <div class="container" style="margin-top: 4rem;">
        <table class="table table-striped table">
            <thead>
                <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Banyak</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // query Select User
                $no = 1;
                $querySelect = mysqli_query($koneksi, "SELECT barang.nama AS nama_barang, keranjang.banyak, barang.harga, (barang.harga * keranjang.banyak) AS total
                FROM keranjang
                JOIN barang ON keranjang.id_barang = barang.id
                JOIN pengguna ON keranjang.id_user = pengguna.id
                WHERE pengguna.nama_depan = '$user'");    
                if ($querySelect) {
                    while ($data = mysqli_fetch_array($querySelect)) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td align="left"><?= $data['nama_barang'] ?></td>
                            <td align="left"><?= $data['banyak'] ?></td>
                            <td align="left"><?= number_format($data['harga']) ?></td>
                            <td align="left"><?= number_format($data['total']) ?></td>
                            <td align="left">
                                <a href="<?= $url ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "gagal";
                }
                ?>

            </tbody>
        </table>
    </div>
</section>