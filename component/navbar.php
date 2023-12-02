<?php
session_start();
// cek session
if (!isset($_SESSION['Login'])) {
    $keterangan = "";
    $tombol = '<a class="btn btn-primary" href="' . $url . '/auth/login.php" style="background-color:#008744; color:white ><i class="fa-solid fa-user"></i> Masuk / Daftar</a>';
    $user = "";
    $dataKeranjang = "";
    $daftarTransaksi = "";
} else {
    $namaPengguna = isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; // Menyimpan nama pengguna dari session
    $keterangan = '<a class="btn m-1" href="#" style="color: var(--color1); border: 2px solid var(--color1);"><i class="fa-solid fa-user"></i> ' . $namaPengguna . '</a>';
    $tombol = '<a href="' . $url . '/auth/proses-logout.php" class="btn btn-danger">Logout</a>';
    $user = $_SESSION['Username'];
    $daftarTransaksi = '<li class="nav-item">
    <a class="nav-link" href="' . $url . '/proses-support.php?msg=daftar-transaksi" onclick="handleMenuClick(this)">Daftar Transaksi</a>
    </li>';

    // query keranjang
    // cek user
    $querySelectUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_depan='$user'");
    $dataUser = mysqli_fetch_array($querySelectUser);
    $idUser = $dataUser['id'];


    $querySelect = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user=$idUser");
    $dataKeranjang = mysqli_num_rows($querySelect);
}

require_once 'config.php';
require_once 'header.php';
?>

<body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alertBox = document.getElementById('errorAlert');
            if (alertBox) {
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 3000);
            }

            var alertBox2 = document.getElementById('errorAlert2');
            if (alertBox2) {
                setTimeout(function() {
                    alertBox2.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <!-- navbar -->
    <nav class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
            <div class="container">
                <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <a class="navbar-brand" href="#">
                    <h4 class="font-weight-bold">KISAWA</h4>
                </a>

                <ul class="navbar-nav ml-auto d-block d-md-none">
                    <!-- <li class="nav-item">
                        <a class="btn btn-link" href="#"><i class="fa-regular fa-cart-shopping"></i><span
                                class="badge badge-danger">3</span></a>
                    </li> -->
                </ul>

                <div class="collapse navbar-collapse">
                    <form class="form-inline my-2 my-lg-0 mx-auto" action="proses-searching.php" method="post">
                        <input class="form-control" type="search" placeholder="Cari barang..." aria-label="Search" name="searching">
                        <button class="btn my-2 my-sm-0" style="background-color:#008744; color:white" type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-link" href="<?= $url ?>/proses-support.php?msg=keranjang">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check-fill svg-icon" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                                <span class="badge badge-danger"><?= $dataKeranjang ?></span></a>
                        </li>

                        <li class="nav-item ml-md-3">
                            <?php
                            echo $keterangan;
                            echo $tombol;
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Submenu -->
        <nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#" onclick="handleMenuClick(this)">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#collection" onclick="handleMenuClick(this)">Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url ?>/proses-support.php?msg=barang" onclick="handleMenuClick(this)">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#blog" onclick="handleMenuClick(this)">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#mitra" onclick="handleMenuClick(this)">Mitra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#tentang-kami" onclick="handleMenuClick(this)">Tentang Kami</a>
                        </li>
                        <?= $daftarTransaksi ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Support
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=informasi-pengiriman">Informasi Pengiriman</a>
                                <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=privacy-policy">Kebijakan pribadi</a>
                                <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=term-and-condition">Syarat dan ketentuan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#kontak" onclick="handleMenuClick(this)">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-10 pl-0">
                            <a class="btn" style="background-color: #008744; color: white;" href="#"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
                        </div>

                        <div class="col-2 text-left">
                            <button type="button" id="sidebarCollapseX" class="btn btn-link">
                                <i class="fa-solid fa-times"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <ul class="list-unstyled components links tew">
                <li class="nav-item">
                    <a class="nav-link" href="index.php#" onclick="handleMenuClick(this)">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#collection" onclick="handleMenuClick(this)">Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#blog" onclick="handleMenuClick(this)">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#mitra" onclick="handleMenuClick(this)">Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#tentang-kami" onclick="handleMenuClick(this)">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $url ?>/proses-support.php?msg=barang" onclick="handleMenuClick(this)">Barang</a>
                </li>
                <?= $daftarTransaksi ?>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-help-circle mr-3"></i>
                        Support</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=informasi-pengiriman">Informasi Pengiriman</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=privacy-policy">Kebijakan pribadi</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="<?= $url ?>/proses-support.php?msg=term-and-condition">Syarat dan ketentuan</a>
                        </li>
                    </ul>
                </li>
                <li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#kontak" onclick="handleMenuClick(this)">Kontak</a>
                </li>
                </li>
            </ul>

            <!-- <h6 class="text-uppercase mb-1">Categories</h6>
            <ul class="list-unstyled components mb-3">
                <li>
                    <a href="#">Category 1</a>
                </li>
            </ul> -->

            <ul class="social-icons">
                <li><a href="#" target="_blank" title=""><i class="bx bxl-facebook-square"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-twitter"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
            </ul>
        </nav>
    </nav>
    <!-- akhir navbar -->