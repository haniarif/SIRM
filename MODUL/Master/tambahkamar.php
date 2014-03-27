<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
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
			    <li><a href="master.php" class="active"><span>MASTER DATA</span></a></li>
				<li><a href="../../transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../../administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../../informasi.php"><span>INFORMASI</span></a></li>
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
						<h2 class="left">MASTER DATA KAMAR</h2>
						<div class="right">
							<label>search KAMAR</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="tambahkamar.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>Nama </td>
									<td colspan="3">: <input type="text" name="nama_kamar" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Kelas </td>
									<td colspan="3">: <input type="text" name="kelas" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Klinik </td>
									
									<td colspan="3">: <input type="text" name="id_klinik" size="50" placeholder="require" id="dbTxt" alt="Search Criteria" onKeyUp="proses_auto();" autocomplete="off"/>
									
									<div id="layer1"></div>
									
									</td>
								</tr>
							</form>
								<tr>
									<td>Jenis </td>
									<td colspan="3">: <input type="text" name="jenis" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Simpan"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
					</div>
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NO. KAMAR</th>
								<th>KELAS</th>
								<th>KLINIK</th>
								<th>JENIS</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
							<?php
								include "../../koneksi.php";
								$no=0;
								$query = mysql_query("SELECT * FROM kamar");
								while($data= mysql_fetch_array($query)){
								$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_kamar'];?> </td>
								<td><?php echo $data['kelas'];?> </td>
								<td><?php echo $data['id_klinik'];?> </td>
								<td><?php echo $data['jenis'];?></td>
								<td><?php echo $data['status'];?></td>
								<td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
						</table>				
					</div>
								
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


<?php

// simpan kamar
if (isset($_POST['submit'])){
include "../../koneksi.php";
	mysql_query("insert into kamar (id_kamar, nama_kamar, id_klinik, kelas, jenis) 
			values ('','$_POST[nama_kamar]', '$_POST[id_klinik]', '$_POST[jenis]','$_POST[kelas]')");
	echo "<meta http-equiv='refresh' content='0; url=kamar.php'>";
}
?>