<?php
session_start();
session_unset();
$_SESSION = [];
require_once("../config.php");
if(isset($_GET['role'])){
    header("location:login.php");
} else{
    header("location:$url");
}
exit;
?>