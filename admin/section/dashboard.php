<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
            </ol>

            <main>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#0A6EBD   ;">
                                <div class="card-body">Daftar Pengguna</div>
                                <?php
                                $querySelectPengguna = mysqli_query($koneksi, "SELECT * FROM pengguna");
                                $jumlahPengguna = mysqli_num_rows($querySelectPengguna);
                                ?>
                                <h3 class="p-4"><?= $jumlahPengguna ?> Orang</h3>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= $url ?>/admin/route-admin.php?msg=daftar-user">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#F2BE22;">
                                <div class="card-body">Daftar Admin</div>
                                <?php
                                $querySelectAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
                                $jumlahAdmin = mysqli_num_rows($querySelectAdmin);
                                ?>
                                <h3 class="p-4"><?= $jumlahAdmin ?> Orang</h3>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= $url ?>/admin/route-admin.php?msg=daftar-admin">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Daftar Barang</div>
                                <?php
                                $querySelectBarang = mysqli_query($koneksi, "SELECT * FROM barang");
                                $jumlahBarang = mysqli_num_rows($querySelectBarang);
                                ?>
                                <h3 class="p-4"><?= $jumlahBarang ?> Buah</h3>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= $url ?>/admin/route-admin.php?msg=koleksibaru">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Daftar Transaksi</div>
                                <?php
                                $querySelectCheckout = mysqli_query($koneksi, "SELECT * FROM checkout");
                                $jumlahTransaksi = mysqli_num_rows($querySelectCheckout);
                                ?>
                                <h3 class="p-4"><?= $jumlahTransaksi ?> Transaksi</h3>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Barang yang habis stok
                                </div>
                                <div class="card-body">
                                    <?php
                                    $querySelectStok = mysqli_query($koneksi, "SELECT * FROM barang WHERE stok < 0 OR stok = 0");
                                    $jumlahStok = mysqli_num_rows($querySelectStok);
                                    ?>
                                    <h3 class="p-3"><?= $jumlahStok ?> Buah</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Total Income
                                </div>
                                <div class="card-body">
                                    <?php
                                    $querySelectIncome = mysqli_query($koneksi, "SELECT SUM(subtotal) as income FROM checkout");
                                    $dataTotalIncome = mysqli_fetch_assoc($querySelectIncome);
                                    $totalIncome = $dataTotalIncome['income'];

                                    $formattedIncome = number_format($totalIncome, 0, ',', '.');

                                    echo "<h3 class=\"p-3\">Rp. $formattedIncome,.</h3>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Proses Transaksi
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Barang</th>
                                        <th>Banyak</th>
                                        <th>Provinsi</th>
                                        <th>Distrik</th>
                                        <th>Metode</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Barang</th>
                                        <th>Banyak</th>
                                        <th>Harga Barang</th>
                                        <th>Provinsi</th>
                                        <th>Distrik</th>
                                        <th>Metode</th>
                                        <th>Waktu</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $no = 1;
                                $querySelect = mysqli_query($koneksi, "SELECT p.nama_depan AS nama_user, b.nama AS nama_barang, ctd.banyak, cb.provinsi, cb.distrik, cb.metode, cb.waktu
                                FROM checkout_detail ctd
                                JOIN checkout cb ON ctd.id_checkout = cb.id
                                JOIN pengguna p ON cb.id_user = p.id
                                JOIN barang b ON ctd.id_barang = b.id ORDER BY cb.waktu DESC");

                                    if ($querySelect) {
                                        while ($data = mysqli_fetch_array($querySelect)) {
                                            $nama_user = $data['nama_user'];
                                            $barang = $data['nama_barang'];
                                            $banyak = $data['banyak'];
                                            $provinsi = $data['provinsi'];
                                            $distrik = $data['distrik'];
                                            $metode = $data['metode'];
                                            $waktu = $data['waktu'];
                                    ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $nama_user ?></td>
                                                <td><?= $barang ?></td>
                                                <td><?= $banyak ?></td>
                                                <td><?= $provinsi ?></td>
                                                <td><?= $distrik ?></td>
                                                <td><?= $metode ?></td>
                                                <td><?= $waktu ?></td>
                                            </tr>
                                    <?php
                                            $no++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </main>