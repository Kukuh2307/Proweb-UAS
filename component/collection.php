<?php
require_once 'config.php';
require_once 'jumbotron.php';
$querySelect = mysqli_query($koneksi, "SELECT * FROM section WHERE id = 2");
$data = mysqli_fetch_assoc($querySelect);
?>    
    <!-- collection -->
    <section id="collection" class="mb-0">
        <div class="container">
            <div class="title text-center py-5">
                <h1 class="position-relative d-inline-block"><?=$data['bagian']?></h1>
            </div>
            <div class="collection-list mt-4 row gx-0 gy-3">
                <?php
                $querySelect = mysqli_query($koneksi, "SELECT * FROM barang");
                while($data = mysqli_fetch_assoc($querySelect)){
                    $rating = $data['rating'];
                    ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                    <div class="collection-img position-relative">
                        <!-- https://source.unsplash.com/370x370?tablet -->
                        <img src="<?=$url?>/img/<?=$data['foto']?>.jpeg" class="w-100">
                        <span
                            class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                    </div>
                    <div class="text-center">
                        <div class="rating mt-3">
                            <?php
                            for($i=0;$i<$rating;$i++){
                                ?>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <?php
                            }
                            ?>
                        </div>
                        <p class="text-capitalize my-1"><?=$data['nama']?></p>
                        <span class="fw-bold">Rp.<?=number_format($data['harga'])?>,.-</span>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>
    <!-- akhir collection -->