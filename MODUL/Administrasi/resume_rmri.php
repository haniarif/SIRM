<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery_append.js"></script> 
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
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
<div id="container">
	<!-- Start Shell -->
	<div class="shell">
		<!-- Main -->
		<div id="main">
			<div class="box-content" style="height:800px;">
			<div class="box">					
				<!-- Box Head -->
				<div class="box-head">
					<h2>RESUME REKAM MEDIS RAWAT INAP</h2>
				</div>
				<!-- End Box Head-->
						<div class="box" style="float:left;width: 48%;height:250px;margin-top:1%;margin-left:1%;">					
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
										<td><input type="text" name="no_rm" id="input_data">
										<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_mutasi", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_pasien_rj(item.name)
											}
											
										});
									});
									
									function get_pasien_rj(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_mutasi&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var mutasi = data[0];
												
												console.log(mutasi);	
												$('#nama_pasien').val(mutasi.name);
												$('#alamat').val(mutasi.alamat_pasien);
												$('#input_data4').tokenInput("add", {id: pendf_rj.id_kelurahan, name: pendf_rj.nama_kelurahan});
												$('#jk_pasien').val(mutasi.jk_pasien);
												$('#tgl_lhr').val(mutasi.tgl_lhr);
												$('#gol_darah').val(mutasi.gol_darah);
												$('#agama_pasien').val(mutasi.agama_pasien);
												$('#nama_klinik').val(mutasi.nama_klinik);
												$('#nama_pegawai').val({id: mutasi.id_dokter, name: mutasi.nama_pegawai});
												
											}
										});
									}
									</script></td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td><input type="text" name="nama_pasien" class="isi" id="nama_pasien"></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td><input type="text" name="alamat_pasien" class="isi" id="alamat"></input></td>
									</tr>
									<tr>
									<td>KELURAHAN</td>
								<td><input type="text" name="id_kelurahan" id="input_data4">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data4").tokenInput("../../config/file_json.php?aksi=cari_kelurahan", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
								</td>
								</tr>
									<tr>
										<td>JENIS KELAMIN</td>
										<td><input type="radio" id="jk_pasien" name="jk_pasien" value=laki-laki> Laki-laki
										<input type="radio"  id="jk_pasien" name="jk_pasien" value=perempuan> Perempuan</td>
									</tr>
									<tr>
										<td>GOL. DARAH</td>
										<td><input type="input" name="gol_darah" class="isi" id="gol_darah"></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td><input type="input" name="tgl_lhr" class="isi" id="tgl_lhr"></td>
									</tr>
									<tr>
										<td>AGAMA</td>
										<td><input type="input" name="agama_pasien" class="isi" id="agama_pasien"></td>
									</tr>
								</table>				
							</div>
						</div>
					<div class="box" style="float:rifght;width: 48%;height:180px;margin-top:1%;margin-left:51%;">		
					<!-- Box Head -->
						<div class="box-head" style="height:25px; width:96%;">
							<h2>RINGKASAN</h2>
						</div>
						<!-- End Box Head-->
							<div class="box-content">
							<!-- Table -->
							<table>
								<tr>
									<td>JENIS KASUS</td>
									<td>
										<?php
										include "../../koneksi.php";
										$sql = "select * from jenis_kasus order by nama_jk";
										$query = mysql_query($sql); ?>
										<select name='id_jenis_kasus'>
											<option value=''>-JENIS KASUS-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_jenis_kasus'];?>"><?php echo $r['nama_jk'];?></option>
										<?php }	?>
										</select>
									</td>
								</tr>
								<tr>
										<td>TEMU PENTING</td>
										<td><textarea name="temu_penting"></textarea></td>
								</tr>
								<tr>
										<td>LABORATORIUM, RADIOLOGI, DAN PENUNJANGAN</td>
										<td><textarea name="laboratorium"></textarea></td>
								</tr>
								<tr>
										<td>ANAMNESA</td>
										<td><textarea name="anamnesa"></textarea></td>
								</tr>
								<tr>
										<td>TERAPI PENGOBATAN</td>
										<td><textarea type="text" name="terapi"></textarea></td>
								</tr>
								</table>	
							</div>
						</div>
					<div class="box" style="float:left;width: 48%;height:300px;margin-top:-8%;margin-left:51%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 96%;">
								<h2>KELUAR</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>KEADAAN KELUAR</td>
										<td>
										<?php
										$sql = "select a.nama_rm from  data_rm a
												left join kategori_rm z on a.id_kategori = z.id_kategori WHERE z.id_kategori=5";
										$query = mysql_query($sql); ?>
										<select name='id_rekam_medik'>
											<option value=''>-KEADAAN KELUAR-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_rekam_medik'];?>"><?php echo $r['nama_rm'];?></option>
										<?php }	?>
										</select>
									</td>
									</tr>
									<tr>
										<td>CARA KELUAR</td>
										<td>
										<?php
										$sql = "select a.nama_rm from  data_rm a
												left join kategori_rm z on a.id_kategori = z.id_kategori WHERE z.id_kategori=6";
										$query = mysql_query($sql); ?>
										<select name='id_rekam_medik'>
											<option value=''>-CARA KELUAR-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_rekam_medik'];?>"><?php echo $r['nama_rm'];?></option>
										<?php }	?>
										</select>
									</td>
									</tr>
									<tr>
										<td>PEMERIKSAAN LANJUTAN</td>
										<td>
										<?php
										$sql = "select a.nama_rm from  data_rm a
												left join kategori_rm z on a.id_kategori = z.id_kategori WHERE z.id_kategori=8";
										$query = mysql_query($sql); ?>
										<select name='id_rekam_medik'>
											<option value=''>-PEMERIKSAAN LANJUTAN-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_rekam_medik'];?>"><?php echo $r['nama_rm'];?></option>
										<?php }	?>
										</select>
									</td>
									</tr>
									<tr>
										<td>RINGKAS PROSES</td>
										<td><textarea type="text" name="ringkas_proses"></textarea></td>
								</tr>
								</table>
							</div>
						</div>
					<div class="box" style="float:left;width: 49%;height:400px;margin-top:23%;margin-left:-49%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 96%;">
								<h2>DIAGNOSA </h2>
								<input type="button" name="add_btn" id="add_btn" value="TAMBAH DIAGNOSA">
							</div>
								<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:200px;margin-top:6%;margin-left:-0%;">
								<!-- Table -->
								<table border="1" id="tablediagnosa">
									<tr>
										<td> NO </td>
										<td> DIAGNOSA</td>
										<td> KODE ICD10</td>
									</tr>
									
								</table>				
							</div>
					</div>
						
				</div>
			</div>
			<!-- End Box -->	
			</div>
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