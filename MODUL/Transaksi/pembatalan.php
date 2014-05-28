<?php
session_start();
if(empty($_SESSION['id_pengguna'])){ ?>
	<meta http-equiv="refresh" content="0;url=../../login.php" /><?php
}
include "../../koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="../index.php">SIRM</a></h1>
			<div id="top-navigation">
				<a href="#">Ubah Password</a>
				<span>|</span>
				<a href="../../logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="../master/master.php" ><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php" class="active"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../informasi/informasi.php"><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<!-- Start Shell -->
	<div class="shell">
		<!-- Main -->
		<div id="main">
			<div class="box">					
				<!-- Box Head -->
				<div class="box-head">
					<h2>PEMBATALAN KUNJUNGAN</h2>
				</div>
				<!-- End Box Head-->
				
				<div class="box-content" style="height:443px;">
					<!-- Table -->
					<div class="table">
					<form method="post" action="pembatalan.php" class="form">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>NO. RM</td>
<<<<<<< HEAD
								<td><input type="text" name="id_pendftrn" id="input_data">
										<script type='text/javascript'>
=======
								<td> <input type="text" name="id_pendftrn" id="input_data">
									<script type='text/javascript'>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_no_rm", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
<<<<<<< HEAD
												get_pasien_rj(item.name)
=======
												get_pasien(item.name)
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
											}
											
										});
									});
									
<<<<<<< HEAD
									function get_pasien_rj(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_pasien_rj&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pendf_rj = data[0];
												
												console.log(pendf_rj);	
												$('#nama_pasien').val(pendf_rj.name);
												
=======
									function get_pasien(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_pasien&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pasien = data[0];
												
												console.log(pasien);
												$('#nama_pasien').val(pasien.name);
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
											}
										});
									}
									</script></td>
							</tr>
							<tr>
								<td>NAMA</td>
<<<<<<< HEAD
								<td><input type="text" name="id_pendftrn" id="nama_pasien" class="isi"></td>
=======
								<td><input type="text" name="nama_pasien" id="nama_pasien" class="isi"></td>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
							</tr>
							<tr>
								<td> <input type="submit" name="submit" value=SIMPAN></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>	
						
						</div>
					</div>
				</div>
			</div>
			<!-- End Box -->	
		</div>
		<!-- End Main -->		
	</div>
	<!-- End Shell -->	
</div>
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
<?php

// simpan pembatalan
if (isset($_POST['submit'])){
include "../../koneksi.php";
	mysql_query("insert into pembatalan (id_batal, id_pendftrn) 
			values ('','$_POST[id_pendftrn]')");
	echo "<meta http-equiv='refresh' content='0; url=pembatalan.php'>";
}
?>

