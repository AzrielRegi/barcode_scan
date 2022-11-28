<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$id_trx = $_GET['idtrx'];

$data = mysqli_query($dbconnect,"SELECT * FROM transaksi WHERE id_transaksi='$id_trx'");

$trx = mysqli_fetch_assoc($data);
// print_r($trx);

$detail = mysqli_query($dbconnect,"SELECT transaksi_detail.*, barang.nama FROM `transaksi_detail` INNER JOIN barang 
ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Selesai</title>
    <style>
        body{
            color: #a7a7a7;
        }
    </style>
</head>
<body>
    <div align="center">
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th>PT Kharisma Indonesia <br>
                Jl. Raya Candi No.20 <br>
            Sidoarjo, Jawa Timur</th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td>#<?=$trx['nomor']?> | <?=date('d-m-Y H:i:s',strtotime($trx['tanggal_waktu']))?> <?=$trx['nama']?></td>
            </tr>
            <tr align="center"><td><hr></td></tr>
        </table>
        <table width="500" border="0" cellpadding="3" cellspacing="0">
            <?php while ($row = mysqli_fetch_array($detail)) {?>
            <tr>
                <td><?=$row['nama']?></td>
                <td><?=$row['qty']?></td>
                <td align="right"><?=number_format($row['harga'])?></td>
                <td align="right"><?=number_format($row['total'])?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Total</td>
                <td align="right"><?=number_format($trx['total'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Bayar</td>
                <td align="right"><?=number_format($trx['bayar'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Kembali</td>
                <td align="right"><?=number_format($trx['kembali'])?></td>
            </tr>
        </table>
        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <tr><td><hr></td></tr>
            <tr align="center"> 
                <td>Terimakasih, Selamat Belanja Kembali</td>
            </tr>
            <tr align="center">
                <td>====== Layanan Konsumen ======</td>
            </tr>
            <tr align="center">
                <td>SMS/CALL 089685148442</td>
            </tr>
        </table>
    </div>
</body>
</html>