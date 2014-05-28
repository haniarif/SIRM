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
					<h2>CETAK RESUME RAWAT INAP</h2>
				</div>
				<!-- End Box Head-->


<?php
		
	$query = mysql_query("SELECT * FROM  rm_ri z
		left join mutasi a on z.id_mutasi = a.id_mutasi
		left outer join pendf_rj pn on a.id_pendftrn = pn.id_pendftrn 
		left outer join pasien b on pn.id_pasien = b.id_pasien
		left outer join kelurahan c on b.id_kelurahan = c.id_kelurahan 
		left outer join kecamatan d on c.id_kecamatan = d.id_kecamatan
		left outer join kabupaten e on d.id_kabupaten = e.id_kabupaten
		left outer join provinsi f on e.id_provinsi = f.id_provinsi
		left outer join kamar h on a.id_kamar = h.id_kamar
		left outer join dokter i on a.id_dokter = i.id_dokter
		left outer join pegawai j on i.id_pegawai = j.id_pegawai
		left join icd9 k on z.id_icd9 = k.id_icd9
		left join icd10 l on z.id_icd10 = l.id_icd10
		left join jenis_kasus n on z.id_jenis_kasus = n.id_jenis_kasus") or die(mysql_error());
	$data= mysql_fetch_array($query);
	
	?>
<div class="box-content" style="height:620px; width:900px" >
					<!-- Table -->
					<div class="box-head">
						<h2 class="left">RINGKASAN PERAWATAN PASIEN PULANG</h2>
						<div class="right">
							<label>NOMOR REKAM MEDIK :</label>
							<input type="text" class="field small-field" value="<?php echo $data['no_rm']?>"/>
						</div>
					</div>
					<div class="table">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>NAMA:</td>
								<td><?php echo $data['nama_pasien'];?></td>
								<td>JENIS KELAMIN:</td>
								<td><?php echo $data['jk_pasien'];?></td>
								<td>UMUR:</td>
								<td><?php echo $data['umur'];?></td>
							</tr>
							<tr>
								<td>ALAMAT:</td>
								<td><?php echo $data['alamat_pasien']. ' Kec.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
							</tr>
							<tr>
								<td>Tanggal Masuk :</td>
								<td><?php echo $data['tgl_masuk'];?></td>
								<td>Tanggal KELUAR :</td>
								<td><?php echo $data['tgl_keluar'];?></td>
								<td>KELAS :</td>
								<td><?php echo $data['kelas'];?></td>
							</tr>
						</table>
					</div>
					<br><br><br>
			<div class="table">
						<table>
							<tr>
								<td>DIAGNOSIS MASUK:</td>
								<td><textarea class="isi"></textarea></td>
							</tr>
							<tr>
								<td>DIAGNOSIS MASUK:</td>
								<td><?php echo $data['diagnosa_utama'];?></td>
							</tr>
							<tr>
								<td>OPERASI:</td>
								<td><?php echo $data['icd9'];?></td>
							</tr>
							<tr>
								<td  colspan="2">RINGKASAN RIWAYAT & PEMERIKSAAN FISIK (YANG PENTING/BERHUBUNGAN):</td>
							</tr>
							<tr>
								<td><?php echo $data['ringkasan_proses'];?></td>
							</tr>
							<tr>
								<td colspan="2">HASIL LABORATORIUM/PA, RONGTEN, USG dll (YANG PENTING/BERHUBUNGAN):</td>
							</tr>
							<tr>
								<td><?php echo $data['laboratoium'];?></td>
							</tr>
							<tr>
								<td colspan="2">TERAPI/PENGOBATAN:</td>
							</tr>
							<tr>
								<td><?php echo $data['terapi'];?></td>
							</tr>
							<tr>
								<td>ANJURAN:</td>
								<td><textarea class="isi"></textarea></td>
							</tr>
							<tr>
								<td>DIRUJUK :</td>
								<td><input type="radio" name="jk_pasien" value=laki-laki> YA <br>
									Kepada: <textarea></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="radio" name="jk_pasien" value=perempuan> TIDAK</td>
							</tr>
						</table>
			</div>
			<div class="table">
				<div class="right">
				<table>
					<tr><td>
					<label>YOGYAKARTA, .............................</label>
					</tr></td>
					<tr><td  rowspan="3"><input type="hidden"  value="<?php echo $data['nama_pegawai']?>"/><input type="hidden"/>DOKTER YANG MERAWAT</td></tr>
				</table>
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
	