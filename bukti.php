<?php
session_start();

require 'koneksi.php';

if($_SESSION["username"] == "")
  {
      echo"<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
      header("location: login.php");
  }

$sensus = query("SELECT * FROM sensus");


$query = "select * from sensus";
$result = mysqli_query($koneksi, $query);

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PENDAFTARAN KUB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script>
		$(document).ready(function(){
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>

    <style>
        .table-container {
          max-height: 600px; /* Set the maximum height for vertical scrolling */
       
        }
        .table-container thead th {
          position: sticky; /* Set the table header to stick to the top */
          top: 0;
          background-color: #f8f9fa; /* Set the background color of the sticky header */
        }
        .table-border {
          text-align: center; 
          border-color: black;  
          background-color: #dcd6d6;
        }
        .scroll {
            height: 450px;
            overflow: scroll;
        }
    </style>

    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
     <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <div class="navbar-nav w-100">
                <a href="index.php" class="navbar-brand mx-3 mb-3">
                    <img src="img/logodkp.png" width="200" height="50" class="d-inline-block align-text-top align-items-center">
                </a>
                <a href="dasprokon.php" class="nav-link"><i class="fa fa-laptop me-2"></i>Input Data</a>
                <a href="bukti.php" class="nav-link active"><i class="fa fa-laptop me-2"></i>Bukti</a>
            </div>
        </nav>
    </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"  style="height:60px;">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="img/logodkp.png" width="90" height="50" class="d-inline-block align-text-top align-items-center">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">USER</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <div class="border rounded p-4 pb-0 mb-4">
                        <figure class="text-center text-dark">
                            <blockquote class="blockquote">
                                <p><b>DATA KUB YANG TELAH DIFERIVIKASI DKP </p>
                            </blockquote>
                        </figure>
                    </div>
                    <p>1. Cek secara berkala apakah data KUB sudah diverifikasi atau belum oleh petugas</p>
                    <p>2. Jika data sudah diverifikasi dan berada pada table dibawah, UNDUH bukti </p>
                    <div class="container-xxl py-6" id="table">
                    <div class="table-container">
                    <div class="container-fluid pt-4 px-4" >
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <!-- <H4 class="mb-0" >DATA KUB YANG TELAH DIFERIVIKASI DKP</H4> -->
                            <input type="text" id="myInput" placeholder="Cari...">
                            <a href="https://drive.google.com/uc?export=download&id=1NHOlEBGKRUmWN3lx2_EFVo9NCvh1SCYx" class="btn btn-success"><i class="lni lni-download"></i> Unduh</a>
                            </div>
                            <div class="table-responsive scroll">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                                            <tr class="text-dark table-border">
                                                <th style="border-color: grey;" rowspan="2">NO</td>
                                                <th style="border-color: grey;" rowspan="2">KAB / KOTA</td>
                                                <th style="border-color: grey;" rowspan="2">NAMA KUB</td>
                                                <th style="border-color: grey;" rowspan="2">ALAMAT KUB</td>
                                                <th style="border-color: grey;" rowspan="2">KETUA</td>
                                                <th style="border-color: grey;" rowspan="2">N0.TELP/ HP</td>
                                                <th style="border-color: grey;" rowspan="2">JUMLAH ANGGOTA</td>
                                                <th style="border-color: grey;" rowspan="2">AKTIF / NONAKTIF</td>
                                                <th style="border-color: grey;" colspan="5">KELENGKAPAM ADMINISTRASI KUB</td>
                                                <th style="border-color: grey;" rowspan="2">KELAS KUB</td>
                                                <th style="border-color: grey;" colspan="4">BANTUAN PEMERINTAH YANG PERNAH DITERIMA</td>
                                                
                                            </tr>
                                            <tr class="text-dark table-border">
                                                <th style="border-color: grey;">KUSUSKA KUB</td>
                                                <th style="border-color: grey;">NPWP KUB</td>
                                                <th style="border-color: grey;">AKTE NOTARIS</td>
                                                <th style="border-color: grey;">SERTIFIKAT AHU</td>
                                                <th style="border-color: grey;">NIB-OSS</td>
                                                <th style="border-color: grey;">KAB/KOTA</td>
                                                <th style="border-color: grey;">PRVO</td>
                                                <th style="border-color: grey;">KKP</td>
                                                <th style="border-color: grey;">BELUM DIKATEGORIKAN</td>
                                            </tr>
                                                    <tbody id="myTable">
                                                    <?php
                                                    $i = 1;
                                                    foreach ($sensus as $row) :
                                                        if ($row["verif"] == 1) { // Memeriksa apakah data sudah terverifikasi
                                                    ?>
                                                            <tr style="border-color: grey;">
                                                                <td class="text-dark"><?php echo $i; ?></td>
                                                                <td class="text-dark"><?php echo $row["kab_kota"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["nama_kub"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["alamat_kub"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["ketua"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["notelp"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["jumlah_anggota"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["aktifnon"]; ?></td>
                                                                <td><img src="img/<?php echo $row["kusuka"]; ?>" width="80px" alt=""></td>
                                                                <td><img src="img/<?php echo $row["npwp"]; ?>" width="80px" alt=""></td>
                                                                <td><img src="img/<?php echo $row["akte_notaris"]; ?>" width="80px" alt=""></td>
                                                                <td><img src="img/<?php echo $row["sertifikat_ahu"]; ?>" width="80px" alt=""></td>
                                                                <td><img src="img/<?php echo $row["nib_oss"]; ?>" width="80px" alt=""></td>
                                                                <td class="text-dark"><?php echo $row["kelas_kub"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["b_kabkota"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["b_prvo"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["b_kkp"]; ?></td>
                                                                <td class="text-dark"><?php echo $row["belum"]; ?></td>
                                                            </tr>
                                                    <?php
                                                            $i++;
                                                        }
                                                    endforeach;
                                                    ?>
                                                    </tbody>
                                                                            
                                    </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div>
            
    
        
        <!-- Sale & Revenue End -->
  
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
</body>

</html>