<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$barang = mysqli_query($dbconnect,"SELECT * FROM barang");

$sum = 0;
if(isset($_SESSION['cart']))
{
    foreach ($_SESSION['cart'] as $key => $value){
        $sum += $value['harga']*$value['qty'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" 
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Kasir</h1>
                <h2>Hai <?=$_SESSION['nama']?></h2>
                <a href="logout.php">Logout</a> | <a href="keranjang_reset.php">Reset Keranjang</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="Keranjang_act.php" class="form-inline">
                <div class="input-group">
                        <select class="form-control" name="id_barang">
                            <option value="">Pilih Barang</option>
                                <?php while ($row = mysqli_fetch_array($barang)) { ?>
                                    <option value="<?=$row['id_barang']?>"><?=$row['nama']?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <input type="number" name="qty" class="form-control" placeholder="Jumlah">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </span>
                    </div>
                </form>
                <br>
                <form method="POST" action="keranjang_update.php">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Barang</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Sub Total</td>
                        <td></td>
                    </tr>
                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                        <tr>
                            <td><?=$value['nama']?></td>
                            <td align="right"><?=number_format($value['harga'])?></td>
                            <td class="col-md-2"><input type="number" name="qty" value="<?=$value['qty']?>"
                            class="form-control"></td>
                            <td align="right"><?=number_format($value['qty']*$value['harga'])?></td>

                            <td><a href="keranjang_hapus.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Total Rp. <?=number_format($sum)?></h3>
            </div>
        </div>
    </div>
</body>
</html>