<?php
session_start();
if(empty($_SESSION['id_pengguna'])){ ?>
	<meta http-equiv="refresh" content="0;url=../../login.php" /><?php
}
include "../../koneksi.php";
?>

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
				<a href="../../logout.php">Log out</a>
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
					<h2>MUTASI RAWAT INAP</h2>
				</div>
				<!-- End Box Head-->


<?php
		
	$query = mysql_query("SELECT * FROM mutasi z
	left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
	left outer join pasien b on a.id_pasien = b.id_pasien
	left join pengguna c on z.id_pengguna = c.id_pengguna
	left outer join pegawai d on c.id_pegawai = d.id_pegawai
	left join dokter e on z.id_dokter = e.id_dokter
	left outer join pegawai f on e.id_pegawai = f.id_pegawai
	left join kamar g on z.id_kamar = g.id_kamar
	where z.id_mutasi=$_GET[id]") or die(mysql_error());
	$data= mysql_fetch_array($query);
	$query2 = mysql_query("SELECT * FROM detail_mutasi a
	left join mutasi b on a.id_mutasi = b.id_mutasi
	left join layanan c on a.id_layanan = c.id_layanan
	where a.id_mutasi=$_GET[id]") or die(mysql_error());
	?>
<div class="box-content" style="height:620px; width:900px" >
					<!-- Table -->
					<div class="table">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							
							<tr>
								<td>NO. RM</td>
								<td colspan="4">:<?php echo $data['no_rm'];?></td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td colspan="4">:<?php echo $data['nama_pasien'];?></td>
							</tr>
							<tr>
								<td>Tanggal Masuk</td>
								<td>:<?php echo $data['tgl_masuk'];?></td>
							</tr>
							<tr>
								<td>DOKTER</td>
								<td>:<?php echo $data['nama_pegawai'];?></td>
							</tr>
							<tr>
								<td>KAMAR</td>
								<td>:<?php echo $data['nama_kamar'];?></td>
							</tr>
							<tr>
								<td>KELAS</td>
								<td>:<?php echo $data['kelas'];?></td>
							</tr>
						</table>
						<table>
						<?php
							while($data2= mysql_fetch_array($query2)){
						?>
							<tr>
								<td>Nama Layanan</td>
								<td>Frekuensi</td>
							</tr>
							<tr>
								<td><?php echo $data2['nama_layanan'];?></td>
								<td><?php echo $data2['frekuensi'];?></td>
							</tr>
						<?php
							}
						?>
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
	