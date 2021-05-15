<?php
// Deklarasi variabel untuk nama server, username, password, dan database
$servername	="localhost";
$username	="root";
$password	="";
$database	="pendaftaran";

// Perintah PHP untuk akses ke database
$koneksi=mysqli_connect($servername, $username, $password, $database);
?>