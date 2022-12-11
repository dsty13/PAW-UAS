<?php 	
include('../koneksi.php');
$nip       = $_POST['NIP'];
$nama      = $_POST['nama'];
$alamat    = $_POST['alamat'];
$gender    = $_POST['gender'];
$email     = $_POST['email'];
$pw        = md5($_POST['password']);

$sql ="INSERT INTO `guru`(`NIP`, `nama`, `alamat`, `gender`, `email`, `password`) VALUES ('$nip','$nama','$alamat','$gender','$email','$pw')";
$tambah =mysqli_query($koneksi,$sql);
if ($tambah) {
   echo " <script>window.alert('Tambah Data Guru Berhasil'); document.location='admin.php';</script>";
}else{
    header("location:tambah_data.php");
}


 ?>