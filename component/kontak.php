<?php
require_once 'config.php';
require_once 'tentang-kami.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 10");
$data = mysqli_fetch_assoc($querySelect);
?>
<!-- kontak -->
<section class="kontak" id="kontak">
    <div class="title text-center py-5">
        <h1 class="position-relative d-inline-block"><?= $data['bagian'] ?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1975.5784619783703!2d111.94294843822716!3d-7.982724775374774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78fc73af172ac7%3A0x885381a4296f3f29!2sUPPKB%20Pojok!5e0!3m2!1sen!2sid!4v1675613775784!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="maps"></iframe>
            </div>
            <div class="col-lg-6">
                <form action="">
                    <div class="form-group">
                        <label for="nama">Masukkan nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Masukkan email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="no-hp">Masukkan no handphone</label>
                        <input type="text" class="form-control" id="no-hp" placeholder="Masukkan no handphone">
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: var(--color1);">Kirim pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- akhir konta -->