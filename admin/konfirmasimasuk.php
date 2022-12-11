<?php 
	include('../koneksi.php');
	$id=$_GET['id'];
    $updatem="UPDATE absensi SET info_masuk='Di konfirmasi' where id_absensi='$id'";
    $updatem2=mysqli_query($koneksi,$updatem);
    if($updatem2){
    	header('location: absensiGuru.php');
    }else{
    	echo"gagal";
    }
?>