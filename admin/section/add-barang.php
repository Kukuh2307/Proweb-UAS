<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Barang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=koleksibaru" class="link-secondary">Koleksi</a></li>
                <li class="breadcrumb-item active">Tambah Barang</li>
            </ol>
            <form action="section/proses-add-barang.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Barang</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Nama barang-->
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan nama barang" required>
                                    </div>
                                </div>

                                <!-- Kategori-->
                                <div class="mb-3 row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="kategori" id="kategori" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Kategori--</option>
                                            <?php
                                            $querySelect = mysqli_query($koneksi, "SELECT * FROM kategori");
                                            $data = mysqli_fetch_array($querySelect);
                                            while($data = mysqli_fetch_array($querySelect)){
                                                ?>
                                                <option value="<?=$data['nama']?>"><?=$data['nama']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="mb-3 row">
                                    <label for="Rating" class="col-sm-3 col-form-label">Masukkan Rating</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="padding-top:1rem;">
                                        <input type="range" class="form-control-range" id="Rating" name="rating" min="0" max="5" step="1" required>
                                        <span id="ratingValue">0</span>
                                    </div>
                                </div>

                                <!-- harga -->
                                <div class="mb-3 row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom" id="harga" name="harga" style="margin-left: -2.5rem;" placeholder="Masukkan harga barang" required>
                                    </div>
                                </div>

                                <!-- stok -->
                                <div class="mb-3 row">
                                    <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom" id="stok" name="stok" maxlength="5" style="margin-left: -2.5rem;" placeholder="Masukkan stok barang" required>
                                    </div>
                                </div>

                                <!-- deskripsi -->
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control border-1 border-bottom" id="deskripsi" name="deskripsi" style="margin-left: -2.5rem; height:12rem" placeholder="Masukkan deskripsi barang" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="<?= $url ?>/img/default.png" alt="default" class="mb-2" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto dengan type PNG,JPG atau JPEG max 1 MB (370x370)</small>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>