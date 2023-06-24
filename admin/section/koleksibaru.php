<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Koleksi Baru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=koleksibaru" class="link-secondary">Koleksi</a></li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <a href="<?= $url ?>/admin/route-admin.php?msg=addbarang" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Barang</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Foto</center></th>
                                <th scope="col"><center>Nama</center></th>
                                <th scope="col"><center>Kategori</center></th>
                                <th scope="col"><center>Rating</center></th>
                                <th scope="col"><center>Deskripsi</center></th>
                                <th scope="col"><center>Harga</center></th>
                                <th scope="col"><center>Stok</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM barang");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left">
                                    <img src="<?= $url ?>/img/<?=$data['foto']?>" alt="barang" width="60" height="60">
                                </td>
                                <td align="left"><?=$data['nama']?></td>
                                <td align="left"><?=$data['kategori']?></td>
                                <td align="left"><?=$data['rating']?></td>
                                <td align="left"><?=$data['deskripsi']?></td>
                                <td align="left"><?=$data['harga']?></td>
                                <td align="left"><?=$data['stok']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/route-admin.php?msg=editbarang&id=<?=$data['id']?>&kategori=<?=$data['kategori']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="<?= $url ?>/admin/section/hapus-barang.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    