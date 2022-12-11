<?php 	
include('../koneksi.php');
$email     = $_POST['email_adm'];
$pw        = md5($_POST['pw_adm']);

$sql ="INSERT INTO `admin`(`id_admin`, `email_adm`, `pw_adm`) VALUES (null,'$email','$pw')";
$add =mysqli_query($koneksi,$sql);
if ($add) {
    echo " <script>window.alert('Tambah Admin Berhasil');</script>";
}else{
  echo " <script>window.alert('Tambah Barang Gagal');</script>";
}


 ?>