<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>REGISTRASI ADMIN</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <link rel="icon" type="image/x-icon" href="assets/reef_ocean_nature_diving_coral_icon_209419.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/login.css?v= <?php echo time(); ?>" type="text/css">
</head>

<body>
    <div class="container">
        <div class="img">
            <img src="img/lambang-daerah-prov-banten-e1630273695970.png" />
        </div>
        <div class="login-content">
            <form novalidate action="prosesregis.php" method="post">
            <h2>Registrasi Anda Sukses, Silahkan Verifikasi Email Terlebih Dahulu!</h2>
            <a class="text-center" href="login.php"> Sudah Verfikasi? Silahkan Login disini</a>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>



mmmm.


<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="kusuka-tab" data-bs-toggle="tab" data-bs-target="#kusuka" type="button" role="tab" aria-controls="kusuka" aria-selected="true">KUSUKA</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="npwp-tab" data-bs-toggle="tab" data-bs-target="#npwp" type="button" role="tab" aria-controls="npwp" aria-selected="false">NPWP</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="akte-notaris-tab" data-bs-toggle="tab" data-bs-target="#akte-notaris" type="button" role="tab" aria-controls="akte-notaris" aria-selected="false">Akte Notaris</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sertifikat-ahu-tab" data-bs-toggle="tab" data-bs-target="#sertifikat-ahu" type="button" role="tab" aria-controls="sertifikat-ahu" aria-selected="false">Sertifikat AHU</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="nib-oss-tab" data-bs-toggle="tab" data-bs-target="#nib-oss" type="button" role="tab" aria-controls="nib-oss" aria-selected="false">NIB-OSS</button>
        </li>
</ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kusuka" role="tabpanel" aria-labelledby="kusuka-tab">
            <div class="container-kanan">
                <!-- KUSUKA content -->
                <div id="kusuka-section" class="mb-3 section">
                    <label for="kusuka" class="col-form-label">KUSUKA</label><br>
                    <img style="width:600px; height:800px" src="img/<?=$row['kusuka']?>" alt="">
                    <br>
                    <small>Abaikan Jika tidak ingin merubah kusuka</small> 
                    <input type="hidden" name="kusukalama" value="<?=$row['kusuka']?>">
                    <input type="file" class="form-control" id="myFileInput" name="kusuka">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="npwp" role="tabpanel" aria-labelledby="npwp-tab">
            <div class="container-kanan">
                <!-- NPWP content -->
                <div id="npwp-section" class="mb-3 section">
                    <label for="npwp" class="col-form-label">NPWP</label><br>
                    <img style="width:600px; height:800px" src="img/<?=$row['npwp']?>" alt="">
                    <br>
                    <small>Abaikan Jika tidak ingin merubah NPWP</small> 
                    <input type="hidden" name="npwplama" value="<?=$row['npwp']?>">
                    <input type="file" class="form-control" id="myFileInput" name="npwp">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="akte-notaris" role="tabpanel" aria-labelledby="akte-notaris-tab">
            <div class="container-kanan">
                <!-- Akte Notaris content -->
                <div id="akte_notaris-section" class="mb-3 section">
                    <label for="akte_notaris" class="col-form-label">Akte Notaris</label><br>
                    <img style="width:600px; height:800px" src="img/<?=$row['akte_notaris']?>" alt="">
                    <br>
                    <small>Abaikan Jika tidak ingin merubah Akte Notaris</small> 
                    <input type="hidden" name="akte_notarislama" value="<?=$row['akte_notaris']?>">
                    <input type="file" class="form-control" id="myFileInput" name="akte_notaris">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="sertifikat-ahu" role="tabpanel" aria-labelledby="sertifikat-ahu-tab">
            <div class="container-kanan">
                <!-- Sertifikat AHU content -->
                <div id="sertifikat_ahu-section" class="mb-3 section">
                    <label for="sertifikat_ahu" class="col-form-label">Sertifikat AHU</label><br>
                    <img style="width:600px; height:800px" src="img/<?=$row['sertifikat_ahu']?>" alt="">
                    <br>
                    <small>Abaikan Jika tidak ingin merubah Sertifikat AHU</small> 
                    <input type="hidden" name="sertifikat_ahulama" value="<?=$row['sertifikat_ahu']?>">
                    <input type="file" class="form-control" id="myFileInput" name="sertifikat_ahu">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nib-oss" role="tabpanel" aria-labelledby="nib-oss-tab">
            <div class="container-kanan">
                <!-- NIB-OSS content -->
                <div id="nib_oss-section" class="mb-3 section">
                    <label for="nib_oss" class="col-form-label">NIB-OSS</label><br>
                    <img style="width:600px; height:800px" src="img/<?=$row['nib_oss']?>" alt="">
                    <br>
                    <small>Abaikan Jika tidak ingin merubah NIB-OSS</small> 
                    <input type="hidden" name="nib_osslama" value="<?=$row['nib_oss']?>">
                    <input type="file" class="form-control" id="myFileInput" name="nib_oss">
                </div>
                
            </div>
        </div>
    </div>