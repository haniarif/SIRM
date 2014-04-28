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
					<a href="tambahdokter.php" class="add-button"><span>TAMBAH DOKTER</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NO. SIP</th>
								<th>NAMA</th>
								<th>SPESIALISASI</th>
								<th>JENIS KELAMIN</th>
								<th>ALAMAT</th>
								<th>AKSI</th>
							</tr>
							<?php
								include "../../koneksi.php";
								$no=0;
								$query = mysql_query("SELECT * FROM dokter");
								while($data= mysql_fetch_array($query)){
								$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['id_pegawai'];?> </td>
								<td><?php echo $data['nama'];?> </td>
								<td><?php 
								$q=mysql_query("SELECT nama_spesialisasi FROM spesialisasi WHERE id_spesialisasi='$data[id_spesialisasi]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_spesialisasi'];?> </td>
								<td><?php echo $data['jk_dokter'];?> </td>
								<td><?php echo $data['alamat'];?> </td>
								<td><a href="hapuslayanan.php?id_layanan=<?=$data['id_layanan']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_layanan'];?>')">Delete</a><a href="editlayanan.php?id_layanan=<?=$data['id_layanan']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
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