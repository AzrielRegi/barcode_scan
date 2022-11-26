<?php
include 'config.php';
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id'");
    $data = mysqli_fetch_array($data);
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];

    // menyimpan ke database
    mysqli_query($dbconnect, "UPDATE role SET nama='$nama' where id_role='$id' ");

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
    <title>Edit Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui Role</h1>
        <form method="POST">
            <div class="form-grup">
                <label>Nama Role</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Role" 
                value="<?=$data['nama']?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="role.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>