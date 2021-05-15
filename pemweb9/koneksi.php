<?php
// Deklarasi variabel untuk nama server, username, password, dan database
$host		= "localhost";
$user 		= "root";
$password	= "";
$database	= "db_siswa";

// Perintah PHP untuk akses ke database
$koneksi	= mysqli_connect($host, $user, $password, $database);
?>