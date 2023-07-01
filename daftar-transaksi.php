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
                    <th scope="col">Sub Total</th>
                    <th scope="col">Metode</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // query Select User
                $no = 1;
                $querySelect = mysqli_query($koneksi, "SELECT * FROM checkout
                JOIN pengguna ON checkout.id_user = pengguna.id
                WHERE pengguna.nama_depan = '$user'");
                if ($querySelect) {
                    while ($data = mysqli_fetch_array($querySelect)) {
                        $id = $data['id'];
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $no++ ?>
                            </th>
                            <td align="left">
                                <?= number_format($data['subtotal']) ?>
                            </td>
                            <td align="left">
                                <?= $data['metode'] ?>
                            </td>
                            <td align="left">
                                <?= $data['paket'] ?>
                            </td>
                            <td align="left">
                                <?= $data['waktu'] ?>
                            </td>
                            <td align="left">
                                <a href="<?= $url ?>/proses-support.php?msg=detail-transaksi&id=<?=$id?>" >
                                    <p style="background-color:#008744; color:white; text-align: center; width: 4rem; margin-top: 0.2rem;">Sukses</p>
                                </a>

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