<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Artikel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=blog" class="link-secondary">Artikel</a></li>
                <li class="breadcrumb-item active">Tambah Artikel</li>
            </ol>
            <form action="section/proses-add-artikel.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Artikel</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Judul -->
                                <div class="mb-3 row">
                                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="judul" name="judul" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan judul blog" required>
                                    </div>
                                </div>

                                <!-- tumbnail -->
                                <div class="mb-3 row">
                                    <label for="tumbnail" class="col-sm-3 col-form-label">Tumbnail</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="tumbnail" name="tumbnail" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan tumbnail blog" required>
                                    </div>
                                </div>

                                <!-- Penulis -->
                                <div class="mb-3 row">
                                    <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="penulis" name="penulis" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan nama penulis" required>
                                    </div>
                                </div>

                                <!-- Isi -->
                                <div class="mb-3 row">
                                    <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <textarea class="form-control border-1 border-bottom" id="summernote" name="isi" placeholder="Masukkan isi blog" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="<?= $url ?>/img/default.png" alt="default" class="mb-2" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto dengan tipe PNG, JPG, atau JPEG dengan ukuran maksimal 1 MB</small>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>