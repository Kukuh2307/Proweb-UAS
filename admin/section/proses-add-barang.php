    <?php
require_once("../../config.php");
session_start();

$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$rating = $_POST['rating'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$foto = $_FILES['image'];

// cek foto
if ($foto['name'] != '') {
    $foto = handleImageUpload($foto);
} else {
    $foto = 'default.png';
}

if (isset($_POST['simpan'])) {
    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO barang(foto, nama, kategori,rating,deskripsi,harga,stok) VALUES ('$foto','$nama','$kategori','$rating','$deskripsi','$harga','$stok')");
    if (!$insertData) {
        $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
    } else {
        $_SESSION['msg'] = "Data jumbotron berhasil ditambahkan.";
    }
} elseif (isset($_POST['update'])) {
    if ($id != '') {
        // update data
        $updateData = mysqli_query($koneksi, "UPDATE barang SET 
        foto='$foto',
        nama='$nama',
        kategori='$kategori',
        rating='$rating',
        deskripsi='$deskripsi',
        harga='$harga',
        stok='$stok'
        WHERE id='$id'
        ");
        if (!$updateData) {
            $_SESSION['msg'] = "Error: " . mysqli_error($koneksi);
        } else {
            $_SESSION['msg'] = "Data jumbotron berhasil diupdate.";
        }
    }
}


header("location:" . $url . "/admin/route-admin.php?msg=koleksibaru");
