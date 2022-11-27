<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM barang where id_barang='$id'");
    $data = mysqli_fetch_array($data);
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // menyimpan ke database
    mysqli_query($dbconnect, "UPDATE barang SET nama='$nama', harga='$harga', jumlah='$jumlah' where id_barang='$id' ");

    // mengalihkan halaman ke list barang
    header("location:barang.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui Barang</h1>
        <form method="POST">
            <div class="form-grup">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" 
                value="<?=$data['nama']?>">
            </div>
            <div class="form-grup">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga Barang" 
                value="<?=$data['harga']?>">
            </div>
            <div class="form-grup">
                <label>Stock</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Stock Barang" 
                 value="<?=$data['jumlah']?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>