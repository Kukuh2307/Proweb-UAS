<?php
if (isset($_GET['id'])) {
    // ambil data di database
    $id = $_GET['id'];
    $querySelect = mysqli_query($koneksi, "SELECT * FROM kebijakanpribadi WHERE id='$id'");
    $data = mysqli_fetch_array($querySelect);
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Kebijakan Pribadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=kebijakanpribadi " class="link-secondary">Kebijakan Pribadi</a></li>
                <li class="breadcrumb-item active">Edit Kebijakan Pribadi</li>
            </ol>
            <form action="section/proses-edit-kebijakanpribadi.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Edit Kebijakan Pribadi</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- ID -->
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                <!-- deskripsi -->
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;"  >
                                    <textarea class="form-control border-1 border-bottom" id="summernote" name="deskripsi" placeholder="Masukkan isi blog" style="height: 12rem;" required><?= $data['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>