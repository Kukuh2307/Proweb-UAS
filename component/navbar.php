<?php
session_start();
// cek session
if(!isset($_SESSION['Login'])){
    $keterangan = "";
    $tombol = '<a class="btn btn-primary" href="'.$url.'/auth/login.php"><i class="fa-solid fa-user"></i> Masuk / Daftar</a>';
} else {
    $namaPengguna = isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; // Menyimpan nama pengguna dari session
    $keterangan = '<a class="btn btn-primary m-1" href="#"><i class="fa-solid fa-user"></i> ' . $namaPengguna . '</a>';
    $tombol = '<a href="' . $url . '/auth/proses-logout.php" class="btn btn-danger">Logout</a>';
}

require_once 'config.php';
require_once 'header.php';
?>

<body>
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
                    <li class="nav-item">
                        <a class="btn btn-link" href="#"><i class="fa-regular fa-cart-shopping"></i><span
                                class="badge badge-danger">3</span></a>
                    </li>
                </ul>

                <div class="collapse navbar-collapse">
                    <form class="form-inline my-2 my-lg-0 mx-auto">
                        <input class="form-control" type="search" placeholder="Cari barang..." aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-link" href="#"><i class="fa-solid fa-cart-shopping"></i> <span
                                    class="badge badge-danger">0</span></a>
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
                            <a class="nav-link" href="index.php#blog" onclick="handleMenuClick(this)">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#mitra" onclick="handleMenuClick(this)">Mitra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$url?>/proses-support.php?msg=barang" onclick="handleMenuClick(this)">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#tentang-kami" onclick="handleMenuClick(this)">Tentang Kami</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Support
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=$url?>/proses-support.php?msg=informasi-pengiriman">Informasi Pengiriman</a>
                                <a class="dropdown-item" href="<?=$url?>/proses-support.php?msg=privacy-policy">Kebijakan pribadi</a>
                                <a class="dropdown-item" href="<?=$url?>/proses-support.php?msg=term-and-condition">Syarat dan ketentuan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#kontak" onclick="handleMenuClick(this)">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="search-bar d-block d-md-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="form-inline mb-3 mx-auto">
                            <input class="form-control" type="search" placeholder="Search for products..."
                                aria-label="Search">
                            <button class="btn btn-success" type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-10 pl-0">
                            <a class="btn btn-primary" href="#"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
                        </div>

                        <div class="col-2 text-left">
                            <button type="button" id="sidebarCollapseX" class="btn btn-link">
                                <i class="bx bx-x icon-single"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="list-unstyled components links">
                <li class="active">
                    <a href="#"><i class="bx bx-home mr-3"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="bx bx-help-circle mr-3"></i>
                        Support</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Delivery Information</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
                </li>
            </ul>

            <h6 class="text-uppercase mb-1">Categories</h6>
            <ul class="list-unstyled components mb-3">
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 1</a>
                </li>
            </ul>

            <ul class="social-icons">
                <li><a href="#" target="_blank" title=""><i class="bx bxl-facebook-square"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-twitter"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li>
                <li><a href="#" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
            </ul>
        </nav>
    </nav>
    <!-- akhir navbar -->