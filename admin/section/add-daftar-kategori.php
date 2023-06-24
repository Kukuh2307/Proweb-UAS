<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Kategori Barang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=daftar-kategori-barang" class="link-secondary">Daftar Kategori</a></li>
                <li class="breadcrumb-item active">Tambah Kategori Barang</li>
            </ol>
            <form action="section/proses-add-kategori.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Kategori</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Nama Kategori-->
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Kategori</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="30" style="margin-left: -2.5rem;" placeholder="Masukkan nama kategori" required>
                                    </div>
                                </div>

                                <!-- deskripsi -->
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                    <textarea class="form-control border-1 border-bottom" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi kategori" style="height: 12rem;" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>