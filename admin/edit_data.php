<?php 
session_start();
include('../koneksi.php');
$kondisi = $_SESSION['info'];
$tampil  = "SELECT * FROM `admin` WHERE email_adm ='$kondisi' ";
$sql= mysqli_query($koneksi,$tampil);
$admin = mysqli_fetch_assoc($sql);
if ($admin['email_adm']!= $kondisi || empty($_SESSION['login'])) {
    header('location:../index.php');

}
?>
<?php
$nip = $_GET['NIP'];
$edit = mysqli_query($koneksi,"SELECT `NIP`, `nama`, `alamat`, `gender`, `email` FROM `guru` WHERE NIP = $nip ");
$row = mysqli_fetch_assoc($edit);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ABG-SMANTAB | Edit Data</title>
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
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru</h1> -->
                    <div class="content">
                        <div class="container">
                            <div class="text-center mb-4">
                                <h3>Edit Data Guru</h3>
                                <p class="text-muted">Silahkan Edit Data Guru sesuai dengan data yang benar</p>    
                            </div>
                        </div>
                        <div class="container d-flex justify-content-center">
                            <form action="update.php" method="POST" style="width: 50vw; min-width: 300px;">
                                <div class="form-group">
                                    <label class="form-label" for="NIP">NIP :</label>
                                    <input type="text" id="NIP" name="NIP" class="form-control" value="<?= $row['NIP'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama :</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $row['nama'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat :</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $row['alamat'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email :</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?= $row['email'];?>"  required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Password :</label>
                                    <input type="hidden" id="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    Gender :  &nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-laki" <?php if($row['gender'] == "Laki-laki") echo "checked"; ?> >
                                        <label class="form-check-label" for="inlineRadio1"> Laki-laki </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan" <?php if($row['gender'] == "Perempuan") echo "checked"; ?>>
                                        <label class="form-check-label" for="inlineRadio2"> Perempuan </label>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            
                            </form>
                        </div>
      					
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