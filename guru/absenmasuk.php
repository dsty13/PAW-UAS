<?php  
	session_start();
	include('../koneksi.php');
	date_default_timezone_set("Asia/Jakarta");
 	$jam=date("H : i");
	$hari=date('l');
	$hr=0;
	if ($hari=='Monday'){
		$hr=1;
	}if ($hari=='Tuesday'){
		$hr=2;
	}if ($hari=='Wednesday'){
		$hr=3;
	}if ($hari=='Thursday'){
		$hr=4;
	}if ($hari=='Friday'){
		$hr=5;
	}if ($hari=='Saturday'){
		$hr=6;
	}if ($hari=='Sunday'){
		$hr=7;
	}
	$tanggal=date('d');
    $bulan=date('m');
    $year = date('Y');
	$nip=$_SESSION['NIP'];
	$tambah="INSERT INTO absensi(`id_absensi`, `NIP`, `Tahun`, `id_bulan`, `id_tgl`, `id_hari`, `jam_masuk`, `info_masuk`, `jam_keluar`, `info_keluar`) VALUES(NULL,'$nip',$year,$bulan,$tanggal,$hr,'$jam','Menunggu','Belum Absen', 'Belum Absen')";
	$absen=mysqli_query($koneksi,$tambah);
	if ($absen) {
		header('location: guru.php');
	}else{
		echo "FAILED !!!";
	}
?>