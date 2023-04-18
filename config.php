<?php 
$server = "localhost";
$user = "root";
$password = "";
$database = "loneliness";

$connect = mysqli_connect($server, $user, $password, $database);

if(!$connect){
	echo("Gagal terhubung dengan database, mohon cek konfigurasi");
}
?>