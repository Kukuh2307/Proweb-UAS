<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Jumbotron</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=jumbotron" class="link-secondary">Jumbotron</a></li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <a href="<?= $url ?>/admin/route-admin.php?msg=addjumbotron" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Jumbotron</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Judul</center></th>
                                <th scope="col"><center>Deskripsi</center></th>
                                <th scope="col"><center>Tombol</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM jumbotron");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left"><?=$data['heading1']?></td>
                                <td align="left"><?=$data['heading2']?></td>
                                <td align="left"><?=$data['tombol']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/route-admin.php?msg=editjumbotron&id=<?=$data['id']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-jumbotron.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
    