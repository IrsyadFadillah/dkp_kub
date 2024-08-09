<?php
    session_start();
    include("koneksi.php");

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM user where verif_code = '$code'";
        $query = mysqli_query($koneksi,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id_user'];
            $sql =  "UPDATE user set is_verified=1 where id_user=$id";
            $query = mysqli_query($koneksi,$sql);
            if($query){
                header("location:berhasil.php");
            }else{
                echo "VERIFIKASI GAGAL ERROR : ".$query;
            }
        }else {
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else {
        echo "code ga nih";
    }

?>