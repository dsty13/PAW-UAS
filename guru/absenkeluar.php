<?php 
	session_start();
	include('../koneksi.php');
	$nip=$_SESSION['NIP'];
	date_default_timezone_set("Asia/Jakarta");
	$jamkeluar=date("H : i");
	$date=date('d');
    $month=date('m');
    $tahun=date('Y');
    $update="UPDATE absensi SET jam_keluar='$jamkeluar',info_keluar='Menunggu' where NIP='$nip' and id_tgl='$date' and id_bulan='$month' and Tahun='$tahun'";
    $update2=mysqli_query($koneksi,$update);
    if($update2){
    	header('location: guru.php');
    }
    ?>