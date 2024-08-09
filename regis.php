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
            <h2>Registrasi</h2>
            <div class="input-div one">
                <div class="i">
                <i class="fas fa-user"></i>
                </div>
                <div class="div">
                <h5>Username</h5>
                <input type="text" class="input" name="username"/>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                <h5>Email</h5>
                <input type="email" class="input" name="email"/>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                <h5>Password</h5>
                <input type="password" class="input" name="password"/>
                </div>
            </div>
            <input type="submit" class="btn" value="registrasi" />
            <a class="text-center" href="login.php">Kembali</a>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>