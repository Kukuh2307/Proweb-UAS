<?php
if (isset($_GET['id'])) {
    // ambil data di database
    $id = $_GET['id'];
    $querySelect = mysqli_query($koneksi, "SELECT * FROM tentangkami WHERE id='$id'");
    $data = mysqli_fetch_array($querySelect);
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Tentang Kami</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=blog " class="link-secondary">Tentang Kami</a></li>
                <li class="breadcrumb-item active">Edit Tentang Kami</li>
            </ol>
            <form action="section/proses-edit-tentangkami.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Edit Tentang Kami</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- ID -->
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <!-- Judul -->
                                <div class="mb-3 row">
                                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="judul" name="judul" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan judul blog" value="<?= $data['judul'] ?>" required>
                                    </div>
                                </div>

                                <!-- deskripsi -->
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;"  >
                                    <textarea class="form-control border-1 border-bottom" id="summernote" name="deskripsi" placeholder="Masukkan isi blog" style="height: 12rem;" required><?= $data['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <?php
                                if ($data['foto'] == '') {
                                    $gambar = "default.png";
                                } else {
                                    $gambar = $data['foto'];
                                    if (file_exists("img/" . $gambar)) {
                                        // File gambar ada dalam folder img, tampilkan gambar
                                        $image = $gambar;
                                    } else {
                                        // File gambar tidak ada dalam folder img, tampilkan gambar default.png
                                        $image = "default.png";
                                    }
                                }
                                $image = $gambar;
                                ?>
                                <img src="<?= $url ?>/img/<?= $image ?>" alt="foto" class="mb-2" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto dengan tipe PNG, JPG, atau JPEG dengan ukuran maksimal 1 MB</small>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>