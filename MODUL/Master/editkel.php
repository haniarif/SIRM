<?php
include "../../koneksi.php";
if(isset($_GET['id_kelurahan'])){
	$id = $_GET['id_kelurahan'];
	$sql = mysql_query ("select * from kelurahan a left join kecamatan b on a.id_kecamatan = b.id_kecamatan where id_kelurahan = '$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	$id = $data['id_kelurahan'];
	$kecamatan = $data['nama_kecamatan'];
	$nama = $data['nama_kelurahan'];
	$kode = $data['kode_kel'];
}else{
	$id = ''; $kecamatan = ''; $nama = ''; $kode = ''; 
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
			return confirm('Apakah anda yakin menghapus kelurahan '+nama+'?');
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
						<h2 class="left">MASTER DATA KELURAHAN</h2>
						<div class="right">
							<label>search KELURAHAN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="editkel.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_kelurahan' value='<?php echo $id;?>'/></td>
								</tr>
								<tr>
									<td width="150">Nama KECAMATAN</td>
									<td colspan="3">
									<b>Pilih ulang Kecamatan</b><br/>
									<input type="text" name="id_kecamatan" id="input_data" size="50" value='<?php echo $data['id_kecamatan'];?>'/>
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_kecamatan", {
											preventDuplicates: true,
											theme: "facebook",
											multiple : false,
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>Nama Kelurahan</td>
									<td colspan="3"> <input type="text" name="nama_kelurahan" class="isi" size="8" value='<?php echo $nama;?>'/></td>
								</tr>
								<tr>
									<td width="150">Kode</td>
									<td colspan="3"> <input type="text" name="kode_kel" class="isi" size="8" value='<?php echo $kode;?>'/></td>
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
					<a href="tambahkel.php" class="add-button"><span>TAMBAH KELURAHAN</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA KECAMATAN</th>
								<th>NAMA KELURAHAN</th>
								<th>KODE</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM kelurahan");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php 
								$q=mysql_query("SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan='$data[id_kecamatan]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_kecamatan'];?> </td>
								<td><?php echo $data['nama_kelurahan'];?></td>
								<td><?php echo $data['kode_kel'];?></td>
								<td><a href="hapuskel.php?id_kelurahan=<?=$data['id_kelurahan']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_kelurahan'];?>')">Delete</a><a href="editkel.php?id_kelurahan=<?=$data['id_kelurahan']?>" class="ico edit">Edit</a></td>
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

// simpan kelurahan
if (isset($_POST['submit'])){
	mysql_query("update kelurahan  set id_kecamatan = '$_POST[id_kecamatan]', nama_kelurahan = '$_POST[nama_kelurahan]', kode_kel = '$_POST[kode_kel]' where id_kelurahan= '$_POST[id_kelurahan]'");
	echo "<meta http-equiv='refresh' content='0; url=kelurahan.php'>";
}
?>