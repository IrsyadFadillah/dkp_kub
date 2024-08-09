<?php
    session_start();
    include("koneksi.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user where email = '$email'";
    $query = mysqli_query($koneksi,$sql);

    if(mysqli_num_rows($query) == 0 ){
        header("location:login.php?alert=gagal");
    }else {
        $username = mysqli_fetch_assoc($query);
        if(password_verify($password,$username['password'])){
            if($username['is_verified']==1){
                session_start();
                $_SESSION['isLogin'] = true;
                $_SESSION['username'] = $username;
    
                header("location: dasprokon.php");
            }else {
                header("location: verif.php");
            }
        }else {
            header("location:login.php?alert=gagal");
        }
    }
?>