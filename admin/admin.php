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
                    <?php 
                    $data = mysqli_query($koneksi,'SELECT `NIP`, `nama`, `alamat`, `gender`, `email` FROM `guru` WHERE NIP = NIP');

                     ?>
                 
                    <!-- Page Heading -->
                    <div class="text-center h3 mb-2 text-gray-800">
                        <h3>Data Guru SMAN 1 Tanjung Bumi</h3>    
                    </div>
                    <div class="text-center mb-4">
                       <p class="text-muted">merupakan data-data pengajar SMAN 1 Tanjung Bumi </p> 
                    </div>
                    <!-- DataTales Example -->
                        <div class="table-responsive">
                            <table class="table table-success table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 0;
                                     while ($row = mysqli_fetch_assoc($data) ) {
                                        $no+=1;
                                    ?>
                                    <tr>
                                        <td><?php echo "$no"; ?></td>
                                        <td> <?php echo $row['NIP']; ?> </td>
                                        <td><?php echo $row['nama']; ?> </td>
                                        <td><?php echo $row['alamat']; ?> </td>
                                        <td><?php echo $row['gender']; ?> </td>
                                        <td><?php echo $row['email']; ?> </td>
                                        <td>
                                            <a href="edit_data.php?NIP=<?=$row['NIP'];?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <a href="delete.php?NIP=<?=$row['NIP'];?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Hapus Data Ini?')"><i class="bi bi-trash-fill"></i></a>
                                            
                                        </td>
                                    </tr>  
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
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