<?php
include 'config.php';
session_start();

if (isset($_POST['simpan'])){
    $nama = $_POST['nama'];

    //menyimpan kedalam database
    mysqli_query($dbconnect, "INSERT INTO role VALUES ('', '$nama')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    // mengalihkan halaman ke list barang
    header("location:role.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Role</h1>
        <form method="POST">
            <div class="form-grup">
                <label>Nama Role</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Role">
            </div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
            <a href="role.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>