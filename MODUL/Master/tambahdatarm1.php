<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
	<script type="text/javascript">
		function konfirmasi(nama){
			return confirm('Apakah anda yakin menghapus data '+nama+'?');
		}
	</script>
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
					<form method="post" action="tambahdatarm.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>Nama </td>
									<td colspan="3">: <input type="text" name="nama_rm" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Kategori Rekam Medik </td>
									<td>:<select width=50px name="kategori_rm"><option value=kategorirm>Pilih Kategori Rekam Medik</option>
														   <option value=alasandaatang>Alasan Datang</option>
														   <option value=asalnonrujukan>Asal Non Rujujkan</option>
														   <option value=asalrujukan>Asal Rujukan</option>
														   <option value=carakeluar>Cara Keluar</option>
														   <option value=caramasuk>Cara Masuk</option>
														   <option value=carapenerimaan>Cara Penerimaan</option>
														   <option value=KeadaanKeluar>Keadaan Keluar</option>
														   <option value=pemeriksaanlanjutan>Pemeriksaan Lanjutan</option>
														   <option value=tindaklanjut>Tindak Lanjut</option>
									</select></td>
								</tr>
								<tr>
									<td><input type="submit" name="submit" value="Simpan"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
					</div>
					<div class="table">
						<table width="100%" border="1" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA</th>
								<th>KATEGORI DATA RM</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM data_rm");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_rm'];?></td>
								<td><?php echo $data['kategori_rm'];?></td>
								<td><a href="hapusdatarm.php?id_rekam_medik=<?=$data['id_rekam_medik']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_rm'];?>')">Delete</a><a href="editdatarm.php?id_rekam_medik=<?=$data['id_rekam_medik']?>" class="ico edit">Edit</a></td>
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

// simpan datarm
if (isset($_POST['submit'])){
include "../../koneksi.php";
	mysql_query("insert into data_rm (id_rekam_medik, nama_rm, kategori_rm) 
			values ('','$_POST[nama_rm]', '$_POST[kategori_rm]')");
	echo "<meta http-equiv='refresh' content='0; url=datarm.php'>";
}
?>