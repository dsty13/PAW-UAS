<?php 
include('../koneksi.php');
$nip       = $_POST['NIP'];
$nama      = $_POST['nama'];
$alamat    = $_POST['alamat'];
$gender    = $_POST['gender'];
$email     = $_POST['email'];
$pw        = md5($_POST['password']);
$update = mysqli_query($koneksi,"UPDATE `guru` SET NIP ='$nip',nama ='$nama',alamat ='$alamat', gender ='$gender',email='$email' WHERE NIP = $nip");
if ($update) {
	echo " <script>window.alert('Update Data Guru Berhasil'); document.location='admin.php';</script>";
}



 ?>