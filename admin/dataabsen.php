<?php 
session_start();
include('../koneksi.php');

$kondisi = $_SESSION['info'];
$tampil  = "SELECT * FROM `admin` WHERE email_adm ='$kondisi' ";
$sql= mysqli_query($koneksi,$tampil);
$admin = mysqli_fetch_assoc($sql);

if ($admin['email_adm'] != $kondisi || empty($_SESSION['login'])) {
    header('location:../index.php');

}

 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ABG-SMANTAB | Admin</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/smantab.png">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('partials/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php include('partials/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                 
                    <!-- Page Heading -->
                    <div class="text-center h3 mb-2 text-gray-800">
                        <h3>DATA ABSEN</h3>    
                    </div>
                    <!-- DataTales Example -->
                       <?php  
                            include('../koneksi.php');
                            $id=$_GET['id'];
                            $name = mysqli_query($koneksi, "SELECT nama FROM guru WHERE NIP=$id");
                            $nm = mysqli_fetch_assoc($name);
                            $dataabsen=mysqli_query($koneksi,"SELECT * FROM absensi where NIP=$id");
                            $cek=mysqli_num_rows($dataabsen);
                            echo "<h3>";
                            echo $nm['nama'];
                            echo "</h3>";
                            if($cek>0){
                                    #januari
                                    $jan=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=1");
                                        $tesjan=mysqli_num_rows($jan);
                                        if ($tesjan>0) {
                                        echo "<h5>JANUARI</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowjan=mysqli_fetch_assoc($jan)){
                                            $no+=1;
                                            $hari=$rowjan['nama_hari'].','.$rowjan['nama_tgl'].' '.$rowjan['nama_bulan']." ".$rowjan['Tahun'];
                                            $jam_masuk=$rowjan['jam_masuk'];
                                            $info_masuk=$rowjan['info_masuk'];
                                            $jam_keluar=$rowjan['jam_keluar'];
                                            $info_keluar=$rowjan['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #februari
                                    $feb=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=2");
                                        $tesfeb=mysqli_num_rows($feb);
                                        if ($tesfeb>0) {
                                        echo "<h5>FEBRUARI/h1>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowfeb=mysqli_fetch_assoc($feb)){
                                            $no+=1;
                                            $hari=$rowfeb['nama_hari'].','.$rowfeb['nama_tgl'].' '.$rowfeb['nama_bulan']." ".$rowfeb['Tahun'];
                                            $jam_masuk=$rowfeb['jam_masuk'];
                                            $info_masuk=$rowfeb['info_masuk'];
                                            $jam_keluar=$rowfeb['jam_keluar'];
                                            $info_keluar=$rowfeb['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #maret
                                    $mar=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=3");
                                        $tesmar=mysqli_num_rows($mar);
                                        if ($tesmar>0) {
                                        echo "<h5>MARET</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowmar=mysqli_fetch_assoc($mar)){
                                            $no+=1;
                                            $hari=$rowmar['nama_hari'].','.$rowmar['nama_tgl'].' '.$rowmar['nama_bulan']." ".$rowmar['Tahun'];
                                            $jam_masuk=$rowmar['jam_masuk'];
                                            $info_masuk=$rowmar['info_masuk'];
                                            $jam_keluar=$rowmar['jam_keluar'];
                                            $info_keluar=$rowmar['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #april
                                    $apr=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=4");
                                        $tesapr=mysqli_num_rows($apr);
                                        if ($tesapr>0) {
                                        echo "<h5>APRIL</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowapr=mysqli_fetch_assoc($apr)){
                                            $no+=1;
                                            $hari=$rowapr['nama_hari'].','.$rowapr['nama_tgl'].' '.$rowapr['nama_bulan']." ".$rowapr['Tahun'];
                                            $jam_masuk=$rowapr['jam_masuk'];
                                            $info_masuk=$rowapr['info_masuk'];
                                            $jam_keluar=$rowapr['jam_keluar'];
                                            $info_keluar=$rowapr['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #mei
                                    $mei=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=5");
                                        $tesmei=mysqli_num_rows($mei);
                                        if ($tesmei>0) {
                                        echo "<h5>MEI</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowmei=mysqli_fetch_assoc($mei)){
                                            $no+=1;
                                            $hari=$rowmei['nama_hari'].','.$rowmei['nama_tgl'].' '.$rowmei['nama_bulan']." ".$rowmei['Tahun'];
                                            $jam_masuk=$rowmei['jam_masuk'];
                                            $info_masuk=$rowmei['info_masuk'];
                                            $jam_keluar=$rowmei['jam_keluar'];
                                            $info_keluar=$rowmei['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }


                                    #JUNI
                                    $jun=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=6");
                                        $tesjun=mysqli_num_rows($jun);
                                        if ($tesjun>0) {
                                        echo "<h5>JUNI</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowjun=mysqli_fetch_assoc($jun)){
                                            $no+=1;
                                            $hari=$rowjun['nama_hari'].','.$rowjun['nama_tgl'].' '.$rowjun['nama_bulan']." ".$rowjun['Tahun'];
                                            $jam_masuk=$rowjun['jam_masuk'];
                                            $info_masuk=$rowjun['info_masuk'];
                                            $jam_keluar=$rowjun['jam_keluar'];
                                            $info_keluar=$rowjun['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #JULI
                                    $jul=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=7");
                                        $tesjul=mysqli_num_rows($jul);
                                        if ($tesjul>0) {
                                        echo "<h5>JULI</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowjul=mysqli_fetch_assoc($jul)){
                                            $no+=1;
                                            $hari=$rowjul['nama_hari'].','.$rowjul['nama_tgl'].' '.$rowjul['nama_bulan']." ".$rowjul['Tahun'];
                                            $jam_masuk=$rowjul['jam_masuk'];
                                            $info_masuk=$rowjul['info_masuk'];
                                            $jam_keluar=$rowjul['jam_keluar'];
                                            $info_keluar=$rowjul['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #AGUSTUS
                                    $agus=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=8");
                                        $tesagus=mysqli_num_rows($agus);
                                        if ($tesagus>0) {
                                        echo "<h5>AGUSTUS</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowagus=mysqli_fetch_assoc($agus)){
                                            $no+=1;
                                            $hari=$rowagus['nama_hari'].','.$rowagus['nama_tgl'].' '.$rowagus['nama_bulan']." ".$rowagus['Tahun'];
                                            $jam_masuk=$rowagus['jam_masuk'];
                                            $info_masuk=$rowagus['info_masuk'];
                                            $jam_keluar=$rowagus['jam_keluar'];
                                            $info_keluar=$rowagus['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                    #september
                                    $sep=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=9");
                                        $tessep=mysqli_num_rows($sep);
                                        if ($tessep>0) {
                                        echo "<h5>SEPTEMBER</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowsep=mysqli_fetch_assoc($sep)){
                                            $no+=1;
                                            $hari=$rowsep['nama_hari'].','.$rowsep['nama_tgl'].' '.$rowsep['nama_bulan']." ".$rowsep['Tahun'];
                                            $jam_masuk=$rowsep['jam_masuk'];
                                            $info_masuk=$rowsep['info_masuk'];
                                            $jam_keluar=$rowsep['jam_keluar'];
                                            $info_keluar=$rowsep['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                        #oktober
                                        $okt=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=10");
                                        $tesokt=mysqli_num_rows($okt);
                                        if ($tesokt>0) {
                                        echo "<h5>OKTOBER</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rowokt=mysqli_fetch_assoc($okt)){
                                            $no+=1;
                                            $hari=$rowokt['nama_hari'].','.$rowokt['nama_tgl'].' '.$rowokt['nama_bulan']." ".$rowokt['Tahun'];
                                            $jam_masuk=$rowokt['jam_masuk'];
                                            $info_masuk=$rowokt['info_masuk'];
                                            $jam_keluar=$rowokt['jam_keluar'];
                                            $info_keluar=$rowokt['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                        echo "</tbody></table></div>";
                                        }

                                        #november
                                        $nov=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=11");
                                        $tesnov=mysqli_num_rows($nov);
                                        if ($tesnov>0) {
                                        echo "<h5>NOVEMBER</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rownov=mysqli_fetch_assoc($nov)){
                                            $no+=1;
                                           $hari=$rownov['nama_hari'].','.$rownov['nama_tgl'].' '.$rownov['nama_bulan']." ".$rownov['Tahun'];
                                            $jam_masuk=$rownov['jam_masuk'];
                                            $info_masuk=$rownov['info_masuk'];
                                            $jam_keluar=$rownov['jam_keluar'];
                                            $info_keluar=$rownov['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                               </tr>
                                            ";
                                        }
                                            echo "</tbody></table></div>";
                                        }
                                        

                                        #desember
                                        $des=mysqli_query($koneksi,"SELECT * FROM absensi inner join bulan on absensi.id_bulan=bulan.id_bulan inner join hari on absensi.id_hari=hari.id_hari inner join tanggal on absensi.id_tgl=tanggal.id_tgl where NIP='$id' and absensi.id_bulan=12");
                                        $test=mysqli_num_rows($des);
                                        if($test>0){
                                        echo "<h5>DESEMBER</h5>";
                                        echo "<div class='table-responsive'>
                                           <table class='table table-striped'>
                                            <thead>
                                               <tr>
                                                <th>No</th>
                                                <th>Hari, Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Status</th>
                                                <th>Jam Keluar</th>
                                                <th>Status</th>
                                               </tr>
                                            </thead>
                                            <tbody>";
                                        $no=0;
                                        while($rows=mysqli_fetch_assoc($des)){
                                            $no+=1;
                                            $hari=$rows['nama_hari'].','.$rows['nama_tgl'].' '.$rows['nama_bulan']." ".$rows['Tahun'];
                                            $jam_masuk=$rows['jam_masuk'];
                                            $info_masuk=$rows['info_masuk'];
                                            $jam_keluar=$rows['jam_keluar'];
                                            $info_keluar=$rows['info_keluar'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$hari</td>
                                                <td>$jam_masuk</td>
                                                <td>$info_masuk</td>
                                                <td>$jam_keluar</td>
                                                <td>$info_keluar</td>
                                            </tr>
                                            ";

                                        }
                                         echo "</tbody></table></div>";
                                     }








                                } #penutup if induk
                        ?>
                </div>        
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                <?php include('partials/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include('partials/script.php'); ?>

</body>

</html>