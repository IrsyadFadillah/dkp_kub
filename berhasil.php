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
            <h2>Verifikasi Anda Sukses, Silahkan Login!</h2>
            <a class="text-center" href="login.php"> Login disini</a>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>