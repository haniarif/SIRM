<?php
	$host="localhost";
	$username="root";
	$password="";
	$database="si_rm4";
	
	$conn=mysql_connect("$host","$username","$password");
	if(!$conn)die("Koneksi Gagal");
	mysql_select_db($database,$conn) or die("Database tidak ditemukan");
?>