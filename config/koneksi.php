<?php 
// Localhost
$server = "localhost";
$username = "root";
$password = "";
$database = "dbsimpeg";

//server cloud
//$server = "localhost";
//$username = "esimorga_rootsimpeg";
//$password = "Es1Morga2023**";
//$database = "esimorga_dbsimpeg";

// Koneksi dan memilih database di server
//mysql_connect($server,$username,$password) or die("Koneksi gagal");
//mysql_select_db($database) or die("Database tidak bisa dibuka");

$koneksi = mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");

?>