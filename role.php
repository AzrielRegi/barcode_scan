<?php
include 'config.php';
session_start();

$view = $dbconnect->query("SELECT * FROM role");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <?php if(isset($_SESSION['success'])  && $_SESSION['success'] != ''){?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION['success']?>
        </div>
        <?php 
            } 
            $_SESSION['success'] = '';
        ?>

        <h1>List Role</h1>
        <a href="role_add.php" class="btn btn-primary">Tambah Role</a>
        <table class="table table-bordered">
            <tr>
                <th>ID Role</th>
                <th>Nama Role</th>
                <th>Aksi</th>
            </tr>

            <?php
            while ($row = $view->fetch_array()){
            ?>

            <tr>
                <td><?= $row['id_role']?></td>
                <td><?= $row['nama']?></td>
                <td>
                    <a href="role_edit.php?id=<?= $row['id_role']?>">Edit</a> | 
                    <a href="role_hapus.php?id=<?= $row['id_role']?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>