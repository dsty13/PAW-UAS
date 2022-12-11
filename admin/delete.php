<?php 
include('../koneksi.php');
$nip =$_GET['NIP'];
$delete = "DELETE FROM `guru` WHERE NIP = $nip";
$hasil = mysqli_query($koneksi,$delete);
if ($hasil) {
	header('location:admin.php');
	
}else{
	echo "Hapus Data Gagal";
}

 ?>