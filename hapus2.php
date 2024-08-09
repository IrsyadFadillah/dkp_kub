<?php
session_start();
require 'koneksi.php';

$id = $_GET['id'];

$query = "delete from sensus where id = $id";

if(mysqli_query($koneksi, $query)){
    echo "<script>
    alert('Data berhasil dihapus!');
    </script>";
    header("Location: dasadmin.php");
}else{
    echo "Tidak berhasil";
}

?>
