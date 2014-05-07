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
			    <li><a href="../master/master.php" ><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php" class="active"><span>TRANSAKSI</span></a></li>
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
	<!-- Start Shell -->
	<div class="shell">
		<!-- Main -->
		<div id="main">
			<div class="box">					
				<!-- Box Head -->
				<div class="box-head">
					<h2>PENDAFTARAN RAWAT JALAN</h2>
				</div>
				<!-- End Box Head-->


<?php
include "../../koneksi.php";
		
	$query = mysql_query("SELECT * FROM pendf_rj z
	left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
	left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
	left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
	left outer join provinsi d on c.id_provinsi = d.id_provinsi
	left join pasien e on z.id_pasien = e.id_pasien
	left join layanan f on z.id_layanan = f.id_layanan
	left join klinik g on z.id_klinik = g.id_klinik
	left join dokter h on z.id_dokter = h.id_dokter
	left outer join pegawai i on h.id_pegawai = i.id_pegawai
	where id_pendftrn=$_GET[id]");
	$data= mysql_fetch_array($query);?>
<div class="box-content" style="height:620px; width:900px" >
					<!-- Table -->
					<div class="table">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>Tanggal</td>
								<td>:<?php echo $data['tanggal'];?></td>
							</tr>
							<tr>
								<td>NO. RM</td>
								<td colspan="4">:<?php echo $data['no_rm'];?></td>
								<td >Rujukan</td>
								<td>:<?php echo $data['rujukan'];?></td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td colspan="4">:<?php echo $data['nama_pasien'];?></td>
								<td>Layanan</td>
								<td>:<?php echo $data['nama_layanan'];?></td>
							</tr>
							<tr>
								<td>ALAMAT</td>
								<td colspan="4">:<?php echo $data['alamat_pasien'];?></td>
								<td>DOKTER</td>
								<td>:<?php echo $data['nama_pegawai'];?></td>
							</tr>
							<tr>
								<td>KELURAHAN</td>
								<td colspan="4">:<?php echo ' Kel.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
								<td>KLINIK</td>
								<td>:<?php echo $data['nama_klinik'];?></td>
							</tr>
						</table>
						<table style="float:left; margin-left:1px;" >
							<tr>
								<td>JENIS KELAMIN</td>
									<td>:<?php echo $data['jk_pasien'];?></td>
							<tr>
								<td>TANGGAL LAHIR</td>
								<td>:<?php echo $data['tgl_lhr'];?></td>
							</tr>
							
							</tr>
							<tr>
								<td>GOL. DARAH</td>
								<td>:<?php echo $data['gol_darah'];?></td>
							</tr>
							<tr>
								<td>STATUS PERKAWINAN</td>
								<td>:<?php echo $data['perkawinan'];?></td>
							</tr>
							<tr>
								<td>PENDIDIKAN TERAKHIR</td>
								<td>:<?php echo $data['penddkn'];?></td>
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td>:<?php echo $data['pekerjaan'];?></td>
							</tr>
							<tr>
								<td>AGAMA</td>
								<td>:<?php echo $data['agama_pasien'];?></td>
							</tr>
						</table>	
						<div class="box" style="float:left;width: 50%;height:210px;margin-top:-26%;margin-left:50%;">					
							<!-- Box Head -->
							<div class="box-head" style="width: 95%;">
								<h2  >PENANGGUNG JAWAB</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>NAMA</td>
										<td>:<?php echo $data['nama_pj'];?></td>
									</tr>
									<tr>
										<td>POSISI</td>
										<td>:<?php echo $data['posisi_pj'];?></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td>:<?php echo $data['tgl_lhr_pj'];?></td>
									</tr>
									
									<tr>
										<td>PEKERJAAN</td>
										<td>:<?php echo $data['pkrjaan_pj'];?></td>
									</tr>
									<tr>
										<td>No Telp.</td>
										<td>:<?php echo $data['no_telp_pj'];?></td>
									</tr>
									
								</table>				
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Box -->	
		</div>
		<!-- End Main -->		
	</div>
	<!-- End Shell -->	
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
	