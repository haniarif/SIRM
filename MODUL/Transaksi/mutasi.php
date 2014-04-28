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
						<h2>MUTASI RAWAT INAP</h2>
						<div class="right">
							<input type="submit" class="button" value="PINDAH" />
							<input type="submit" class="button" value="SELESAI" />
						</div>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<!-- Table -->
					<div class="table">
						<form action=# method=POST>
						<table>
							<tr>
								<td> No. RM </td>
								<td><input type='text' name='' value=''/></td>
							</tr>
							<tr>
								<td> NAMA </td>
								<td><input type='text' name='tanggal_jual' /></td>
							</tr>
							<tr>
								<td> TANGGAL MASUK </td>
								<td><input type='text' name='' value=''/></td>
							</tr>
							<tr>
								<td> TANGGAL </td>
								<td><input type='text' name='' value=''/></td>
							</tr>
							<tr>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
							</tr>
						</table>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<input type="submit" name="submit" value=TAMBAHLAYANAN>
							<tr>
								<td> NO </td>
								<td> LAYANAN</td>
								<td> KAMAR </td>
								<td> KELAS </td>
								<td> FREKUENSI </td>
								<td> PETUGAS</td>
								<td> DOKTER1 </td>
								<td> DOKTER2 </td>
							</tr>
							<tr>
								<td>1</td>
								<td><input type='text' name='' value=''/></td>
								<td><input type='text' name='' value='' size='7px'/></td>
								<td><input type='text' name='' value='' size='2px'/></td>
								<td><input type='text' name='' value='' size='5px'/></td>
								<td>DR. Hadi Setiadi</td>
								<td><input type='text' name='' value=''/></td>
								<td><input type='text' name='' value=''/></td>
								<td><input type="submit" name="submit" value=SIMPAN></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>
						</form>			
					</div>
					</div>
				</div>
				<!-- End Box -->
				
			</div>
					
				</div>
				<!-- End Box -->			
		</div>
		<!-- Main -->
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
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