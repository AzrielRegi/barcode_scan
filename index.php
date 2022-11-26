<?php
session_start();


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<style>
    .container{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; 
    }
</style>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <a href="barang.php">Barang</a> | <a href="role.php">Role</a> | <a href="user.php">User</a> | 
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>