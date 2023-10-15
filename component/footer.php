<?php
require_once 'config.php';
// require_once 'kontak.php';
?>
<!-- footer -->
<footer class="footer" style="background-color: var(--color1);">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed ipsum vel turpis
                    venenatis congue.</p>
            </div>
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li>Alamat : Jln.Jembatan Timbang Pojok,Ngantru Kab.Tulungagung</li>
                    <li>Email: Kisawa@gmail.com</li>
                    <li>Phone: +1234567890</li>
                </ul>
            </div>
            <div class="col-md-4 custom-footer">
                <h5>Follow Us</h5>
                <ul class="list-inline social-icons">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col text-center">
                <p>&copy; 2023 Kisawa. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Mengisi pilihan ekspedisi saat halaman dimuat
        $.ajax({
            type: 'post',
            url: 'jasaekspedisi.php',
            success: function(hasil_ekspedisi) {
                $("#ekspedisi").html(hasil_ekspedisi);
            }
        });

        // Mengisi pilihan paket saat ekspedisi dipilih
        $("select[name=ekspedisi]").on("change", function() {
            var id_ekspedisi_terpilih = $(this).val();
            var kabupaten = $("select[name=distrik]").val();
            $.ajax({
                type: 'post',
                url: 'datapaket.php',
                data: {
                    ekspedisi: id_ekspedisi_terpilih,
                    distrik: kabupaten
                }, // Menggunakan objek untuk mengirim data
                success: function(hasil_paket) {
                    $("#paket").html(hasil_paket);
                }
            });
        });

        // Menghitung total ongkir saat paket dipilih
        $("#paket").on("change", function() {
            var ongkir = $(this).find(":selected").attr("ongkir");
            var totalBelanja = <?= $totalBelanja ?>;
            var grandTotal = parseInt(ongkir) + parseInt(totalBelanja);
            $("#grand-total").text(grandTotal);
        });
    });
</script>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>\
<script src="http://localhost/PrakwebUas/js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://localhost/PrakwebUas/js/checkout.js"></script>

</body>

</html>