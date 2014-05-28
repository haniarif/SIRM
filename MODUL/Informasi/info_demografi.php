<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
</head>
<body onLoad="document.postform.elements['mutasi'].focus();">
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
			<div id="content" style="width:115%">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">INFORMASI DEMOGRAFI PASIEN</h2>
					</div>
					<!-- End Box Head -->	
					<?php
					//untuk koneksi database
					include "../../koneksi.php";
						
					//untuk menantukan tanggal awal dan tanggal akhir data di database
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from pendf_rj"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from pendf_rj"));
					?>
					<!-- Table -->
					<div class="table">
					<form action="info_demografi.php" method="POST" name="postform">
						<table>
							<tr>
								<td> PERIODE </td>
								<td colspan="2"><input type="text" name="tanggal_awal" size="15"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
								<td> &nbsp; S/D</td>
								<td colspan="2"><input type="text" name="tanggal_akhir" size="15" />
									<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
							</tr>
							<tr>
								<td colspan="2">PENCARIAN BERDASARKAN WILAYAH / KECAMATAN</td>
							</tr>
							<tr>
								
								<td>Nama Kecamatan</td>
								<td colspan="3">
								<input type="text" name="id_kecamatan" id="input_data" size="50">
								<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_kecamatan", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
								</script>
								</td>
							</tr>
							<tr>
								<td> <input type="submit" name="cari" value="CARI"></td>
								<td><input type="reset" name="batal" value="BATAL" ></td>
							</tr>
							<BR>
						</table>
					</FORM>
					<BR><BR><BR>
					<?php
					//di proses jika sudah klik tombol cari
					if(isset($_POST['cari'])){
						
						//menangkap nilai form
						$pendaftaran=$_POST['pendaftaran'];
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						if(empty($pendaftaran) and empty($tanggal_awal) and empty($tanggal_akhir)){
							//jika tidak menginput apa2
						
						}
						?>						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>KELUARAHAN</th>
								<th>JUMLAH ORANG</th>
							</tr>
							<?php
							$query = mysql_query("SELECT id_kelurahan,nama_kelurahan FROM kelurahan WHERE id_kecamatan='$_POST[id_kecamatan]'
								");
								while($data= mysql_fetch_array($query))
								{
							?>
							<tr>
								<td><?php echo $data['nama_kelurahan'];?></td>
								<td><?php 
								$query2=mysql_query("SELECT pendf_rj.id_pasien,pasien.id_pasien FROM pendf_rj LEFT JOIN pasien ON pendf_rj.id_pasien=pasien.id_pasien WHERE pasien.id_kelurahan='$data[id_kelurahan]'");
								$jml=mysql_num_rows($query2);
								echo $jml;
								?></td>
							</tr>
							<?php }  ?>
							<?php }  ?>
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
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe><!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->


	
</body>
</html>
