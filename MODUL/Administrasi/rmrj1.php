<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
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
<div id="container" >
	<!-- Start Shell -->
	<div class="shell">
		<!-- Main -->
		<div id="main">
			<div class="box-content" >
			<form method="post" action="rmrj.php" class="form">	
			<div class="box" style="height:1000px; width:1000px;">					
				<!-- Box Head -->
				<div class="box-head">
					<h2>REKAM MEDIS RAWAT JALAN</h2>
				</div>
				<!-- End Box Head-->
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
										<td><input type="text" name="no_rm" id="input_data">
										<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_no_rm", {
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
											url: '../../config/file_json.php?aksi=get_pasien_rj&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pendf_rj = data[0];
												
												console.log(pendf_rj);	
												$('#nama_pasien').val(pendf_rj.name);
												$('#alamat').val(pendf_rj.alamat_pasien);
												$('#input_data4').tokenInput("add", {id: pendf_rj.id_kelurahan, name: pendf_rj.nama_kelurahan});
												$('#jk_pasien').val(pendf_rj.jk_pasien);
												$('#tgl_lhr').val(pendf_rj.tgl_lhr);
												$('#gol_darah').val(pendf_rj.gol_darah);
												$('#agama_pasien').val(pendf_rj.agama_pasien);
												$('#nama_klinik').val(pendf_rj.nama_klinik);
												$('#nama_pegawai').val({id: pendf_rj.id_dokter, name: pendf_rj.nama_pegawai});
												
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
									<tr>
										<td>TENSI</td>
										<td><input type="text" name="tensi" class="isi"></td>
									</tr>
									<tr>
										<td>NADI</td>
										<td><input type="text" name="nadi" class="isi"></td>
									</tr>
									<tr>
										<td>SUHU</td>
										<td><input type="text" name="suhu" class="isi"></td>
									</tr>
									<tr>
										<td>NAFAS</td>
										<td><input type="text" name="nafas" class="isi"></td>
									</tr>
									<tr>
										<td>TINGGI</td>
										<td><input type="text" name="tinggi" class="isi"></td>
									</tr>
									<tr>
										<td>BERAT</td>
										<td><input type="text" name="berat" class="isi"></td>
									</tr>
									<tr>
										<td>LILA</td>
										<td><input type="text" name="lila" class="isi"></td>
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
										<td><input type="time" name="waktu" class="isi"></td>
									</tr>
									<tr>
										<td>KLINIK</td>
										<td><input type="text" name="nama_klinik" class="isi" id="nama_klinik"></td>
									</tr>
									<tr>
										<td>DOKTER</td>
										<td><input type="text" name="nama_pegawai" class="isi" id="nama_pegawai"></td>
									</tr>
									<tr>
										<td>ANAMNESA</td>
										<td><textarea name="anamnesa"></textarea></td>
									</tr>
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
										<td>TINDAK LANJUT</td>
										<td>
										<?php
										$sql = "select a.nama_rm from  data_rm a
												left join kategori_rm z on a.id_kategori = z.id_kategori WHERE z.id_kategori=1";
										$query = mysql_query($sql); ?>
										<select name='id_rekam_medik'>
											<option value=''>-TINDAK LANJUT-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_rekam_medik'];?>"><?php echo $r['nama_rm'];?></option>
										<?php }	?>
										</select>
									</td>
									</tr>
									<tr>
										<td>CATATAN</td>
										<td><textarea type="text" name="catatan"></textarea></td>
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
										<td>
										<?php
										$sql = "select a.nama_rm from  data_rm a
												left join kategori_rm z on a.id_kategori = z.id_kategori WHERE z.id_kategori=7";
										$query = mysql_query($sql); ?>
										<select name='id_rekam_medik'>
											<option value=''>-ALASAN DATANG-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_rekam_medik'];?>"><?php echo $r['nama_rm'];?></option>
										<?php }	?>
										</select>
									</td>
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
									
								</table>
							</div>
						</div>
						<div class="box" style="float:left;width: 49%;height:400px;margin-top:-42%;margin-left:51%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 96%;">
								<h2>TINDAKAN </h2>
								<input type="button" name="add_tindakan" id="add_tindakan" value="TAMBAH TINDAKAN">
							</div>
							<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:100px;margin-top:5%;margin-left:-0%;">
								<!-- Table -->
								<table border="1" id="tabletindakan">
									<tr>
										<td> NO </td>
										<td> TINDAKAN</td>
										<td> KODE ICD9</td>
										<td> AKSI </td>
									</tr>
									
								</table>				
							</div>
							
						</div>
						<div class="box" style="float:center;width: 13%;height:19px;margin-top:0%;">
						<tr>
							<td><input type="submit" name="submit" value=SIMPAN></td>
							<td><input type="reset" name="batal" value=BATAL ></td>
						</tr>
						</div>
				</form>
			</div>
			</div>
			<!-- End Box -->	
		</div>
	</div>
<!-- End Container -->


<!-- Footer --><div id="footer" style="clear:both">

	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>
<?php
if (isset($_POST['submit'])){
include "../../koneksi.php";
mysql_query("insert into rmrj (id_rmrj, id_pendftrn, waktu, anamnesa, tensi, nadi, suhu, nafas, tinggi, berat, lila, catatan, datang, tindak_lanjut, keadaan keluar, cara_keluar, pemeriksaan) 
			values ('', '$_POST[id_pendftrn]', '$_POST[waktu]', '$_POST[anamnesa]', '$_POST[tensi]', '$_POST[nadi]', '$_POST[suhu]', '$_POST[nafas]', '$_POST[tinggi]', '$_POST[berat]', '$_POST[lila]' , '$_POST[catatan]', '$_POST[id_jenis_kasus]', '$_POST[datang]', '$_POST[tindak_lanjut]', '$_POST[keadaan_keluar]', '$_POST[cara_keluar]', '$_POST[pemeriksaan]')");
			echo $sql;
		$id_rmrj=mysql_insert_id();
		
		$rows=$_POST['rows'];
		
		var_dump($_POST['id_icd10']);
		
		foreach($rows as $key=>$r){
			echo $_POST['id_icd10'][$key];
				mysql_query("insert into rmrj_diagnosa (id_dg, id_rmrj, id_icd10) 
				values ('','$id_rmrj', '".$_POST['id_icd10'][$key]."')") or die(mysql_error());
		$id_rmrj=mysql_insert_id();
		
		$rows=$_POST['rows'];
		
		var_dump($_POST['id_icd9']);
		foreach($rows as $key=>$r){
			echo $_POST['id_icd9'][$key];
				mysql_query("insert into  rmrj_tindakan (id_dt, id_rmrj, id_icd9) 
				values ('','$id_rmrj', '".$_POST['id_icd9'][$key]."')") or die(mysql_error());
		}
	echo "<meta http-equiv='refresh' content='0; url=simpan_rmrj.php?id=$id_rmrj'>";
}
}
?>
