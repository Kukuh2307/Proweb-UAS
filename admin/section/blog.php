<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Artikel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=blog" class="link-secondary">Artikel</a></li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <a href="<?= $url ?>/admin/route-admin.php?msg=addartikel" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Artikel</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Judul</center></th>
                                <th scope="col"><center>Isi</center></th>
                                <th scope="col"><center>Penulis</center></th>
                                <th scope="col"><center>Tumbnail</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM blog");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left"><?=$data['judul']?></td>
                                <td align="left"><?=$data['isi']?></td>
                                <td align="left"><?=$data['penulis']?></td>
                                <td align="left"><?=$data['tumbnail']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/route-admin.php?msg=editartikel&id=<?=$data['id']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="<?= $url ?>/admin/section/hapus-artikel.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
    