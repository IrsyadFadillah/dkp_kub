<?php
session_start();

require 'koneksi.php';

if(!isset($_SESSION['nama_user'])){
    header("Location: loginadmin.php");
 }

$sensus = query("SELECT * FROM sensus");


if (isset($_POST['update'])) {
    if (update($_POST) > 0) {
        echo "<script>
                alert('Data sensus berhasil diupdate!');
                document.location.href = 'dasadmin.php';
            </script>";
    } else {
       
        echo "<script>
                alert('Data sensus gagal diupdate!');
            </script>";
    }
    exit;
}



if(isset($_GET['verifyid'])){
    $idToUpdate = $_GET['verifyid'];

    $data = array(
        "verif" => 1,
    );

    $condition = array(
        "id" => $idToUpdate
    );

    updateData("sensus", $data, $condition);

    // Perbarui kembali data sensus setelah perubahan verifikasi
    $sensus = query("SELECT * FROM sensus");

    header("location: dasadmin.php");
    exit;
}

if(isset($_GET['unverifyid'])){
    $idToUpdate = $_GET['unverifyid'];

    $data = array(
        "verif" => 0,
    );

    $condition = array(
        "id" => $idToUpdate
    );

    updateData("sensus", $data, $condition);

    // Perbarui kembali data sensus setelah perubahan verifikasi
    $sensus = query("SELECT * FROM sensus");

    header("location: dasadmin.php");
    exit;
}


$query = "SELECT COUNT(*) as total FROM sensus";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$total = $row['total'];

