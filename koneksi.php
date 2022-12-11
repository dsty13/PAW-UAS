<?php 	
$servername  = "localhost";
$username    = "root";
$password    = "";
$dbname      = "si_abg";
$koneksi= mysqli_connect($servername,$username,$password,$dbname );
if (!$koneksi) {
  die('Gagal melakukan koneksi'.mysqli_connect_error());
}else{
    // echo "Sukses melakukan koneksi";
}

 ?>