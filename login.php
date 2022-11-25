<?php

include 'config.php';
session_start();

if(isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

    // mendapatkan hasil data
    $data = mysqli_fetch_assoc($query);

    // mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);

    if (!$check){
        $_SESSION['error'] = 'Username atau Password salah';
    } else{
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];

        header("location:index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>

        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['error']?>
        </div>
    <?php 
        }
        $_SESSION['error'] = '';
    ?>

        <h1>Login</h1>
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <input type="submit" name="masuk" value="Masuk" class="btn btn-default">
        </form>
    </div>
</body>
</html>