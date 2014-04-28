<?php
include "../../koneksi.php";
if(isset($_GET['id_kabupaten'])){
	$id = $_GET['id_kabupaten'];
	$sql = mysql_query ("select * from kabupaten a left join provinsi b on a.id_provinsi = b.id_provinsi where id_kabupaten = '$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	$id = $data['id_kabupaten'];
	$provinsi = $data['nama_provinsi'];
	$nama = $data['nama_kabupaten'];
	$kode = $data['kode_kab'];
}else{
	$id = ''; $provinsi = ''; $nama = ''; $kode = ''; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function konfirmasi(nama){
			return confirm('Apakah anda yakin menghapus kota '+nama+'?');
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
						<h2 class="left">MASTER DATA KABUPATEN</h2>
						<div class="right">
							<label>search KABUPATEN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="editkab.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_kabupaten' value='<?php echo $id;?>'/></td>
								</tr>
								<tr>
									<td width="150">Nama Provinsi</td>
									<td colspan="3">
									<b>Pilih ulang Provinsi</b><br/>
									<input type="text" name="id_provinsi" id="input_data" size="50" value='<?php echo $data['id_provinsi'];?>'/>
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_provinsi", {
											preventDuplicates: true,
											theme: "facebook",
											multiple : false,
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>Nama Kabupaten</td>
									<td colspan="3"> <input type="text" name="nama_kabupaten" class="isi" size="8" value='<?php echo $nama;?>'/></td>
								</tr>
								<tr>
									<td width="150">Kode</td>
									<td colspan="3"> <input type="text" name="kode_kab" class="isi" size="8" value='<?php echo $kode;?>'/></td>
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
					<a href="tambahkab.php" class="add-button"><span>TAMBAH KABUPATEN</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA KABUPATEN</th>
								<th>NAMA PROVINSI</th>
								<th>KODE KABUPATEN</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM kabupaten");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php 
								$q=mysql_query("SELECT nama_provinsi FROM provinsi WHERE id_provinsi='$data[id_provinsi]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_provinsi'];?> </td>
								<td><?php echo $data['nama_kabupaten'];?></td>
								<td><?php echo $data['kode_kab'];?></td>
								<td><a href="hapuskab.php?id_kabupaten=<?=$data['id_kabupaten']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_kabupaten'];?>')">Delete</a><a href="editkab.php?id_kabupaten=<?=$data['id_kabupaten']?>" class="ico edit">Edit</a></td>
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

// simpan kabupaten
if (isset($_POST['submit'])){
	mysql_query("update kabupaten  set id_provinsi = '$_POST[id_provinsi]', nama_kabupaten = '$_POST[nama_kabupaten]', kode_kab = '$_POST[kode_kab]' where id_kabupaten = '$_POST[id_kabupaten]'");
	echo "<meta http-equiv='refresh' content='0; url=kabupaten.php'>";
}
?>