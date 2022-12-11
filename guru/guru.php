<?php 
session_start();
include('../koneksi.php');
$kondisi = $_SESSION['info'];
$tampil  = "SELECT * FROM `guru` WHERE email ='$kondisi' ";
$sql= mysqli_query($koneksi,$tampil);
$guru = mysqli_fetch_assoc($sql);
if ($guru['email']!= $kondisi || empty($_SESSION['login'])) {
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
    <title>ABG-SMANTAB | Guru</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <?php include('partial/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('partial/nav.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
                    <h5>Silahkan Mengisi Absensi</h5>
                    <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $date=date('d');
                        $month=date('m');
                        ?>
                    <div class="table-responsive">
                            <table class="table table-success table-striped">
                                <thead>
                                    <?php 
                                        $nip=$_SESSION['NIP'];
                                        $data="SELECT * FROM absensi where NIP='$nip' and id_tgl='$date' and id_bulan='$month'";
                                        $absen=mysqli_query($koneksi,$data);
                                        $hasil=mysqli_fetch_assoc($absen);
                                    ?>
                                    <tr>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Absen Masuk</th>
                                        <th>Absen Keluar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                                             
                                    <tr>
                                        <td>
                                            <?php 
                                                if (empty($hasil)) {
                                                    echo"<img src='img/warning.png' style='width: 30px;' alt='Warning'>";
                                                }else if($hasil['jam_masuk']!=' ' && $hasil['info_masuk']!=' '&&$hasil['jam_keluar']=='Belum Absen'){
                                                    echo"<img src='img/minus.png' style='width: 30px;' alt='Warning'>";
                                                }
                                                else if($hasil['jam_keluar']!='Belum Absen' && $hasil['info_keluar']!='Belum Absen'){
                                                    echo"<img src='img/complete.png' style='width: 30px;' alt='Warning'>";
                                                }
                                                else{
                                                    echo "FAILED";
                                                }
                                            ?>


                                        </td>
                                        <td>
                                            <?php
                                                if (empty($hasil)) {
                                                    echo"Anda Belum Melakukan Absen";
                                                 } 
                                                else if($hasil['jam_masuk']!=' ' && $hasil['info_masuk']!=' ' &&$hasil['jam_keluar']=='Belum Absen' ){
                                                    echo"Anda Sudah Melakukan Absen Masuk Jangan Lupa Absen Keluar";
                                                }
                                                else if($hasil['jam_keluar']!='Belum Absen' && $hasil['info_keluar']!='Belum Absen'){
                                                    echo"Terimakasih sudah melakukan absen";
                                                }else{
                                                    echo"ERROR";
                                                }
                                            ?>
                                            
                                        </td>
                                        <?php  
                                            if ($_SESSION['login']==true && empty($hasil)) {
                                               echo"<td><a href='absenmasuk.php' class='btn btn-warning btn-lg'>Masuk</a></td>";
                                               echo"<td><a href='#' class='btn btn-danger btn-lg disabled'>Pulang</a></td>";
                                            }else if ($_SESSION['login']==true && $hasil['jam_keluar']=='Belum Absen' && $hasil['info_keluar']=='Belum Absen'){
                                                echo"<td><a href='#' class='btn btn-warning btn-lg disabled'>Masuk</a></td>";
                                                echo"<td><a href='absenkeluar.php' class='btn btn-danger btn-lg'>Pulang</a></td>";
                                            }else{
                                                echo"<td><a href='#' class='btn btn-warning btn-lg disabled'>Masuk</a></td>";
                                                echo"<td><a href='#' class='btn btn-danger btn-lg disabled'>Pulang</a></td>";
                                            }
                                        ?>  
                                    
                                    </tr>  
                               
                                </tbody>
                            </table>
                        </div>

                </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('partial/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   <?php include('partial/script.php'); ?>

    

</body>

</html>