<?php
session_start();
if(empty($_SESSION['id_pengguna'])){ ?>
	<meta http-equiv="refresh" content="0;url=../login.php" /><?php
}
include "../koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<script type ='text/javascript' src='config/jquery-min.js'></script>
		<script type ='text/javascript' src='config/custom.js'></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="index.php">SIRM</a></h1>
			<div id="top-navigation">
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="../logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="Master/master.php" class='master'><span>MASTER DATA</span></a></li>
				<li><a href="Transaksi/transaksi.php" class='transaksi'><span>TRANSAKSI</span></a></li>
			    <li><a href="administrasi/administrasi.php" class='administrasi'><span>ADMINISTRASI</span></a></li>
			    <li><a href="informasi/informasi.php" class='informasi'><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				<p align=center> <font><b>SELAMAT DATANG ADMINISTRATOR DI  </font><br> SISTEM INFORMASI REKAM MEDIS<b></p>
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>