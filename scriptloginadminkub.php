
<?php
    //start the session
    session_start();
    include ("koneksi.php");

    $nama_user = $_POST['nama_user'];
    $password_user = $_POST['password_user'];

    $query = "select * from admin u, sensus m where u.nama_user = '$nama_user' and u.password_user = md5('$password_user')"; // and m.nama_user = a.nama_user"
    $result = mysqli_query($koneksi, $query);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['nama_user'] = $nama_user;
            $_SESSION['nama_user'] = $row['nama_user'];
        }
        header("Location: dasadmin.php");
    }else{

        header("Location: loginadmin.php");
    }
?>