<?php 
	include('../koneksi.php');
	$idm=$_GET['id'];
    $updatetm="UPDATE absensi SET info_masuk='Di Tolak' where id_absensi='$idm'";
    $updatetm2=mysqli_query($koneksi,$updatetm);
    if($updatetm2){
    	header('location: absensiGuru.php');
    }else{
    	echo"gagal";
    }
?>