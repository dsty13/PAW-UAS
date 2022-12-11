<?php 
session_start();
include('koneksi.php');

$em 	= $_POST['email'];
$pw 	= md5($_POST['password']);

$guru  	= mysqli_query($koneksi,"SELECT * FROM `guru` WHERE email='$em' and password='$pw' ");
$adm  	= mysqli_query($koneksi,"SELECT * FROM `admin` WHERE  email_adm='$em' and pw_adm='$pw' ");
$cek 	= mysqli_num_rows($guru);
$cek2	= mysqli_num_rows($adm);

if ($cek > 0 || $cek2 > 0) {

	$data_guru = mysqli_fetch_assoc($guru);
	$data_adm = mysqli_fetch_assoc($adm);

	if ($data_guru['email']=="$em") {
		$_SESSION['login'] = true;
		$_SESSION['nama'] = $data_guru['nama'];
		$_SESSION['NIP']  = $data_guru['NIP'];
		$_SESSION['info'] = $em;
		header('location: guru/guru.php');

	}elseif ($data_adm['email_adm']=="$em") {
		$_SESSION['login'] = true;
		$_SESSION['info'] = $em;
		$_SESSION['nama'] ='ADMIN';
		header('location: admin/absensiGuru.php');
		
	}else{
		header('location:index.php?pesan=gagal');
	}

}else{
	header('location:index.php?pesan=gagal');
}






 ?>