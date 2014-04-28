<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function konfirmasi(nama){
			return confirm('Apakah anda yakin menghapus data '+nama+'?');
		}
	</script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
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
						<h2 class="left">MASTER DATA LAYANAN</h2>
						<div class="right">
							<label>search LAYANAN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="tambahlayanan.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>Nama Layanan</td>
									<td colspan="3"> <input type="text" name="nama_layanan" size="50" class="isi" placeholder="require"></td>
								</tr>
								<tr>
									<td>Spesialisasi </td>
									<td colspan="3">
									<?php /*

									if(!empty($_POST['id_spesialisasi'])){
									 echo "insert into values ".print_r($_POST['id_spesialisasi'])." kokoo "; }
									 */ ?>
									 <input type="text" name="id_spesialisasi" id="input_data" size="50" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_spesialisasi", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
									</td>
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
								<th>Nama Layanan</th>
								<th>Spesialisasi</th>
								<th>AKSI</th>
							</tr>
							<?php
								include "../../koneksi.php";
								$no=0;
								$query = mysql_query("SELECT * FROM layanan");
								while($data= mysql_fetch_array($query)){
								$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_layanan'];?> </td>
								<td><?php 
								$q=mysql_query("SELECT nama_spesialisasi FROM spesialisasi WHERE id_spesialisasi='$data[id_spesialisasi]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_spesialisasi'];?> </td>
								<td><a href="hapuslayanan.php?id_layanan=<?=$data['id_layanan']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_layanan'];?>')">Delete</a><a href="editlayanan.php?id_layanan=<?=$data['id_layanan']?>" class="ico edit">Edit</a></td>
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

// simpan layanan
if (isset($_POST['submit'])){
include "../../koneksi.php";
	mysql_query("insert into layanan (id_layanan, nama_layanan, id_spesialisasi) 
			values ('','$_POST[nama_layanan]', '$_POST[id_spesialisasi]')");
	echo "<meta http-equiv='refresh' content='0; url=layanan.php'>";
}
?>