<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kebijakan Pribadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=kebijakanpribadi" class="link-secondary">Kebijakan Pribadi</a></li>
            </ol>

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Deskripsi</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM kebijakanpribadi");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>
                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left"><?=$data['deskripsi']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/route-admin.php?msg=editkebijakanpribadi&id=<?=$data['id']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
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
    