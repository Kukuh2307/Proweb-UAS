<?php
$koneksi = new mysqli("localhost", "root", "", "db_prakwebuas");
$url = "http://localhost/PrakwebUas";

function handleImageUpload($file)
{
    global $url;
    $allowedFormats = array('jpg', 'jpeg', 'png');
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/PrakwebUas/img/';

    // Mengambil informasi file yang diupload
    $fileName = $file['name'];
    $fileTemp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Memeriksa apakah tidak ada error saat upload
    if ($fileError === UPLOAD_ERR_OK) {
        // Memeriksa format file
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (in_array($fileExt, $allowedFormats)) {
            // Memeriksa ukuran file (contoh: maksimal 3MB)
            if ($fileSize <= 3 * 1024 * 1024) {
                // Membuat nama unik untuk file gambar
                $newFileName = uniqid('image_') . '.' . $fileExt;
                $destination = $uploadDirectory . $newFileName;

                // Memindahkan file gambar ke direktori tujuan
                if (move_uploaded_file($fileTemp, $destination)) {
                    // Return nama file gambar yang berhasil diupload
                    return $newFileName;
                } else {
                    return 'Error: Failed to move uploaded file.';
                }
            } else {
                return 'Error: File size exceeds the limit (3MB).';
            }
        } else {
            return 'Error: Invalid file format. Only JPG, JPEG, and PNG files are allowed.';
        }
    } else {
        return 'Error: Failed to upload file. Error code: ' . $fileError;
    }
}