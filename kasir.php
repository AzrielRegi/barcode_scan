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
                <form method="POST" action="Keranjang_act.php" >
                <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukkan Kode Barang">
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
                            <td class="col-md-2"><input type="number" name="qty[]" value="<?=$value['qty']?>"
                            class="form-control"></td>
                            <td align="right"><?=number_format($value['qty']*$value['harga'])?></td>

                            <td><a href="keranjang_hapus.php?id=<?=$value['id']?>" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Total Rp. <?=number_format($sum)?></h3>
                <form action="transaksi_act.php" method="POST">
                    <input type="hidden" name="total" value="<?=$sum?>">
                <div class="form-group">
                    <label>Bayar</label>
                    <input type="text" id="bayar" name="bayar" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Selesai</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var bayar = document.getElementById('bayar');

        bayar.addEventListener('keyup', function (e){  
            bayar.value = formatRupiah(this.value, 'Rp. ');
            // harga = cleanRupiah(dengan_rupiah.value);
            // calculate(harga,service.value);
        });

        // untuk generate inputan angka menjadi format rupiah
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        // Generate dari inputan rupiah menjadi angka
        function cleanRupiah(rupiah) {
            var clean = rupiah.replace(/\D/g, '');
            return clean;
            // console.log(clean)
        }

    </script>
</body>
</html>