<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=daftar-admin" class="link-secondary">Daftar Admin</a></li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <a href="<?= $url ?>/admin/route-admin.php?msg=add-daftar-admin" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Admin</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM admin");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left"><?=$data['nama_lengkap']?></td>
                                <td align="left"><?=$data['email']?></td>
                                <td align="left"><?=$data['status']?></td>
                                <td align="left">
                                    <?php
                                    if($data['id'] != 1){
                                        ?>
                                        <a href="<?= $url ?>/admin/section/hapus-admin.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <button class="btn btn-sm btn-danger" disabled title="Hapus" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa-solid fa-trash"></i></button>
                                        <?php
                                    }
                                    ?>
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
    