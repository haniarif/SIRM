
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type ='text/javascript' src='../../config/jquery-min.js'></script>
	<script type ='text/javascript' src='../../config/custom.js'></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="master/index.php">SIRM</a></h1>
			<div id="top-navigation">
				<a href="#">Ubah Password</a>
				<span>|</span>
				<a href="#">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
				<div id='master'><li><a href="master.php" class="active"><span>MASTER DATA</span></a></li></div>
				<div id='transaksi'><li><a href="../../transaksi.php"><span>TRANSAKSI</span></a></li></div>
			    <div id='administrasi'><li><a href="../../administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <div id='informasi'><li><a href="../../informasi.php"><span>INFORMASI</span></a></li></div>
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
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>MASTER DATA</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content" height=800>
						<div id='master'></div>
						<a href='index.php?master=klinik' class='master' title="Klinik"><span><img src="../../css/images/klinik.jpg"></span></a>
						<a href='index.php?master=spesialisasi' class='master' title="Spesialisasi"><span><img src="../../css/images/spesialisasi.jpg"></span></a>
						<a href='index.php?master=dokter' class='master' title="Dokter"><span><img src="../../css/images/dokter.jpg">  </span></a> <!-- dokter--> 
						<a href='index.php?master=layanan' class='master' title="Layanan"><span><img src="../../css/images/layanan.jpg"></span></a>
						<a href='index.php?master=kamar' class='master' title="Kamar"><span><img src="../../css/images/kamar.jpg"></span></a>
						<a href='index.php?master=pegawai' class='master' title="Pegawai"><span><img src="../../css/images/pegawai.jpg"></span></a>
						<a href='index.php?master=pasien' class='master' title="Pasien"><span><img src="../../css/images/pasien.jpg"></span></a>
						<a href='index.php?master=datarm' class='master' title="Rekam Medik"><span><img src="../../css/images/rekam_medik.jpg"></span></a>
						<a href='index.php?master=jenis_kasus' class='master' title="Jenis Kasus"><span><img src="../../css/images/jenis_kasus.jpg"></span></a>
						<a href='index.php?master=icd9' class='master' title="ICD9"><span><img src="../../css/images/icd9.jpg"></span></a>
						<a href='index.php?master=icd10' class='master' title="ICD10"><span><img src="../../css/images/icd10.jpg"></span></a>	
						<?php 
						if($_GET['master']=='klinik'){
								include "klinik.php";
							}elseif($_GET['master']=='spesialisasi'){
								include "spesialisasi.php";
							}elseif($_GET['master']=='dokter'){
								include "dokter.php";
							}elseif($_GET['master']=='layanan'){
								include "layanan.php";
							}elseif($_GET['master']=='kamar'){
								include "kamar.php";
							}elseif($_GET['master']=='pegawai'){
								include "pegawai.php";
							}elseif($_GET['master']=='pasien'){
								include "pasien.php";
							}elseif($_GET['master']=='datarm'){
								include "datarm.php";
							}elseif($_GET['master']=='jenis_kasus'){
								include "jenis_kasus.php";
							}elseif($_GET['master']=='icd9'){
								include "icd9.php";
							}elseif($_GET['master']=='icd10'){
								include "icd10.php";
							}
							else{
								echo "Selamat Datang" ;
							}
						?>
					</div>
				</div>
				<!-- End Box -->
			</div>
					
				</div>
				<!-- End Box -->			
		</div>
		<!-- Main -->
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

