<?php


if(isset($_SESSION['userid']))
{
    if($_SESSION['role_id']==2){

        // dialihkan ke halaman kasir
        header("location:kasir.php");
    }
} else {
    $_SESSION['error'] = 'Anda harus login terlebih dahulu';
    header('location:login.php');
}
?>