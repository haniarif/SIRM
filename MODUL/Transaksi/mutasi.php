<?php
session_start();
include "../../koneksi.php";

$id_mutasi=isset($_GET['id_mutasi'])?$_GET['id_mutasi']:null;

if($id_mutasi!=null){
	$query=mysql_query('select * from mutasi z
						left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
						left outer join pasien b on a.id_pasien = b.id_pasien where z.id_mutasi = '.$id_mutasi) or die(mysql_error());
	$data_mutasi=mysql_fetch_array($query);					
	$no_rm=$data_mutasi['no_rm'];
	$id_kamar_lama=$data_mutasi['id_kamar'];
	$nama_pasien=$data_mutasi['nama_pasien'];
	$id_pendaftaran=$data_mutasi['id_pendftrn'];
}else{
	$no_rm=null;
	$id_kamar_lama=null;
	$nama_pasien=null;
	$id_pendaftaran=null;
}

?>
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
<div id="header" style="width:1241px;"> 
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
<div id="container" >
		<!-- Main -->
		<div id="main" style="width:1410px;">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
					<div id="content" style="width:1241px;">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head" >
						<h2>MUTASI RAWAT INAP</h2>
						<div class="right">
							<a href="pindah.php"><input type="submit" class="button" name="pindah" value="PINDAH" /></a>
							<a href="simpan_selesai.php"><input type="submit" class="button" name="selesai" value="SELESAI"/></a>
						</div>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content" >
						<!-- Table -->
					<div class="table">
<<<<<<< HEAD
						<form action="mutasi.php" method="POST">
						<input type="hidden" name="id_mutasi" value="<?php echo $id_mutasi;?>"/>
						<input type="hidden" name="id_kamar_lama" value="<?php echo $id_kamar_lama;?>"/>
						<table>
							<tr>
								<td> No. RM </td>
								<td><?php
									if($no_rm==null){
								?>
									<input type="text" name="no_rm" id="input_data">								
								<?php
									}else{
										echo $no_rm;
									}
								?>
								<input type="hidden" name="id_pendftrn" id="id_pendftrn" value="<?php echo $id_pendaftaran;?>">
										<script type='text/javascript'>
=======
						<form action="simpan_mutasi.php" method="POST">
						<table>
							<tr>
								<td> No. RM </td>
								<td> <input type="text" name="id_pendftrn" id="input_data">
									<script type='text/javascript'>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_no_rm", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
<<<<<<< HEAD
												get_pasien_rj(item.name)
=======
												get_pasien(item.name)
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
											}
											
										});
									});
									
<<<<<<< HEAD
									function get_pasien_rj(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_pasien_rj&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pendf_rj = data[0];
												
												console.log(pendf_rj);	
												$('#nama_pasien').val(pendf_rj.name);
												$('#id_pendftrn').val(pendf_rj.id_pendftrn);
												
=======
									function get_pasien(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_pasien&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pasien = data[0];
												
												console.log(pasien);
												$('#nama_pasien').val(pasien.name);
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
											}
										});
									}
									</script></td>
							</tr>
							<tr>
								<td> NAMA </td>
