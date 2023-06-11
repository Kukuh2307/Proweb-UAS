<?php
require_once("../config.php");


// ketika tombol login di tekan
if(isset($_POST['login'])){
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    // cek username
    $cekuser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$username'");
    if(mysqli_num_rows($cekuser) == 1){
        $row = mysqli_fetch_array($cekuser);
        if($password == $row['password']){
            $name = $row['nama'];
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $name;
            if($row['status'] == 'admin' ){
                header("location:../admin/index.php?msg=sucess");
            } elseif($row['status'] == 'user'){
                header("location:../index.php?msg=succes");
                exit;
            }
        } else{
            header("location:../auth/login.php?msg=falsepassword");
        }
    } else {
        header("location:../auth/login.php?msg=usernotfound");
    }
}
?>