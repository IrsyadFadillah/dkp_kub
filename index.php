<?php
session_start();

include ("koneksi.php");
$sensus = query("SELECT * FROM sensus");
$query = "select * from sensus";
$result = mysqli_query($koneksi, $query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrasi KUB Dinas Kelautan dan Perikanan Provinsi Banten</title>
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
    <link href="libuser/animate/animate.min.css" rel="stylesheet">
    <link href="libuser/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="cssuser/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="cssuser/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            height: 550px;
            overflow: scroll;
        }
    </style>
    
</head>

<body>
<div>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <img src="img/logodkp.png">
                </a>
                <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <!-- <a href="#table" class="nav-item nav-link">Table</a> -->
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#features" class="nav-item nav-link">Features</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="dasprokon.php" class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block">LOGIN</a>
                </div>
            </nav>

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/pexels-james-wheeler-3989845.jpg" class="d-block w-100" alt="..." height="630" width="300">
                  </div>
                  <div class="carousel-item">
                    <img src="img/pexels-tom-fisk-3011582.jpg" class="d-block w-100" alt="..." height="630" width="300">
                  </div>
                  <div class="carousel-item">
                    <img src="img/pexels-tom-fisk-1406636.jpg" class="d-block w-100" alt="..." height="630" width="300">
                  </div>
                  <div class="carousel-item">
                    <img src="img/pexels-yuliana-zhyvotkova-15780192.jpg" class="d-block w-100" alt="..." height="630" width="300">
                  </div>
                  
                  <div class="container-xxl bg-primary hero-header">
                    <div class="container">
                        <div class="row g-6 align-items-center">
                            <div class="col-lg-7 text-center text-lg-start">
                                <h1 class="text-white mx-4 mb-3 animated slideInDown" style="text-emphasis: left;">Data KUB DKP</h1>
                                <p class="text-white px-4 pb-3 animated slideInDown">Website Registrasi KUB di Dinas Kelautan dan Perikanan Provinsi Banten</p>
                            </div>
                            <div class="col-lg-6 text-center text-lg-start">
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
              </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- <div class="container-xxl py-6" id="table">
        <div class="table-container">
        <div class="container-fluid pt-4 px-4" >
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <H4 class="mb-0" >DATA KUB YANG TELAH DIFERIVIKASI DKP</H4>
                <input type="text" id="myInput" placeholder="Cari...">
                <a href="excel.php" class="btn btn-success"><i class="lni lni-download"></i> Ekspor Data</a>
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
        
        <br>
        <br> -->
        
        <!-- About Start -->
        <div class="container-xxl py-6" id="about">
            <div class="container">
                <div class="row g-5 flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Mempermudah dalam Pengelolaan Data</h1>
                        <!-- <p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p> -->
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="ms-4">
                                <h5>First Working Process</h5>
                                <!-- <p class="mb-0">Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo magna</p> -->
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="ms-4">
                                <h5>24/7 Hours Support</h5>
                                <!-- <p class="mb-0">Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo magna</p> -->
                            </div>
                        </div>
                        <a href="" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Read More</a>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.5s" src="css/1dkp.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Overview Start -->
        <div class="container-fluid container-xxl bg-light my-2 py-5" id="features">
            <div class="container">
                <div class="row g-5 py-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="css/2dkp.jpg">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">01</h1>
                            <span class="bg-primary mx-2" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Login</h5>
                        </div>
                        <p class="mb-4">Admin akan dihadapkan dengan halaman login sebelum masuk ke halaman dashboard</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Masukkan alamat E-mail yang sudah didaftarkan</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Masukkan Password</p>
                        <p class="mb-0"><i class="fa fa-check-circle text-primary me-3"></i>lalu LOGIN untuk masuk ke halaman admin</p>
                    </div>
                </div>
                <div class="row g-5 py-5 align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">02</h1>
                            <span class="bg-primary mx-3" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Input Data</h5>
                        </div>
                        <p class="mb-4">Halaman Input Data</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Berisikan beberapa kolom yang harus diisi</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Pilih kolom yang akan diisi</p>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="css/3dkp.jpg">
                    </div>
                </div>
                <div class="row g-5 py-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="css/4dkp.jpg">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">03</h1>
                            <span class="bg-primary mx-2" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Pop-up</h5>
                        </div>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Masukkan data sesuai perintah yang sudah ada</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="contact">
    <footer class="bg-dark text-body footer wow fadeIn" data-wow-delay="0.1s" style="top: 200px;">
        <div class="container py-5 px-lg-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <p class="section-title text-white h5 mb-4">Alamat<span></span></p>
                    <p><a href="https://maps.app.goo.gl/FM4Tsw3jnZXCvgwm6"><i class="fa fa-map-marker-alt me-3"></i>Jl. Syekh Moh. Nawawi Albantani, Banten </p>
                    <p><a href="https://dkp.bantenprov.go.id/"><i class="fa fa-globe me-3"></i>dkp.bantenprov.go.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/dkp_banten?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div style="position: relative; overflow: hidden; padding-top: 50%;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1179.304791621927!2d106.16130941620044!3d-6.171885787295609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e421ff68113ffc9%3A0xdda6f9a047226581!2sDinas%20Kelautan%20Dan%20Perikanan%20Provinsi%20Banten!5e0!3m2!1sen!2sid!4v1709624426729!5m2!1sen!2sid"
                        width="100%" height="70%" style="border:0; position: absolute; top: 0; left: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container px-lg-5">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Dinas Kelautan Perikanan 2024</a>, All Right Reserved. 
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
</div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="libuser/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <!-- <script src="lib/waypoints/waypoints.min.js"></script> -->
    <!-- <script src="lib/counterup/counterup.min.js"></script> -->
    <script src="libuser/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="jsuser/main.js"></script>
    <script src="js/table.js"></script>
</body>
</html>