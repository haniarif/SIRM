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
					<h2>PENDAFTARAN RAWAT JALAN</h2>
				</div>
				<!-- End Box Head-->
				
				<div class="box-content" style="height:443px;">
					<!-- Table -->
					<div class="table">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>NO. RM</td>
								<td><input type=text; name=nama;></td>
								<td>Layanan</td>
								<td><input type=text; name=nama;></td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td><input type=text; name=nama;></td>
								<td>DOKTER</td>
								<td><input type=text; name=nama;></td>
							</tr>
							<tr>
								<td>ALAMAT</td>
								<td><textarea> </textarea></td>
								<td>KLINIK</td>
								<td><input type=text; name=nama;></td>
							</tr>
						</table>
						<table style="float:left">
							<tr>
								<td>JENIS KELAMIN</td>
								<td><input type="radio" name="radioku" value=laki-laki> Laki-laki
									<input type="radio" name="radioku" value=perempuan> Perempuan</td>
							</tr>
							<tr>
								<td>GOL. DARAH</td>
								<td><select width=50px><option value=pilihgol>Pilih Gol. Darah</option>
									</select></td>
							</tr>
							<tr>
								<td>TANGGAL LAHIR</td>
								<td><input type=text; name=nama;></td>
							</tr>
							<tr>
								<td>STATUS PERKAWINAN</td>
								<td><select width=50px><option value=pilihstatus>Pilih Status</option>
									</select></td>
							</tr>
							<tr>
								<td>PENDIDIKAN TERAKHIR</td>
								<td><select width=50px><option value=pilihpendidikan>Pilih Pendidikan</option>
									</select></td>
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td><select width=50px><option value=pilihpekerjaan>Pilih Pekerjaan</option>
									</select></td>
							</tr>
							<tr>
								<td>AGAMA</td>
								<td><select width=50px><option value=pilihagama>Pilih Agama</option>
									</select></td>
							</tr>
							<tr>
								<td> <input type="submit" name="submit" value=SIMPAN></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>	
						<div class="box" style="float:left;width: 49%;height:238px;margin-top:3%;margin-left:14%;">					
							<!-- Box Head -->
							<div class="box-head">
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
										<td><textarea name=alamatpenanggungjawab style="width: 181%;height: 80px;"> </textarea></td>
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