<?php
session_start();

include "koneksi.php";
if($_SESSION["username"] =="")
{
    echo"<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    header("location: login.php");
}


if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
      echo "<script>
              alert('Data Sensus berhasil ditambahkan!');
              document.location.href = 'input1.php';
          </script>";
  } else {
     
      echo "<script>
              alert('Data Sensus gagal ditambahkan!');
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Sucofindo</title>
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
                <a href="dasprokon.php" class="navbar-brand mx-5 mb-3">
                    <img src="img/Logo_sucofindo.png" width="90" height="50" class="d-inline-block align-text-top align-items-center">
                </a>
                <a href="dasprokon.php" class="nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="input1.php" class="nav-link active"><i class="fa fa-laptop me-2"></i>Input Data</a>
            </div>
        </nav>
    </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"  style="height:60px;">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="img/Logo_sucofindo.png" width="90" height="50" class="d-inline-block align-text-top align-items-center">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">ADMIN</span>
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
                                <p><b>Input Data Sensus Pembudidaya</p>
                            </blockquote>
                        </figure>
                    </div>
                </div>
        </div>
        <div class="container-fluid pt-4 px-4 text-dark">               
            <div class="row g-4">
                
                    <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup1" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Data Umum</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup2" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Lokasi Usaha</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup3" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Komoditas</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup4" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Teknologi</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup5" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Produksi & Distribusi</b></p>
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4"> -->
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup6" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2 "><b>Pakan</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup7" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Benih</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup8" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Modal & Tenaga Kerja</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup9" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Lingkungan</b></p>
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4"> -->
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup10" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Perizinan</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup11" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Lain-lain</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup12" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2"><b>Petugas Sensus</b></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3" type="button" data-bs-toggle="modal" data-bs-target="#popup13" >
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        
                        <div class="ms-3">
                            <p class="mb-2 "><b>UPT</b></p>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
        
        <!-- Sale & Revenue End -->
        
        <div class="modal fade" id="popup1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATA KUB DKP BANTEN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="text" class="form-control" id="nama_kub" name="nama_kub" value="">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_kub" class="col-form-label">Alamat KUB:</label>
                                <textarea type="text" class="form-control" id="alamat_kub" name="alamat_kub" value="alamat_kub"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ketua" class="col-form-label">Ketua:</label>
                                <input type="text" class="form-control" id="ketua" name="ketua" value="ketua">
                            </div>
                            <div class="mb-3">
                                <label for="notelp" class="col-form-label">No. Telp/ HP:</label>
                                <input type="number" class="form-control" id="notelp" name="notelp" value="notelp">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_anggota" class="col-form-label">Jumlah Anggota:</label>
                                <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota" value="jumlah_anggota">
                            </div>
                            <div class="mb-3">
                                <label for="aktifnon" class="col-form-label">Aktif/ Non Aktif:</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="Aktif" name="aktifnon" value="Aktif" >
                                        <label class="form-check-label" for="Aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="Non Aktif" name="aktifnon" value="Non Aktif" >
                                        <label class="form-check-label" for="Non Aktif">
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
                                <label for="foto" class="col-form-label">Foto Petugas</label>
                                <input type="file" class="form-control" id="foto" name="foto" >
                            </div>
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
                            <hr />
                            <h6 class="modal-title">BANTUAN PEMERINTAH YANG PERNAH DITERIMA</h6>
                            <div class="mb-3">
                                <label for="b_kabkota" class="col-form-label">Kab/ Kota:</label>
                                <input type="text" class="form-control" id="b_kabkota" name="b_kabkota" value="">
                            </div>
                            <div class="mb-3">
                                <label for="b_prvo" class="col-form-label">PRVO:</label>
                                <input type="text" class="form-control" id="b_prvo" name="b_prvo" value="">
                            </div>
                            <div class="mb-3">
                                <label for="b_kkp" class="col-form-label">KKP:</label>
                                <input type="text" class="form-control" id="b_kkp" name="b_kkp" value="">
                            </div>
                            <div class="mb-3">
                                <label for="belum" class="col-form-label">BELUM DIKATEGORIKAN:</label>
                                <input type="text" class="form-control" id="belum" name="belum" value="">
                            </div>
                        <div class="modal-footer">
                            <button href="dasadmin.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button name="update" class="btn btn-primary" onclick="return confirm('Apakah Yakin Ubah Data Umum Ini?')"></i> Simpan</button>
                            <button class="btn btn-primary" type="submit" id="tambah" name="tambah" class="btn btn-secondary" onclick="return confirm('Apakah Yakin Tambah Data Sensus Ini?')"><b>Submit</b></button>

                        </div>
                        </div>
                        </div>
                    </div>
                </div>    
            <div class="row g-4">
            <div class="modal fade" id="popup2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lokasi Usaha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="col-form-label">Provinsi:</label>                        
                        <select class="form-select mb-3" aria-label="Default select example" id="provinsi" name="provinsi">
                            <option value="" disabled selected hidden>Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="col-form-label">Kabupaten/ Kota:</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="kabupaten" name="kabupaten">
                            <option value="" disabled selected hidden>Pilih Kabupaten/ Kota</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="col-form-label">Kecamatan:</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="kecamatan" name="kecamatan">
                            <option value="" disabled selected hidden>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="col-form-label">Kelurahan/ Desa:</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="kelurahan" name="kelurahan">
                            <option value="" disabled selected hidden>Pilih Kelurahan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="col-form-label">Latitude:</label>
                        <input type="text" class="form-control"  id="latitude" name="latitude">
                    </div>
                    <div class="mb-3">
                        <label for="longtitude" class="col-form-label">Longitude:</label>
                        <input type="text" class="form-control"  id="longtitude" name="longtitude">
                    </div>
                    <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                       </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Komoditas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="komoditas" class="col-form-label">Komoditas:</label>
                            <input type="text" class="form-control"  id="komoditas" name="komoditas">
                        </div>
                        <div class="mb-3">
                            <label for="kelompok" class="col-form-label">Kelompok:</label>
                            <input type="text" class="form-control"  id="kelompok" name="kelompok">
                        </div>
                        <div class="mb-3">
                            <label for="biota" class="col-form-label">Biota:</label>
                            <select class="form-select mb-3" aria-label="Default select example"id="biota" name="biota" >
                                <option value="" disabled selected hidden>Pilih Biota</option>
                                <option value="Air Tawar">Air Tawar</option>
                                <option value="Air Payau">Air Payau</option>
                                <option value="Air Laut">Air Laut</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Teknologi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis_usaha" class="col-form-label">Jenis Usaha:</label>
                            <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha">
                        </div>
                        <div class="mb-3">
                            <label for="status_kusuka" class="col-form-label">Status Kusuka:</label>
                            <select class="form-select mb-3" aria-label="Default select example"id="status_kusuka" name="status_kusuka" >
                                <option value="" disabled selected hidden>Status Kusuka</option>
                                <option value="-">-</option>
                                <option value="Terdaftar">Terdaftar</option>
                                <option value="Tidak Terdaftar">Tidak Terdaftar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_pemilik" class="col-form-label">Status Kepemilikan:</label>
                            <input type="text" class="form-control" id="status_pemilik" name="status_pemilik">
                        </div><div class="mb-3">
                            <label for="luas_areal" class="col-form-label">Luas Areal (Ha):</label>
                            <input type="text" class="form-control" id="luas_areal" name="luas_areal">
                        </div>
                        <div class="mb-3">
                            <label for="media_pemeliharaan" class="col-form-label">Media Pemeliharaan:</label>
                            <input type="text" class="form-control" id="media_pemeliharaan" name="media_pemeliharaan">
                        </div>
                        <div class="mb-3">
                            <label for="kepadatan_pemeliharaan" class="col-form-label">Kepadatan Pemeliharaan:</label>
                            <input type="text" class="form-control" id="kepadatan_pemeliharaan" name="kepadatan_pemeliharaan">
                        </div>
                        <div class="mb-3">
                            <label for="teknologi" class="col-form-label">Teknologi:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="teknologi" name="teknologi">
                                <option value="" disabled selected hidden>Jenis Teknologi</option>
                                <option value="-">-</option>
                                <option value="Tradisional">Tradisional</option>
                                <option value="Semi Intensif">Semi Intensif</option>
                                <option value="Intensif">Intensif</option>
                                <option value="Bioflok">Bioflok</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>

                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Produksi & Distribusi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="produksi" class="col-form-label">Produksi (ton/Ha/tahun):</label>
                            <input type="text" class="form-control" id="produksi" name="produksi">
                        </div>
                        <div class="mb-3">
                            <label for="distribusi" class="col-form-label">Distribusi:</label>
                            <textarea class="form-control" id="distribusi" name="distribusi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="col-form-label">Harga Jual:</label>
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual">
                        </div>
                        
                    <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis_pakan" class="col-form-label">Jenis Pakan:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="jenis_pakan" name="jenis_pakan">
                                <option value="" disabled selected hidden>Jenis Pakan</option>
                                <option value="-">-</option>
                                <option value="Komersil Apung">Komersil Apung</option>
                                <option value="Komersil Tenggelam">Komersil Tenggelam</option>
                                <option value="Mandiri Apung">Mandiri Apung</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jml_pakan" class="col-form-label">Jumlah Pakan (kg):</label>
                            <input type="text" class="form-control" id="jml_pakan" name="jml_pakan" >
                        </div>
                        <div class="mb-3">
                            <label for="sumber_suplai" class="col-form-label">Sumber Suplai:</label>
                            <textarea class="form-control" id="sumber_suplai" name="sumber_suplai" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_pakan" class="col-form-label">Harga Pakan (Rp):</label>
                            <input type="text" class="form-control" id="harga_pakan" name="harga_pakan" >
                        </div>

                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                        </div>
            
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Benih</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sumber_benih" class="col-form-label">Sumber Benih:</label>
                            <textarea class="form-control" id="sumber_benih" name="sumber_benih"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jml_benih" class="col-form-label">Jumlah benih (ekor)(kg):</label>
                            <input type="text" class="form-control" id="jml_benih" name="jml_benih" >
                        </div>
                        <div class="mb-3">
                            <label for="harga_benih" class="col-form-label">Harga Benih (Rp):</label>
                            <input type="text" class="form-control" id="harga_benih" name="harga_benih" >
                        </div>

                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal & Tenaga Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jml_tk" class="col-form-label">Jumlah TK:</label>
                            <input type="text" class="form-control" id="jml_tk" name="jml_tk" >
                        </div>
                        <div class="mb-3">
                            <label for="modal" class="col-form-label">Modal (Omzet - Rp):</label>
                            <input type="text" class="form-control" id="modal" name="modal" >
                        </div>
                        <div class="mb-3">
                            <label for="sumber_modal" class="col-form-label">Sumber Modal:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="sumber_modal" name="sumber_modal" >
                                <option value="" disabled selected hidden>Sumber Modal</option>
                                <option value="-">-</option>
                                <option value="Sendiri">Sendiri</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sumber_kredit" class="col-form-label">Sumber Kredit:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="sumber_kredit" name="sumber_kredit">
                                <option value="" disabled selected hidden>Sumber Kredit</option>
                                <option value="-">-</option>
                                <option value="Kerabat">Kerabat</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                       </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lingkungan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ipal" class="col-form-label">IPAL</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="ipal" name="ipal"  >
                                <option value="" disabled selected hidden>IPAL</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tandon" class="col-form-label">Tandon:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="tandon" name="tandon" >
                                <option value="" disabled selected hidden>Tandon</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="greenbelt" class="col-form-label">Greenbelt:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="greenbelt" name="greenbelt" >
                                <option value="" disabled selected hidden>Greenbelt</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jarak_pantai" class="col-form-label">Jarak ke Bibir Pantai (m):</label>
                            <input type="text" class="form-control" id="jarak_pantai" name="jarak_pantai" >
                        </div>
                        <div class="mb-3">
                            <label for="sumber_air" class="col-form-label">Sumber Air:</label>
                            <select class="form-select mb-3" aria-label="Default select example"id="sumber_air" name="sumber_air"  >
                                <option value="" disabled selected hidden>Sumber Air</option>
                                <option value="-">-</option>
                                <option value="Mata Air">Mata Air</option>
                                <option value="Air tanah">Air tanah</option>
                                <option value="Sumbur bor">Sumbur bor</option>
                                <option value="Sungai">Sungai</option>
                                <option value="Laut">Laut</option>
                                <option value="Danau">Danau</option>
                                <option value="Campuran">Campuran</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perizinan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status_izin" class="col-form-label">Status Izin</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="status_izin" name="status_izin" >
                                <option value="" disabled selected hidden>Status Izin</option>
                                <option value="-">-</option>
                                <option value="Sudah Berizin">Sudah Berizin</option>
                                <option value="Tidak Berizin">Tidak Berizin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_nib" class="col-form-label">Status NIB:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="status_nib" name="status_nib" >
                                <option value="" disabled selected hidden>Status NIB</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="skala_usaha" class="col-form-label">Skala Usaha:</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="skala_usaha" name="skala_usaha">
                                <option value="" disabled selected hidden>Skala Usaha</option>
                                <option value="-">-</option>
                                <option value="Mikro">Mikro</option>
                                <option value="Kecil">Kecil</option>
                                <option value="Menengah">Menengah</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lain-lain</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="asuransi" class="col-form-label">Asuransi</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="asuransi" name="asuransi" >
                                <option value="" disabled selected hidden>Asuransi</option>
                                <option value="-">-</option>
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bantuan" class="col-form-label">Bantuan</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="bantuan" name="bantuan"  >
                                <option value="" disabled selected hidden>Bantuan</option>
                                <option value="-">-</option>
                                <option value="Ada">KKP</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div><div class="mb-3">
                            <label for="penghargaan" class="col-form-label">Penghargaan</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="penghargaan" name="penghargaan"  >
                                <option value="" disabled selected hidden>Penghargaan</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div><div class="mb-3">
                            <label for="dukungan_pemda" class="col-form-label">Dukungan Pemda</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="dukungan_pemda" name="dukungan_pemda"  >
                                <option value="" disabled selected hidden>Dukungan Pemda</option>
                                <option value="-">-</option>
                                <option value="Penyuluhan">Penyuluh</option>
                                <option value="Bimtek">Bimtek</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div><div class="mb-3">
                            <label for="dukungan_pusat" class="col-form-label">Dukungan Pusat</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="dukungan_pusat" name="dukungan_pusat"  >
                                <option value="" disabled selected hidden>Dukungan Pusat</option>
                                <option value="-">-</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyuluh" class="col-form-label">Nama Penyuluh:</label>
                            <input type="text" class="form-control" id="nama_penyuluh" name="nama_penyuluh" >
                        </div>
                        <div class="mb-3">
                            <label for="sertifikat" class="col-form-label">Sertifikat:</label>
                            <input type="text" class="form-control" id="sertifikat" name="sertifikat" >
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enumerator / Petugas Sensus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="foto" class="col-form-label">Foto Petugas</label>
                            <input type="file" class="form-control" id="foto" name="foto" >
                        </div>
                        <div class="mb-3">
                            <label for="nama_petugas" class="col-form-label">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" >
                        </div>
                        <div class="mb-3">
                            <label for="nik_petugas" class="col-form-label">NIK:</label>
                            <input type="text" class="form-control" id="nik_petugas" name="nik_petugas" >
                        </div>
                        <div class="mb-3">
                            <label for="waktu_sensus" class="col-form-label">Waktu Sensus:</label>
                            <input type="datetime-local" class="form-control" id="waktu_sensus" name="waktu_sensus" >
                            
                        </div>
                        <div class="mb-3">
                            <label for="perubahan_terakhir" class="col-form-label">Perubahan Terakhir:</label>
                            <input type="datetime-local" class="form-control" id="perubahan_terakhir" name="perubahan_terakhir" >
                            
                        </div>
                        <div class="modal-footer">
                        <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                       </div>
                    </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="row g-4">
            <div class="modal fade" id="popup13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">UPT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="upt" name="upt" >
                        </div>
                    
                    <div class="modal-footer">
                    <button href="input1.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                    </div>
                    </div>
                </div>
            </div> 
        </div>

<div class="text-center">
    <button class="btn btn-primary" style="margin-top:300px; font-size: 20px;" type="submit" id="tambah" name="tambah" class="btn btn-secondary" onclick="return confirm('Apakah Yakin Tambah Data Sensus Ini?')"><b>Submit</b></button>
    </form> 
    </div>  

      
        <!-- Content End -->

        <!-- Back to Top -->
    </div>

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
    <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>Pilih Provinsi</option>`;
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kabupaten');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => { 
                    var data = regencies;
                    var tampung = `<option>Pilih Kabupaten/ Kota</option>`;
                    document.getElementById('kabupaten').innerHTML = '<option>Pilih Kabupaten/ Kota</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kabupaten").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih Kecamatan</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih Kelurahan</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>
</body>

</html>