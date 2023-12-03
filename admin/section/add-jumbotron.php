<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Jumbotron</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=jumbotron" class="link-secondary">Jumbotron</a></li>
                <li class="breadcrumb-item active">Tambah Jumbotron</li>
            </ol>
            <form action="section/proses-add-jumbotron.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Jumbotron</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Judul-->
                                <div class="mb-3 row">
                                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="judul" name="judul" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Judul" required>
                                    </div>
                                </div>

                                <!-- deskripsi tumbnail-->
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="deskripsi" name="deskripsi" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Deskripsi" required>
                                    </div>
                                </div>

                                <!-- tombol -->
                                <div class="mb-3 row">
                                    <label for="tombol" class="col-sm-3 col-form-label">Tombol</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="tombol" name="tombol" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan teks tombol" required>
                                    </div>
                                </div>
                        </div>
                        <div class="col-4 text-center px-5">
                                <img src="<?=$url?>/img/default.png" alt="default" class="mb-2" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto dengan type PNG,JPG atau JPEG max 1 MB (98x98)</small>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </main>