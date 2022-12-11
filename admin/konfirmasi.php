<?php 
	include('../koneksi.php');
	$idk=$_GET['id'];
    $update="UPDATE absensi SET info_keluar='Di konfirmasi' where id_absensi='$idk'";
    $update2=mysqli_query($koneksi,$update);
    if($update2){
    	header('location: absensiGuru.php');
    }else{
    	echo"gagal";
    }
?>