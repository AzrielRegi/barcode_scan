<?php
include 'config.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM barang WHERE id_barang='$id'");

    header("location:barang.php");
}
?>