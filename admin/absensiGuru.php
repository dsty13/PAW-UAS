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
    <title>ABG-SMANTAB | Absensi</title>
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
                    <?php
                        date_default_timezone_set("Asia/Jakarta"); 
                        $date=date('d');
                        $month=date('m');
                        $tahun=date('Y');
                    $masuk="SELECT * FROM absensi inner join guru on guru.NIP=absensi.NIP inner join hari on hari.id_hari=absensi.id_hari inner join tanggal on tanggal.id_tgl=absensi.id_tgl inner join bulan on bulan.id_bulan=absensi.id_bulan WHERE info_masuk='Menunggu'";
                    $keluar="SELECT * FROM absensi inner join guru on guru.NIP=absensi.NIP inner join hari on hari.id_hari=absensi.id_hari inner join tanggal on tanggal.id_tgl=absensi.id_tgl inner join bulan on bulan.id_bulan=absensi.id_bulan WHERE absensi.info_keluar='Menunggu' and absensi.id_tgl='$date' and absensi.id_bulan='$month' and absensi.Tahun='$tahun'";
                    $data = mysqli_query($koneksi,$masuk);
                    $cekdata=mysqli_num_rows($data);
                    $data2 = mysqli_query($koneksi,$keluar);
                    $cekdata2=mysqli_num_rows($data2); 
                    ?>
                 
                    <!-- Page Heading -->
                    <div class="text-center h3 mb-2 text-gray-800">
                        <h1>Daftar Absensi Guru</h1>    
                    </div>
                    <!-- DataTales Example -->
                        <div class="table-responsive mt-3">
                            <?php
                            if($cekdata>0){
                            echo"<h5> PERMINTAAN KONFIRMASI ABSEN MASUK </h5>
                            <table class='table table-success table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                    $no = 0;
                                     while ($row= mysqli_fetch_assoc($data)) {
                                        $no+=1;
                                        $tanggal=$row['nama_hari'].','.' '.$row['nama_tgl'].' '.$row['nama_bulan'].' '.$row['Tahun'];
                                        $jam_masuk=$row['jam_masuk'];
                                        $nama=$row['nama'];
                                        $id=$row['id_absensi'];

                                    echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$nama</td>
                                       <td> 
                                           ABSEN MASUK
                                        </td>
                                        <td>$tanggal</td>
                                        <td>$jam_masuk</td>
                                       <td>  
                                              <a href='konfirmasimasuk.php?id=$id'class='btn btn-primary'>Konfirmasi</a>
                                              <a href='tolakmasuk.php?id=$id' class='btn btn-danger'>Tolak</a>
                                        </td>
                                    </tr>
                             </tbody>";
                        }
                        echo"</table>";
                                }
                    echo"</div>";
                    ?>

                        <div class="table-responsive mt-3">
                        <?php
                            if($cekdata2>0){
                            echo"<h5> PERMINTAAN KONFIRMASI ABSEN PULANG </h5>
                            <table class='table table-success table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                    $no = 0;
                                     while ($row2= mysqli_fetch_assoc($data2)) {
                                        $no+=1;
                                        $tanggal=$row2['nama_hari'].','.' '.$row2['nama_tgl'].' '.$row2['nama_bulan'].' '.$row2['Tahun'];
                                        $jam_keluar=$row2['jam_keluar'];
                                        $nama=$row2['nama'];
                                        $id=$row2['id_absensi'];

                                    echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>$nama</td>
                                       <td> 
                                           ABSEN KELUAR
                                        </td>
                                        <td>$tanggal</td>
                                        <td>$jam_keluar</td>
                                       <td>  
                                              <a href='konfirmasi.php?id=$id'class='btn btn-primary'>Konfirmasi</a>
                                              <a href='tolak.php?id=$id' class='btn btn-danger'>Tolak</a>
                                        </td>
                                    </tr>
                            </tbody>";
                        }
                        echo"</table>";
                                }
                    echo"</div>";
                    ?>
                    <div class="table-responsive mt-3">
                    <?php 
                        if ($cekdata==0 && $cekdata2==0) {
                            echo"<h5> PERMINTAAN KONFIRMASI ABSEN </h5>
                            <table class='table table-success table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td colspan='6' style=text-align:center;> TIDAK ADA PERMINTAAN </td>
                                    </tr>
                            </tbody>
                        </table>";
                        }
                    echo"</div>";
                    ?>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            </div>
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