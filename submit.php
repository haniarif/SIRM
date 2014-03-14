<?php
session_start();
include "modul/administrasi/koneksi.php";
$namauser = $_POST['user'];
$password = $_POST['password'];

$login=mysql_query("SELECT * FROM pengguna WHERE user='$namauser'");
$hasil=mysql_num_rows($login);
if ($hasil>=1){
echo "<p>Selamat datang ".$namauser."</p>";
$_SESSION['user']=$namauser;
header('location:modul/index.php');
}else{
echo "gagal";
}
?>