$query2 = "SELECT COUNT(*) as totalverif FROM sensus WHERE verif = 1";
$result = mysqli_query($koneksi, $query2);
$row = mysqli_fetch_assoc($result);
$totalverif = $row['totalverif'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin DKP</title>
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

        // Fungsi untuk menentukan apakah elemen dalam viewport
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Fungsi untuk memperbarui tautan navigasi berdasarkan posisi gulir
        function updateNavigation() {
            var navigationLinks = document.querySelectorAll('.nav-link'); // Ganti .nav-link dengan kelas tautan navigasi Anda
            var containerItems = document.querySelectorAll('.container-kanan > div'); // Ganti .container-kanan dengan kelas kontainer kanan Anda

            containerItems.forEach(function(item, index) {
                if (isElementInViewport(item)) {
                    navigationLinks.forEach(function(link) {
                        link.classList.remove('active'); // Hapus kelas 'active' dari semua tautan navigasi
                    });
                    navigationLinks[index].classList.add('active'); // Tambahkan kelas 'active' ke tautan navigasi yang sesuai
                }
            });
        }

        // Panggil fungsi updateNavigation saat posisi gulir berubah
        window.addEventListener('scroll', updateNavigation);
        window.addEventListener('resize', updateNavigation);
        updateNavigation(); // Panggil fungsi sekali saat halaman dimuat untuk menetapkan tautan awal yang aktif
	</script>

    <style>
        
        .container-kiri, .container-kanan {
            float: left;
            width: 48%;
            box-sizing: border-box; /* Agar padding tidak mempengaruhi lebar total */
            height: 675px; /* Atau tentukan tinggi maksimum sesuai kebutuhan Anda */
            overflow-y: scroll; /* Menambahkan scroll vertikal */
        }

        .pembatas {
            float: left;
            width: 4%;
            box-sizing: border-box;
            border-left: 2px solid grey; /* Garis vertikal */
            height: 675px; /* Sesuaikan tinggi sesuai konten */
        }

        .container-kiri {
            padding-right: 2%;
        }

        .container-kanan {
            padding-left: 1%;
        }

        .modal-dialog {
            max-width: 97%; /* Sesuaikan dengan lebar maksimum yang diinginkan */
            max-height: 80vh; /* Sesuaikan dengan tinggi maksimum yang diinginkan */
        }
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
            height: 470px;
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
                    <a href="dasadmin.php" class="nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="inputdatakub.php" class="nav-link"><i class="fa fa-laptop me-2"></i>Input Data</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="height:60px;">
                <a href="dasadmin.php" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="img/logodkp.png" width="90" height="50" class="d-inline-block align-text-top align-items-center">
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
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-5">
                                <h2 style="color:cornflowerblue" >ADMIN KUB BANTEN </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-5">
                                <p class="mb-2">Total Data</p>
                                <h6 class="mb-0">
                                <?php
                                echo $total;
                                ?>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-certificate fa-3x text-primary"></i>
                            <div class="ms-5">
                                <p class="mb-2">Terverifikasi</p>
                                <h6 class="mb-0">
                                    <?=$totalverif?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Sale & Revenue End -->


            

            <!-- Recent Sales Start -->
            <div class="table-container">
            <div class="container-fluid pt-4 px-4" >
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <H4 class="mb-0" >DATA SENSUS PEMBUDIDAYA</H4>
                    <input type="text" id="myInput" placeholder="Cari...">
                    <a href="excel.php" class="btn btn-success"><i class="lni lni-download"></i> Ekspor Data</a>
                    </div>
                    <div class="table-responsive scroll">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                                <tr class="text-dark table-border">
                                    <th style="border-color: grey;" rowspan="2">NO</td>
                                    <th style="border-color: grey;" rowspan="2">STATUS</td>
                                    <th style="border-color: grey;" rowspan="2">AKSI</td>
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
                                
                                <?php
            $i = 1;
            foreach ($sensus as $row) :
                ?>
                <tbody id="myTable">
                                <tr style="border-color: grey;">
                                    <td class="text-dark" ><?php echo $i; ?></td>
                                    <td>
                                        <div class="d-flex" style="gap:30px; justify-content: between;">
                                            <?php if($row['verif'] == 0) : ?>
                                            <a class="btn btn-danger btn-sm" style="font-weight: 300px;" name="verif" href="?verifyid=<?=$row['id']?>" value="terima" onclick="return confirm('Apakah Yakin Verifikasi Data Sensus Ini?')"><i class="bi bi-x"></i></a>
                                            <?php else : ?>
                                                <a class="btn btn-success btn-sm" style="font-weight: 300px;" name="verif" href="?unverifyid=<?=$row['id']?>" value="terima" onclick="return confirm('Apakah Yakin Unverifikasi Data Sensus Ini?')"><i class="bi bi-check"></i></a>
                                            <?php endif ?>
                                            <a href="hapus2.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 300px; display:inline;" name="hapus" onclick="return confirm('Apakah Yakin Hapus Data Sensus Ini?')"><i class="bi bi-trash-fill"></i></a>
                                        </div>    
                                    </td>
                                    <td><a  data-bs-toggle="modal" data-bs-target="#popup1<?= $row['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 300px;"><i class="bi bi-pencil-fill"></i></a><br></td>
                                    <td class="text-dark" ><?php echo $row["kab_kota"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["nama_kub"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["alamat_kub"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["ketua"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["notelp"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["jumlah_anggota"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["aktifnon"]; ?></td>
                                    <td><img src="img/<?php echo $row["kusuka"]; ?>" width="80px" alt=""></td>
                                    <td><img src="img/<?php echo $row["npwp"]; ?>" width="80px" alt=""></td>
                                    <td><img src="img/<?php echo $row["akte_notaris"]; ?>" width="80px" alt=""></td>
                                    <td><img src="img/<?php echo $row["sertifikat_ahu"]; ?>" width="80px" alt=""></td>
                                    <td><img src="img/<?php echo $row["nib_oss"]; ?>" width="80px" alt=""></td>
                                    <td class="text-dark" ><?php echo $row["kelas_kub"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["b_kabkota"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["b_prvo"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["b_kkp"]; ?></td>
                                    <td class="text-dark" ><?php echo $row["belum"]; ?></td>
                                    
                                </tr>
                                </tbody>
                                <?php
                $i++;
                endforeach; 
            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content End -->
        <?php $i = 1; foreach ($sensus as $row) : ?>
        <div class="modal" id="popup1<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DATA KUB DKP BANTEN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                            <div class="container-kiri">
                                    <div class="mb-3">
                                        <label for="kab_kota" class="col-form-label">KAB/ KOTA:</label>
                                        <select class="form-select mb-3" aria-label="Default select example "id="kab_kota" name="kab_kota">
                                            <?php $kab_kota = $row['kab_kota']; ?>
                                            <option value="" <?= $kab_kota == '' ? 'selected' : null ?> disabled selected hidden>Pilih Kab/ Kota</option>
                                            <option value="Kabupaten Pandeglang" <?= $kab_kota == 'Kabupaten Pandeglang' ? 'selected' : null ?>>Kabupaten Pandeglang</option>
                                            <option value="Kabupaten Lebak" <?= $kab_kota == 'Kabupaten Lebak' ? 'selected' : null ?>>Kabupaten Lebak</option>
                                            <option value="Kabupaten Tanggerang" <?= $kab_kota == 'Kabupaten Tanggerang' ? 'selected' : null ?>>Kabupaten Tanggerang</option>
                                            <option value="Kabupaten Serang" <?= $kab_kota == 'Kabupaten Serang' ? 'selected' : null ?>>Kabupaten Serang</option>
                                            <option value="Kota Tangerang" <?= $kab_kota == 'Kota Tangerang' ? 'selected' : null ?>>Kota Tangerang</option>
                                            <option value="Kota Serang" <?= $kab_kota == 'Kota Serang' ? 'selected' : null ?>>Kota Serang</option>
                                            <option value="Kota Cilegon" <?= $kab_kota == 'Kota Cilegon' ? 'selected' : null ?>>Kota Cilegon</option>
                                            <option value="Kota Tangerang Selatan" <?= $kab_kota == 'Kota Tangerang Selatan' ? 'selected' : null ?>>Kota Tangerang Selatan</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_kub" class="col-form-label">Nama KUB:</label>
                                        <input type="text" class="form-control" id="nama_kub" name="nama_kub" value="<?= $row['nama_kub'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_kub" class="col-form-label">Alamat KUB:</label>
                                        <input type="text" class="form-control" id="alamat_kub" name="alamat_kub" value="<?= $row['alamat_kub'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ketua" class="col-form-label">Ketua:</label>
                                        <input type="text" class="form-control" id="ketua" name="ketua" value="<?= $row['ketua'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="notelp" class="col-form-label">No. Telp/ HP:</label>
                                        <input type="number" class="form-control" id="notelp" name="notelp" value="<?= $row['notelp'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_anggota" class="col-form-label">Jumlah Anggota:</label>
                                        <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota" value="<?= $row['jumlah_anggota'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="aktifnon" class="col-form-label">Aktif/ Non Aktif:</label>
                                        <div class="col-sm-10">
                                        <?php $aktifnon = $row['aktifnon']; ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="Aktif" name="aktifnon" value="Aktif" <?= $aktifnon == 'Aktif' ? 'checked' : null ?>>
                                                <label class="form-check-label" for="Aktif">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="Non Aktif" name="aktifnon" value="Non Aktif" <?= $aktifnon == 'Non Aktif' ? 'checked' : null ?>>
                                                <label class="form-check-label" for="Non Aktif">
                                                    Non Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelas_kub" class="col-form-label">Kelas KUB:</label>
                                        <select class="form-select mb-3" aria-label="Default select example "id="kelas_kub" name="kelas_kub">
                                            <?php $kelas_kub = $row['kelas_kub']; ?>
                                            <option value="" <?= $kelas_kub == '' ? 'selected' : null ?> disabled selected hidden>Pilih Kelas KUB</option>
                                            <option value="Pemula" <?= $kelas_kub == 'Pemula' ? 'selected' : null ?>>Pemula</option>
                                            <option value="Madya" <?= $kelas_kub == 'Madya' ? 'selected' : null ?>>Madya</option>
                                            <option value="Utama" <?= $kelas_kub == 'Utama' ? 'selected' : null ?>>Utama</option>
                                            
                                        </select>
                                    </div> <hr />
                                    <h6 class="modal-title">BANTUAN PEMERINTAH YANG PERNAH DITERIMA</h6>
                                    <div class="mb-3">
                                        <label for="b_kabkota" class="col-form-label">Kab/ Kota:</label>
                                        <input type="text" class="form-control" id="b_kabkota" name="b_kabkota" value="<?= $row['b_kabkota'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="b_prvo" class="col-form-label">PRVO:</label>
                                        <input type="text" class="form-control" id="b_prvo" name="b_prvo" value="<?= $row['b_prvo'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="b_kkp" class="col-form-label">KKP:</label>
                                        <input type="text" class="form-control" id="b_kkp" name="b_kkp" value="<?= $row['b_kkp'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="belum" class="col-form-label">BELUM DIKATEGORIKAN:</label>
                                        <input type="text" class="form-control" id="belum" name="belum" value="<?= $row['belum'];?>">
                                    </div>
                                    
                            </div>
                            <div class="pembatas"></div>

                            <div class="container-kanan">
                                <h6 class="modal-title">KELENGKAPAN ADMINISTRASI KUB</h6><hr />
                                    <nav class="navbar">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#kusuka">KUSUKA</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#npwp">NPWP</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#akte_notaris">Akte Notaris</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#sertifikat_ahu">Sertifikat AHU</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#nib_oss">NIB-OSS</a>
                                            </li>        
                                        </ul>
                                        
                                    </nav><hr />
                                <div id="kusuka" class="mb-3">
                                        <label for="kusuka" class="col-form-label">KUSUKA</label><br>
                                        <img style="width:600px; " src="img/<?=$row['kusuka']?>" alt="">
                                        <br>
                                    <small>Abaikan Jika tidak ingin merubah kusuka</small> 
                                        <input type="hidden" name="kusukalama" value="<?=$row['kusuka']?>">
                                        <input type="file" class="form-control" id="myFileInput" name="kusuka">
                                </div>
                                <div id="npwp" class="mb-3">
                                        <label for="npwp" class="col-form-label">NPWP</label><br>
                                        <img style="width:600px;" src="img/<?=$row['npwp']?>" alt="">
                                        <br>
                                    <small>Abaikan Jika tidak ingin merubah NPWP</small> 
                                        <input type="hidden" name="npwplama" value="<?=$row['npwp']?>">
                                        <input type="file" class="form-control" id="myFileInput" name="npwp">
                                </div>
                                <div id="akte_notaris" class="mb-3">
                                        <label for="akte_notaris" class="col-form-label">Akte Notaris</label><br>
                                        <img style="width:600px;" src="img/<?=$row['akte_notaris']?>" alt="">
                                        <br>
                                    <small>Abaikan Jika tidak ingin merubah Akte Notaris</small> 
                                        <input type="hidden" name="akte_notarislama" value="<?=$row['akte_notaris']?>">
                                        <input type="file" class="form-control" id="myFileInput" name="akte_notaris">
                                </div>
                                <div id="sertifikat_ahu" class="mb-3">
                                        <label for="sertifikat_ahu" class="col-form-label">Sertifikat AHU</label><br>
                                        <img style="width:600px;" src="img/<?=$row['sertifikat_ahu']?>" alt="">
                                        <br>
                                    <small>Abaikan Jika tidak ingin merubah Sertifikat AHU</small> 
                                        <input type="hidden" name="sertifikat_ahulama" value="<?=$row['sertifikat_ahu']?>">
                                        <input type="file" class="form-control" id="myFileInput" name="sertifikat_ahu">
                                </div>
                                <div id="nib_oss" class="mb-3">
                                        <label for="nib_oss" class="col-form-label">NIB-OSS</label><br>
                                        <img style="width:600px;" src="img/<?=$row['nib_oss']?>" alt="">
                                        <br>
                                    <small>Abaikan Jika tidak ingin merubah NIB-OSS</small> 
                                        <input type="hidden" name="nib_osslama" value="<?=$row['nib_oss']?>">
                                        <input type="file" class="form-control" id="myFileInput" name="nib_oss">
                                </div>
                            </div>    
                        
                        </div>
                    <div class="modal-footer">
                        <button href="dasadmin.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button name="update" class="btn btn-primary" onclick="return confirm('Apakah Yakin Ubah Data Umum Ini?')"></i> Simpan</button>
                    </div>
                    </div>   
                    
                        
                </div>
            </div>
        </div>
                
    </div>
    </form>
    <?php
            $i++;
                endforeach; 
            ?>  
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    <script src="js/table.js"></script>
    
</body>


</html>