<<<<<<< HEAD
								<td>
								<?php
									if($nama_pasien==null){
								?>
								<input type='text' name='nama_pasien' class="isi" id="nama_pasien"/>
								<?php
									}else{
										echo $nama_pasien;
									}
								?>								
								</td>
							</tr>
							<tr>
								<td> TANGGAL MASUK</td>
								<td><?php
									$tgl=date('d-m-Y h:m:s');
									echo $tgl;
								?><input type="hidden" name="tgl_masuk" value="<?php echo date('Y-m-d h:m:s');?>">
								</td>
							</tr>
							<tr>
								<td> KAMAR </td>
								<td><input type="text" name="id_kamar" id="input_data3">
								<input type="hidden" name="id_kamar" id="id_kamar">
										<script type='text/javascript'>
									$("#input_data3").tokenInput("../../config/file_json.php?aksi=cari_kamar", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_kamar(item.id)
											}
										});
									function get_kamar(kelas){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_kamar&kelas='+kelas,
											dataType: 'json',
											success: function(data){
												var kamar = data[0];
												console.log(kamar);	
												$('#kelas').val(kamar.name);
												$('#id_kamar').val(kamar.id_kamar);
											}
										})};
									</script></td>
							</tr>
							<tr>
								<td> KELAS </td>
								<td><input type='text' name='kelas' class="isi" id="kelas" /></td>
							</tr>
							<tr>
									<td>DOKTER</td>
									<td>
									<input type="text" name="id_dokter" id="input_data4">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data4").tokenInput("../../config/file_json.php?aksi=cari_dokter", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
										
									</td>
								</tr>
						<tr>
								<td> PETUGAS </td>
								<td><input type="hidden" name='id_pengguna' id="id_pengguna" class="isi" value="<?php echo $_SESSION['id_user'];?>" />
								<?php 
								$q=mysql_query("SELECT pw.nama_pegawai FROM pengguna p left join pegawai pw on p.id_pegawai = pw.id_pegawai WHERE p.id_pengguna='$_SESSION[id_user]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_pegawai'];?>
								</td>
							</tr>
							<tr>
								<td> <input type="hidden" name="tgl_keluar"> </td>
							</tr>
							<tr>
								<td> <input type="hidden" name="status"> </td>
=======
								<td><input type='text' name='tanggal_jual' class="isi" id="nama_pasien" /></td>
							</tr>
							<tr>
								<td> TANGGAL MASUK </td>
								<td><input type='date' name='' value='' class="isi"/></td>
							</tr>
							<tr>
								<td> TANGGAL </td>
								<td><?php
									$tgl=date('d-m-Y');
									echo $tgl;
								?>
								</td>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
							</tr>
							<tr>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
							</tr>
						</form>			
						</table>
						<input type="button" name="add_btn" id="add_btn" value=TAMBAHLAYANAN>
						
<<<<<<< HEAD
						<table id="tablemutasi">
=======
						<table>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
						<tr>
								<td> NO </td>
								<td> LAYANAN</td>
								<td> FREKUENSI </td>
<<<<<<< HEAD
							</tr>
						</table>
						<tr>
							<input type="submit" class="button" name="submit" value="SIMPAN" />
							<input type="reset" class="button" value="BATAL" />
						</tr>
=======
								<td> PETUGAS</td>
								<td> DOKTER1 </td>
								<td> DOKTER2 </td>
							</tr>
							<tr>
							<td><input type="submit" name="submit" value=SIMPAN></td>
							<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
					</div>
					</div>
					</div>
				</div>
				<!-- End Box -->
				
			</div>
					
				</div>
				<!-- End Box -->			
		</div>
		<!-- Main -->
<!-- End Container -->

<!-- Footer -->
<<<<<<< HEAD
<div id="footer" style="clear:both; width:1241px;">
=======
<div id="footer" style="clear:both">
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>

<?php

// simpan mutasi
if (isset($_POST['submit'])){
	if($_POST['id_mutasi']!=''){
		mysql_query("update mutasi set status='0' where id_mutasi=".$_POST['id_mutasi']) or die(mysql_error());
		mysql_query("update kamar set status='0' where id_kamar=".$_POST['id_kamar_lama']) or die(mysql_error());
	}
		
		var_dump($_POST);
		mysql_query("update kamar set status='1' where id_kamar=".$_POST['id_kamar']) or die(mysql_error());
		mysql_query("insert into mutasi (id_mutasi, id_pendftrn, id_pengguna, id_dokter, id_kamar, tgl_masuk, tgl_keluar, status) 
				values ('','$_POST[id_pendftrn]', '$_POST[id_pengguna]', '$_POST[id_dokter]', '$_POST[id_kamar]', '$_POST[tgl_masuk]', '$_POST[tgl_keluar]', '1')") or die(mysql_error());
		
		
		$id_mutasi=mysql_insert_id();
		
		$rows=$_POST['rows'];
		
		var_dump($_POST['id_layanan']);
		
		foreach($rows as $key=>$r){
			echo $_POST['id_layanan'][$key];
			echo $_POST['frekuensi'][$key];
				mysql_query("insert into detail_mutasi (id_dm, id_mutasi, id_layanan, frekuensi) 
				values ('','$id_mutasi', '".$_POST['id_layanan'][$key]."', '".$_POST['frekuensi'][$key]."')") or die(mysql_error());
		}
		
		
		echo "<meta http-equiv='refresh' content='0; url=simpan_mutasi.php?id=$id_mutasi'>";
	
}
?>
