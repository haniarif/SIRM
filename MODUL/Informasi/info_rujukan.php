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
								<th>KETERANGAN</th>
								<th>RAWAT JALAN</th>
								<th>TOTAL</th>
							</tr>
							<tr>
								<tH>DATANG SENDIRI</tH>
							</tr>
							<tr>
								<tH>FASILITAS KESEHATAN LAINNYA</tH>
							</tr>
							<tr>
								<tH>PUSKESMAS</tH>
							</tr>
							<tr>
								<tH>RUMAH SAKIT</tH>
							</tr>
							<tr>
								<tH>TOTAL</tH>
							</TR>
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