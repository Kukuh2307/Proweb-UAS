<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tentang Kami</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=tentangkami" class="link-secondary">Tentang Kami</a></li>
            </ol>

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM tentangkami");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>
                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left">
                                    <img src="<?= $url ?>/img/<?=$data['foto']?>" alt="tentangkami" width="60" height="60">
                                </td>
                                <td align="left"><?=$data['judul']?></td>
                                <td align="left"><?=$data['deskripsi']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/route-admin.php?msg=edittentangkami&id=<?=$data['id']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-siswa.php?nis=<?=$data['id']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
    