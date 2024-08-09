<?php
session_start();

require 'koneksi.php';

if($_SESSION["username"] == "")
  {
      echo"<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
      header("location: login.php");
  }

$sensus = query("SELECT * FROM sensus");

if (isset($_POST['tambah'])) {
    $data = array(
        'kab_kota' => $_POST['kab_kota'],
        'nama_kub' => $_POST['nama_kub'],
        'alamat_kub' => $_POST['alamat_kub'],
        'ketua' => $_POST['ketua'],
        'notelp' => $_POST['notelp'],
        'jumlah_anggota' => $_POST['jumlah_anggota'],
        'aktifnon' => $_POST['aktifnon'],
        'kelas_kub' => $_POST['kelas_kub'],
        // 'b_kabkota' => $_POST['b_kabkota'],
        // 'b_prvo' => $_POST['b_prvo'],
        // 'b_kkp' => $_POST['b_kkp'],
        // 'belum' => $_POST['belum'],
        // tambahkan input yang lain jika diperlukan
    );

    if (tambah($data) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'bukti.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
            </script>";
    }
}

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
                <a href="dasprokon.php" class="nav-link active"><i class="fa fa-laptop me-2"></i>Input Data</a>
                <a href="bukti.php" class="nav-link "><i class="fa fa-laptop me-2"></i>Bukti</a>
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
                                <p><b>Input Data </p>
                            </blockquote>
                        </figure>
                    </div>
                </div>
        </div>
        <div>
            <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATA KUB DKP BANTEN</h5>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="id">
                                <div class="mb-3">
                                    <label for="kab_kota" class="col-form-label">KAB/ KOTA:</label>
                                    <select class="form-select mb-3" aria-label="Default select example "id="kab_kota" name="kab_kota">
                                        
                                        <option value="" disabled selected hidden>Pilih Kab/ Kota</option>
                                        <option value="Kabupaten Pandeglang" >Kabupaten Pandeglang</option>
                                        <option value="Kabupaten Lebak" >Kabupaten Lebak</option>
                                        <option value="Kabupaten Tanggerang">Kabupaten Tanggerang</option>
                                        <option value="Kabupaten Serang" >Kabupaten Serang</option>
                                        <option value="Kota Tangerang" >Kota Tangerang</option>
                                        <option value="Kota Serang" >Kota Serang</option>
                                        <option value="Kota Cilegon" >Kota Cilegon</option>
                                        <option value="Kota Tangerang Selatan" >Kota Tangerang Selatan</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kub" class="col-form-label">Nama KUB:</label>
                                    <input type="text" class="form-control" id="nama_kub" name="nama_kub" >
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_kub" class="col-form-label">Alamat KUB:</label>
                                    <textarea type="text" class="form-control" id="alamat_kub" name="alamat_kub" ></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="ketua" class="col-form-label">Ketua:</label>
                                    <input type="text" class="form-control" id="ketua" name="ketua" >
                                </div>
                                <div class="mb-3">
                                    <label for="notelp" class="col-form-label">No. Telp/ HP:</label>
                                    <input type="text" class="form-control" id="notelp" name="notelp">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_anggota" class="col-form-label">Jumlah Anggota:</label>
                                    <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota">
                                </div>
                                <div class="mb-3">
                                    <label for="aktifnon" class="col-form-label">Aktif/ Non Aktif:</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="Aktif" name="aktifnon" value="Aktif" >
                                            <label class="form-check-label" for="aktif">
                                                Aktif
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="Non-Aktif" name="aktifnon" value="Non-Aktif" >
                                            <label class="form-check-label" for="non-aktif">
                                                Non Aktif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kelas_kub" class="col-form-label">Kelas KUB:</label>
                                    <select class="form-select mb-3" aria-label="Default select example "id="kelas_kub" name="kelas_kub">
                                        <option value=""  disabled selected hidden>Pilih Kelas KUB</option>
                                        <option value="Pemula">Pemula</option>
                                        <option value="Madya" >Madya</option>
                                        <option value="Utama" >Utama</option>
                                        
                                    </select>
                                </div> <hr />
                                <h6 class="modal-title">KELENGKAPAN ADMINISTRASI KUB</h6>
                                <div class="mb-3">
                                        <label for="kusuka" class="col-form-label">KUSUKA</label>
                                        <input type="file" class="form-control" id="myFileInput" name="kusuka">
                                </div>
                                <div class="mb-3">
                                        <label for="npwp" class="col-form-label">NPWP</label>
                                        <input type="file" class="form-control" id="myFileInput" name="npwp">
                                </div>
                                <div class="mb-3">
                                        <label for="akte_notaris" class="col-form-label">Akte Notaris</label>
                                        <input type="file" class="form-control" id="myFileInput" name="akte_notaris">
                                </div>
                                <div class="mb-3">
                                        <label for="sertifikat_ahu" class="col-form-label">Sertifikat AHU</label>
                                        <input type="file" class="form-control" id="myFileInput" name="sertifikat_ahu">
                                </div>
                                <div class="mb-3">
                                        <label for="nib_oss" class="col-form-label">Sertifikat AHU</label>
                                        <input type="file" class="form-control" id="myFileInput" name="nib_oss">
                                </div>
                                
                                
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit" id="tambah" name="tambah" class="btn btn-secondary" onclick="return confirm('Apakah Yakin Tambah Data Ini?')"><b>Submit</b></button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>                                
            </div> 
        </div>
        
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