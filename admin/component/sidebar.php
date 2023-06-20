<link rel="stylesheet" href="">
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion bg-primary text-white" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link text-white hoverNav hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=dashboard">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Dashboard
                    </a>    
                    <a class="nav-link text-white hoverNav hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=daftar-admin">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Daftar Admin
                    </a>    
                    <a class="nav-link text-white hoverNav hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=daftar-user">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                        Daftar User
                    </a>    
                    <a class="nav-link text-white hoverNav hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=dashboard">
                        <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-money-bill-wave"></i></div>
                        Daftar Transaksi
                    </a>    

                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <!-- Indikator -->
                    <a class="nav-link collapsed text-white hoverNav" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon hoverNav"><i class="fa-solid fa-file-pen"></i></div>
                        Edit Landing Page
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=jumbotron">Jumbotron</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=koleksibaru">Barang</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=blog">Artikel</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=mitra">Mitra</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=tentangkami">Tentang Kami</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=informasidanpengiriman">Informasi Pengiriman</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=kebijakanpribadi">Kebijakan Pribadi</a>
                            <a class="nav-link text-white hoverNav" href="<?= $url ?>/admin/route-admin.php?msg=syaratdanketentuan">Syarat dan Ketentuan</a>
                    </div>

                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?= $_SESSION['Username'] ?>
            </div>
        </nav>
    </div>