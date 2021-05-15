<?php

//koneksi ke database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "mypc";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);
if($koneksi-> connect_errno){
    echo 'gagal terhubung';
    exit();
}
?>