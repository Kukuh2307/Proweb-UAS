<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=dashboard" class="link-secondary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= $url ?>/admin/route-admin.php?msg=daftar-admin" class="link-secondary">Daftar Admin</a></li>
                <li class="breadcrumb-item active">Tambah Admin</li>
            </ol>
            <form action="<?= $url ?>/auth/proses-tambah-admin.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Admin</span>
                        <button type="submit" name="regist" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Nama Deppan-->
                                <div class="mb-3 row">
                                    <label for="namaDepan" class="col-sm-3 col-form-label">Nama Depan</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="namaDepan" name="namaDepan" maxlength="30" style="margin-left: -2.5rem;" placeholder="Masukkan nama depan anda" required>
                                    </div>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="namaLengkap" name="namaLengkap" maxlength="300" style="margin-left: -2.5rem;" placeholder="Masukkan nama lengkap anda" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="mail" class="col-sm-3 col-form-label">Email</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="mail" name="email" maxlength="300" style="margin-left: -2.5rem;" placeholder="Masukkan alamat email anda" required>
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-3 col-form-label">status</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="status" name="status" maxlength="300" style="margin-left: -2.5rem;" placeholder="Masukkan status admin" required>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control border-0 border-bottom" id="password" name="password" maxlength="300" style="margin-left: -2.5rem;" placeholder="Masukkan password anda" required>
                                    </div>
                                </div>

                                <!-- re-password -->
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-3 col-form-label">Re-Password</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control border-0 border-bottom" id="repassword" name="repassword" maxlength="300" style="margin-left: -2.5rem;" placeholder="Ulangi password untuk konfirmasi" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>