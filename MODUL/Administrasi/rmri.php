<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
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
				<a href="#">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="../Master/master.php" ><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php" ><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php" class="active"><span>ADMINISTRASI</span></a></li>
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
			<div class="box-content" style="height:800px;">
			<div class="box">					
				<!-- Box Head -->
				<div class="box-head">
					<h2>REKAM MEDIS RAWAT DARURAT</h2>
				</div>
				<!-- End Box Head-->
						<div class="box" style="float:left;width: 49%;height:238px;margin-top:1%;margin-left:1%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 68%;">
								<h2>DATA PASIEN</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>NO. RM</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td><textarea name=alamatpenanggungjawab style="width: 120%;height: 80px;"> </textarea></td>
									</tr>
									<tr>
										<td>JENIS KELAMIN</td>
										<td><input type="radio" name="radioku" value=laki-laki> Laki-laki
										<input type="radio" name="radioku" value=perempuan> Perempuan</td>
									</tr>
									<tr>
										<td>GOL. DARAH</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>AGAMA</td>
										<td><input type=text; name=namapenanggungjawab;></textarea></td>
									</tr>
									<tr>
										<td>TENSI</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>NADI</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>SUHU</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>NAFAS</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>TINGGI</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>BERAT</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
								</table>				
							</div>
						</div>
						<div class="box" style="float:rifght;width: 40%;height:50px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>ALASAN DATANG</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>ALASAN DATANG</td>
										<td><select width=50px><option value=alasandatang>Pilih Alasan Datang</option>
										</select></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="box" style="float:rifght;width: 40%;height:65px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>KEJADIAN</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>WAKTU</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>TEMPAT</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
								</table>
							</div>
						</div>
					<div class="box" style="float:rifght;width: 40%;height:65px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>TIBA DI RUMAH SAKIT</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>WAKTU</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>TRANSPORTASI</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
								</table>
							</div>
						</div>	
						<div class="box" style="float:rifght;width: 40%;height:65px;margin-top:1%;margin-left:57%;">				
							<div class="box-content"  style="border:5px;">
								<!-- Table -->	
								<table>
									<tr>
										<td>PETUGAS</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>DIPERIKSA</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>JENIS KASUS</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
								</table>
							</div>
						</div>		
						<div class="box" style="float:rifght;width: 40%;height:65px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>PENANGGUNG JAWAB</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>Nama</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td><textarea name=alamatpenanggungjawab style="width: 150%;height: 80px;"> </textarea></td>
									</tr>
									<tr>
										<td>No Telp.</td>
										<td><input type=text; name=notelppenanggungjawab;></td>
									</tr>
								</table>	
							</div>
						</div>
				</div>
			</div>
			<!-- End Box -->	
			</div>
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