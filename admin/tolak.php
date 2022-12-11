<?php 
	include('../koneksi.php');
	$idt=$_GET['id'];
    $updtolak="UPDATE absensi SET info_keluar='Di Tolak' where id_absensi='$idt'";
    $updatetolak2=mysqli_query($koneksi,$updtolak);
    if($updatetolak2){
    	header('location: absensiGuru.php');
    }else{
    	echo"gagal";
    }
?>