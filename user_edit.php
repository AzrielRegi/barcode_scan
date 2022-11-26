<?php
include 'config.php';
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM user where id_user='$id'");
    $data = mysqli_fetch_array($data);
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    // menyimpan ke database
    mysqli_query($dbconnect, "UPDATE user SET nama='$nama', username='$username', password='$password',
    role_id='$role_id' where id_user='$id' ");

    // mengalihkan halaman ke list barang
    header("location:user.php");
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
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" 
                value="<?=$data['nama']?>">
            </div>
            <div class="form-grup">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" 
                value="<?=$data['username']?>">
            </div>
            <div class="form-grup">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" 
                 value="<?=$data['password']?>">
            </div>
            <div class="form-grup">
                <label>Role Akses</label>
                <select name="role_id" class="form-control">
                    <option value="">Pilih Role Akses</option>
                        <?php while($row = mysqli_fetch_array($role)) {?>
                            <option value="<?=$row['id_role']?>" <?=$row['id_role']==$data['role_id']?'selected':''?> >
                            <?=$row['nama']?></option>
                            <?php }?>
                </select>
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>