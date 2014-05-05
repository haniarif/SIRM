<?php
include "../../koneksi.php";
if(isset($_GET['id_dokter'])){
	$id = $_GET['id_dokter'];
	$sql = mysql_query ("SELECT * FROM dokter a left join spesialisasi b on a.id_spesialisasi = b.id_spesialisasi
												left join pegawai c on a.id_pegawai = c.id_pegawai where id_dokter= '$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	$id = $data['id_dokter'];
	$no_sip = $data['no_sip'];
	$spesialisasi = $data['nama_spesialisasi'];
}else{
	$id = '';  $no_sip=''; $spesialisasi = '';
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
			return confirm('Apakah anda yakin menghapus dokter '+nama+'?');
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
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
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
						<h2 class="left">MASTER DATA DOKTER</h2>
						<div class="right">
							<label>search DOKTER</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	 
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="editdokter.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_dokter' value='<?php echo $id;?>'/></td>
								<tr>
									<td>NAMA</td>
									<td colspan="3"> <input type="text" name="id_pegawai" id="input_data" size="50" value='<?php echo $data['id_pegawai'];?>'>
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_pegawai", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>NO. SIP</td>
									<td> <input type="text" name="no_sip" class="isi" value='<?php echo $no_sip;?>'>
									</td>
								</tr>
								<tr>
									<td>Spesialisasi</td>
									<td colspan="3"> <input type="text" name="id_spesialisasi" id="input_data2" size="50" value='<?php echo $data['id_spesialisasi'];?>'>
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data2").tokenInput("../../config/file_json.php?aksi=cari_spesialisasi", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script></td>
								</tr>
								<tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Ubah"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
					</div>
					
					<div class="table">
					<a href="tambahdokter.php" class="add-button"><span>TAMBAH DOKTER</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA</th>
								<th>NO. SIP</th>
								<th>SPESIALISASI</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM dokter a left join spesialisasi b on a.id_spesialisasi = b.id_spesialisasi
												left join pegawai c on a.id_pegawai = c.id_pegawai");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_pegawai'];?></td>
								<td><?php echo $data['no_sip'];?></td>
								<td><?php echo $data['nama_spesialisasi'];?></td>
								<td><a href="hapusdokter.php?id_dokter=<?=$data['id_dokter']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_dokter'];?>')">Delete</a><a href="editdokter.php?id_dokter=<?=$data['id_dokter']?>" class="ico edit">Edit</a></td>
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

// simpan dokter
if (isset($_POST['submit'])){
	mysql_query("update dokter  set  id_pegawai = '$_POST[id_pegawai]', no_sip = '$_POST[no_sip]', id_spesialisasi = '$_POST[id_spesialisasi]' where id_dokter = '$_POST[id_dokter]'");
	echo "<meta http-equiv='refresh' content='0; url=dokter.php'>";
}
?>