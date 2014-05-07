<?php
include "../../koneksi.php";
if(isset($_GET['id_kecamatan'])){
	$id = $_GET['id_kecamatan'];
	$sql = mysql_query ("select * from kecamatan a left join kabupaten b on a.id_kabupaten = b.id_kabupaten where id_kecamatan = '$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	$id = $data['id_kecamatan'];
	$kabupaten = $data['nama_kabupaten'];
	$nama = $data['nama_kecamatan'];
	$kode = $data['kode_kecamatan'];
}else{
	$id = ''; $kabupaten = ''; $nama = ''; $kode = ''; 
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
			return confirm('Apakah anda yakin menghapus kecamatan '+nama+'?');
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
				<a href="../../logout.php">Log out</a>
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
						<h2 class="left">MASTER DATA KECAMATAN</h2>
						<div class="right">
							<label>search KECAMATAN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="editkec.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_kecamatan' value='<?php echo $id;?>'/></td>
								</tr>
								<tr>
									<td width="150">Nama Kabupaten</td>
									<td colspan="3">
									<b>Pilih ulang Kabupaten</b><br/>
									<input type="text" name="id_kabupaten" id="input_data" size="50" value='<?php echo $data['id_kabupaten'];?>'/>
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_kabupaten", {
											preventDuplicates: true,
											theme: "facebook",
											multiple : false,
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>Nama Kecamatan</td>
									<td colspan="3"> <input type="text" name="nama_kecamatan" class="isi" size="8" value='<?php echo $nama;?>'/></td>
								</tr>
								<tr>
									<td width="150">Kode</td>
									<td colspan="3"> <input type="text" name="kode_kecamatan" class="isi" size="8" value='<?php echo $kode;?>'/></td>
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
					<a href="tambahkec.php" class="add-button"><span>TAMBAH KECAMATAN</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA KABUPATEN</th>
								<th>NAMA KECAMATAN</th>
								<th>KODE</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM kecamatan");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php 
								$q=mysql_query("SELECT nama_kabupaten FROM kabupaten WHERE id_kabupaten='$data[id_kabupaten]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_kabupaten'];?> </td>
								<td><?php echo $data['nama_kecamatan'];?></td>
								<td><?php echo $data['kode_kecamatan'];?></td>
								<td><a href="hapuskec.php?id_kecamatan=<?=$data['id_kecamatan']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_kecamatan'];?>')">Delete</a><a href="editkec.php?id_kecamatan=<?=$data['id_kecamatan']?>" class="ico edit">Edit</a></td>
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

// simpan kecamatan
if (isset($_POST['submit'])){
	mysql_query("update kecamatan  set id_kabupaten = '$_POST[id_kabupaten]', nama_kecamatan = '$_POST[nama_kecamatan]', kode_kecamatan = '$_POST[kode_kecamatan]' where id_kecamatan = '$_POST[id_kecamatan]'");
	echo "<meta http-equiv='refresh' content='0; url=kecamatan.php'>";
}
?>