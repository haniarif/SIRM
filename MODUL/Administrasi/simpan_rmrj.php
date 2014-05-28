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
			    <li><a href="../Master/master.php" ><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php" ><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php" class="active"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../informasi/informasi.php"><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->


<!-- Container -->
<div id="container" >
	<!-- Start Shell -->
	<div class="shell">
		<!-- Main -->
	<div id="main" >
	<div class="box-content" style="height:1000px;" >
		<div class="box" style="height:1000px; width:1000px;">				
				<!-- Box Head -->
				<div class="box-head">
					<h2>REKAM MEDIS RAWAT JALAN</h2>
				</div>

<?php
	$query = mysql_query("SELECT * FROM  rmrj z
	left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
	left outer join pasien b on a.id_pasien = b.id_pasien
	left outer join kelurahan c on b.id_kelurahan = c.id_kelurahan 
	left outer join kecamatan d on c.id_kecamatan = d.id_kecamatan
	left outer join kabupaten e on d.id_kabupaten = e.id_kabupaten
	left outer join provinsi f on e.id_provinsi = f.id_provinsi
	left outer join klinik h on a.id_klinik = h.id_klinik
	left outer join dokter i on a.id_dokter = i.id_dokter
	left outer join pegawai j on i.id_pegawai = j.id_pegawai
	left join jenis_kasus n on z.id_jenis_kasus = n.id_jenis_kasus
	left join data_rm m on m.id_rekam_medik = m.id_rekam_medik
	left join kategori_rm rm on m.id_kategori = rm.id_kategori
	where z.id_rmrj=$_GET[id]")or die(mysql_error());
	$data= mysql_fetch_array($query);
	$query2 = mysql_query("SELECT * FROM rmrj_diagnosa a
	left join rmrj b on a.id_rmrj = b.id_rmrj
	left join icd10 c on a.id_icd10 = c.id_icd10
	where a.id_rmrj=$_GET[id]") or die(mysql_error());
	$query3 = mysql_query("SELECT * FROM rmrj_tindakan a
	left join rmrj b on a.id_rmrj = b.id_rmrj
	left join icd9 c on a.id_icd9 = c.id_icd9
	where a.id_rmrj=$_GET[id]") or die(mysql_error());
	
	?>
	
<div class="box" style="float:left;width: 48%;height:470px;margin-top:1%;margin-left:1%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 96%;">
								<h2>DATA PASIEN</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>NO. RM</td>
										<td>:<?php echo $data['no_rm'];?></td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td>:<?php echo $data['nama_pasien'];?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:<?php echo $data['alamat_pasien'];?></td>
									</tr>
									<tr>
										<td>KELURAHAN</td>
										<td>:<?php echo ' Kel.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
									</tr>
									<tr>
										<td>JENIS KELAMIN</td>
										<td>:<?php echo $data['jk_pasien'];?></td>
									</tr>
									<tr>
										<td>GOL. DARAH</td>
										<td>:<?php echo $data['gol_darah'];?></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td>:<?php echo $data['tgl_lhr'];?></td>
									</tr>
									<tr>
										<td>AGAMA</td>
										<td>:<?php echo $data['agama_pasien'];?></td>
									</tr>
									<tr>
										<td>TENSI</td>
										<td>:<?php echo $data['tensi'];?></td>
									</tr>
									<tr>
										<td>NADI</td>
										<td>:<?php echo $data['nadi'];?></td>
									</tr>
									<tr>
										<td>SUHU</td>
										<td>:<?php echo $data['suhu'];?></td>
									</tr>
									<tr>
										<td>NAFAS</td>
										<td>:<?php echo $data['nafas'];?></td>
									</tr>
									<tr>
										<td>TINGGI</td>
										<td>:<?php echo $data['tinggi'];?></td>
									</tr>
									<tr>
										<td>BERAT</td>
										<td>:<?php echo $data['berat'];?></td>
									</tr>
									<tr>
										<td>LILA</td>
										<td>:<?php echo $data['lila'];?></td>
									</tr>
								</table>				
							</div>
						</div>
			
					<div class="box" style="float:rifght;width: 40%;height:238px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width:95%;">
								<h2>REKAM MEDIS</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>WAKTU</td>
										<td>:<?php echo $data['waktu'];?></td>
									</tr>
									<tr>
										<td>KLINIK</td>
										<td>:<?php echo $data['nama_klinik'];?></td>
									</tr>
									<tr>
										<td>DOKTER</td>
										<td>:<?php echo $data['nama_pegawai'];?></td>
									</tr>
									<tr>
										<td>ANAMNESA</td>
										<td>:<?php echo $data['anamnesa'];?></td>
									</tr>
									<tr>
										<td>JENIS KASUS</td>
										<td>:<?php echo $data['nama_jk'];?></td>
									</tr>
									<tr>
										<td>TINDAK LANJUT</td>
										<td>:<?php
										$q=mysql_query("SELECT nama_rm FROM data_rm WHERE id_rekam_medik='$data[tindak_lanjut]'");
										$t=mysql_fetch_array($q);
										echo $t['nama_rm'];?></td>
									</tr>
									<tr>
										<td>CATATAN</td>
										<td>:<?php echo $data['catatan'];?></td>
									</tr>
								</table>	
							</div>
						</div>
					<div class="box" style="float:left; width: 49%;height:400px;margin-top:23%;margin-left:-49%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 96%;">
								<h2>DIAGNOSA </h2>
							</div>
								<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:200px;margin-top:0%;margin-left:-0%;">
								<!-- Table -->
								<table border="1">
								
									<tr>
										<td> NO </td>
										<td> DIAGNOSA</td>
										<td> KODE ICD10</td>
									</tr>
									<?php
									$no=0;
									while($data2= mysql_fetch_array($query2)){
									$no++;
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $data2['nama_icd10'];?></td>
										<td><?php echo $data2['kode_icd10'];?></td>
									</tr>
									<?php
										}
									?>
								</table>				
							</div>
					</div>
						<div class="box" style="float:rifght;width: 40%;height:70px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 95%;">
								<h2>ALASAN DATANG</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>ALASAN DATANG</td>
										<td>:<?php
											echo $data['datang'];?> </td>
									</tr>
								</table>
							</div>
						</div>
						<div class="box" style="float:rifght;width: 40%;height:126px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 95%;">
								<h2>KELUAR</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>KEADAAN KELUAR</td>
										<td>:<?php echo $data['keadaan_keluar'];?></td>
									</tr>
									<tr>
										<td>CARA KELUAR</td>
										<td>:<?php echo $data['cara_keluar'];?></td>
									</tr>
									<tr>
										<td>PEMERIKSAAN LANJUTAN</td>
										<td>:<?php echo $data['pemeriksaan'];?></td>
									</tr>
									
								</table>
							</div>
						</div>
							<div class="box" style="float:left;width: 49%;height:400px;margin-top:-42%;margin-left:51%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 96%;">
								<h2>TINDAKAN </h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:100px;margin-top:0%;margin-left:-0%;">
								<!-- Table -->
								<table border="1">
								
									<tr>
										<td> NO </td>
										<td> TINDAKAN</td>
										<td> KODE ICD9</td>
									</tr>
									<?php
									$no=0;
									while($data3= mysql_fetch_array($query3)){
									$no++;
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $data3['nama_icd9'];?></td>
										<td><?php echo $data3['kode_icd9'];?></td>
									</tr>
									<?php } ?>
								</table>				
							</div>
							
						</div>
		<!-- End Box -->	
		</div>
		<!-- End Main -->
</div>		
	</div>
	<!-- End Shell -->
</div>	
<!-- End Container -->
</div>

<!-- Footer -->
<div id="footer" style="clear:both">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
</body>
</html>
	
	