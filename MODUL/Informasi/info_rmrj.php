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
			    <li><a href="../MASTER/master.php"><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="informasi.php" class="active"><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">	
		
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">INFORMASI REKAM MEDIS RAWAT JALAN</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
					<form action=# method=POST>
						<table>
							<tr>
								<td> PERIODE </td>
								<td><input type='text' name='' value=''/></td>
								<td> &nbsp; S/D</td>
								<td><input type='text' name='' value=''/></td>
							</tr>
							<tr>
								<td> <input type="submit" name="submit" value=CARI></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
							<BR>
						</table>
					</FORM>
					<BR><BR><BR>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NO. RM</th>
								<th>NAMA</th>
								<th>WAKTU</th>
								<th>KLINIK</th>
								<th>JENIS KASUS</th>
								<th>NAMA PETUGAS</th>
								<th>DIAGNOSA</th>
								<th>AKSI</th>
							</tr>
							<tr>
								<td>1</td>
								<td> 123456</td>
								<td> PASIEN SIAPA SAJA</td>
								<td>12-12-2014</td>
								<td>POLIKLINIK UMUM </td>
								<td>NON-BEDAH</td>
								<td>HASAN ANAS ANSHOR</td>
								<td>DIAGNOSA APA SAJA YANG KAU SUKA DECH</td>
								<td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
							</tr>
						</table>				
					</div>
					<!-- Table -->
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp; </div>			
		</div>
		<!-- Main -->
	</div>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
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