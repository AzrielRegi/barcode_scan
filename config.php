<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kasir";

$dbconnect = new mysqli ("$host", "$user", "$pass", "$db");

if($dbconnect-> connect_error){
    echo "Koneksi Gagal -> " .$dbconnect->connect_error;
}
?>