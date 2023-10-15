<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Kategori Barang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=daftar-kategori-barang" class="link-secondary">Daftar Kategori Barang</a></li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <a href="<?= $url ?>/admin/route-admin.php?msg=add-daftar-kategori" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>    
                                <th scope="col">No.</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySelect = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while($data = mysqli_fetch_array($querySelect)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="left"><?=$data['nama']?></td>
                                <td align="left">
                                    <a href="<?= $url ?>/admin/section/hapus-kategori.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
    