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
					<h2>PENDAFTARAN RAWAT JALAN</h2>
				</div>
				<!-- End Box Head-->
				
				<div class="box-content" style="height:620px; width:900px" >
					<!-- Table -->
					<div class="table">
					<form method="post" action="pendaftranrj.php" class="form">					
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>Jenis Pasien</td><td>
									<input type="radio" name="jenis_pasien" value="lama" id="pasien_lama" checked="checked"/> Lama
									<input type="radio" name="jenis_pasien" value="baru" id="pasien_baru"/> Baru
								</td>
								<td> TANGGAL </td>
								<td><?php
									$tgl=date('d-m-Y');
									echo $tgl;
								?><input type="hidden" name="tanggal" value="<?php echo date('Y-m-d');?>">
								</td>
							</tr>
							<tr style="display:none" id="tr_baru">
								<td>NO. RM</td>
								<td> 	<?php include "../../koneksi.php";
										include "../fungsi/fungsi.php";
										$sql = "SELECT MAX(ID_PASIEN)+1 AS ID FROM PASIEN";
										$query = mysql_query($sql);
										$data = mysql_fetch_array($query);
										$nil = 1;
										if($data['ID'] !== NULL){
											$nil = $data['ID'];
										}
										$value = auto_rm($nil);
									?>
									<input type="text" name="no_rm_baru" id="input_data_baru" class="isi" value="<?php echo $value;?>">
								</td>
								<td>Rujukan</td>
								<td><select width=80px name="rujukan"><option value=pilihrujukan>Pilih Rujukan</option>
																	<option value=rumahsakit>Rumah Sakit</option>
																	<option value=spkandungan>Spesialis Kandungan</option>
									</select>
								</td>
							</tr>
							<tr id="tr_lama">
								<td>NO. RM</td>
								<td> <input type="text" name="no_rm" id="input_data">
									<input type="hidden" name="id_pasien" id="id_pasien_lama">
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_no_rm", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_pasien(item.name)
											}
											
										});
									});
									
									function get_pasien(no_rm){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_pasien&no_rm='+no_rm,
											dataType: 'json',
											success: function(data){
												var pasien = data[0];
												
												console.log(pasien);					
												$("#id_pasien_lama").val(pasien.id_pasien);
												$('#nama_pasien').val(pasien.name);
												$('#alamat').val(pasien.alamat_pasien);
												//$('#input_data4').val(pasien.id_kelurahan);
												$('#input_data4').tokenInput("add", {id: pasien.id_kelurahan, name: pasien.nama_kelurahan});
												$('#jk_pasien').val(pasien.jk_pasien);
												$('#tgl_lhr').val(pasien.tgl_lhr);
												$('#gol_darah').val(pasien.gol_darah);
												$('#perkawinan').val(pasien.perkawinan);
												$('#penddkn').val(pasien.penddkn);
												$('#pekerjaan').val(pasien.pekerjaan);
												$('#agama_pasien').val(pasien.agama_pasien);
												
											}
										});
									}
									</script></td>
								<td>Rujukan</td>
								<td><select width=80px name="rujukan"><option value=pilihrujukan>Pilih Rujukan</option>
																	<option value=rumahsakit>Rumah Sakit</option>
																	<option value=spkandungan>Spesialis Kandungan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td><input type="text" name="nama_pasien" class="isi" id="nama_pasien"></td>
								<td>Layanan</td>
								<td><input type="text" name="id_layanan" id="input_data3" >
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data3").tokenInput("../../config/file_json.php?aksi=cari_layanan", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script></td>								
							</tr>
							<tr>
								<td>ALAMAT</td>
								<td><input type="text" name="alamat_pasien" class="isi" id="alamat"></td>
								<td>DOKTER</td>
								<td><input type="text" name="id_dokter" id="input_data6" >
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data6").tokenInput("../../config/file_json.php?aksi=cari_dokter", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script></td>
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
								<td>KLINIK</td>
								<td><input type="text" name="id_klinik" id="input_data5" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data5").tokenInput("../../config/file_json.php?aksi=cari_klinik", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script></td>
							</tr>
						</table>
						<table style="float:left; margin-left:1px;" >
							<tr>
								<td>JENIS KELAMIN</td>
									<td><input type="radio" id="jk_pasien" name="jk_pasien" value=laki-laki> Laki-laki
										<input type="radio"  id="jk_pasien" name="jk_pasien" value=perempuan> Perempuan</td>
							</td>
							<tr>
								<td>TANGGAL LAHIR</td>
								<td><input type="date" name="tgl_lhr" class="isi" id="tgl_lhr"></td>
							<tr>
								<td>GOL. DARAH</td>
								<td><select width=50px name="gol_darah" id="gol_darah" ><option value=pilihgol >Pilih Gol. Darah</option>
																		<option value=o>O</option>
																		<option value=ab>AB</option>
																		<option value=a>A</option>
																		<option value=b>B</option>
									</select></td>
							</tr>
							<tr>
								<td>STATUS PERKAWINAN</td>
								<td><select width=50px id="perkawinan" name="perkawinan"><option value=pilihstatus>Pilih Status</option>
													   <option value=islam>Menikah</option>
													   <option value=kristen>Belum Menikah</option>
									</select></td>
							</tr>
							<tr>
								<td>PENDIDIKAN TERAKHIR</td>
								<td><select width=50px id="penddkn" name="penddkn"><option value=pilihpendidikan>Pilih Pendidikan</option>
														<option value=sd>SD</option>
														<option value=smp>SMP</option>
														<option value=sma>SMA</option>
														<option value=s1>S1</option>
									</select></td>
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td><select width=50px id="pekerjaan" name="pekerjaan"><option value=pilihpekerjaan>Pilih Pekerjaan</option>
														<option value=wiraswasta>Wiraswasta</option>
														<option value=pns>PNS</option>
														<option value=tidakbekerja>Tidak Bekerja</option>
									</select></td>
							</tr>
							<tr>
								<td>AGAMA</td>
								<td><select width=50px id="agama_pasien" name="agama_pasien"><option value=pilihagama>Pilih Agama</option>
													   <option value=islam>Islam</option>
													   <option value=kristen>Kristen</option>
													   <option value=katolik>Katolik</option>
													   <option value=hindu>Hindu</option>
													   <option value=budha>Budha</option>
									</select></td>
							</tr>
							<tr>
								<td> <input type="submit" name="submit" value=SIMPAN></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>	
						<div class="box" style="float:left;width: 45%;height:238px;margin-top:-33%;margin-left:53%;">					
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
										<td><input type=text; name="nama_pj"; class="isi"></td>
									</tr>
									<tr>
										<td>POSISI</td>
										<td><select width=50px name="posisi_pj"><option value=pilihposisi>Pilih Posisi</option>
															<option value=ayah>Ayah</option>
														   <option value=ibu>Ibu</option>
														   <option value=anak>Anak</option>
														   <option value=paman>Paman</option>
														   <option value=bibi>Bibi</option>
											</select></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td><input type="date" name="tgl_lhr_pj" class="isi"> </td>
									</tr>
									<tr>
										<td>PEKERJAAN</td>
										<td><select  name="pkrjaan_pj"><option value=pilihpekerjaan>Pilih Pekerjaan</option>
														<option value=wiraswasta>Wiraswasta</option>
														<option value=pns>PNS</option>
														<option value=tidakbekerja>Tidak Bekerja</option>
											</select></td>
									</tr>
									<tr>
										<td>No Telp.</td>
										<td><input type="text" name="no_telp_pj" class="isi"></td>
									</tr>
								</table>	
							</form>
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
<div id="footer" style="clear:both">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
<script type="text/javascript">
	$("#pasien_lama").click(function(){
		$('#tr_baru').hide();
		$('#tr_lama').show();
	});
	$("#pasien_baru").click(function(){
		$('#tr_lama').hide();
		$('#tr_baru').show();
	});
</script>
</body>
</html>

<?php

// simpan pendaftaran
if (isset($_POST['submit'])){

include "../../koneksi.php";
	if($_POST['jenis_pasien']=='baru'){
		$sql = "insert into pasien 
		(no_rm,  nama_pasien,  alamat_pasien, id_kelurahan, jk_pasien, tgl_lhr, gol_darah, agama_pasien, penddkn, pekerjaan, perkawinan)	values ('$_POST[no_rm_baru]','$_POST[nama_pasien]','$_POST[alamat_pasien]','$_POST[id_kelurahan]','$_POST[jk_pasien]','$_POST[tgl_lhr]',
	'$_POST[gol_darah]','$_POST[agama_pasien]','$_POST[penddkn]','$_POST[pekerjaan]','$_POST[perkawinan]')";
	
	mysql_query($sql);
	
	$id_pasien=mysql_insert_id();
	
	$sql = "insert into pendf_rj (id_pasien, id_layanan, tanggal, rujukan, id_klinik, id_dokter, nama_pj, posisi_pj, tgl_lhr_pj, pkrjaan_pj, no_telp_pj) 
			values ('$id_pasien', '$_POST[id_layanan]',  '$_POST[tanggal]','$_POST[rujukan]', '$_POST[id_klinik]', '$_POST[id_dokter]', '$_POST[nama_pj]', '$_POST[posisi_pj]', '$_POST[tgl_lhr_pj]', '$_POST[pkrjaan_pj]', '$_POST[no_telp_pj]')";
			echo $sql;
	mysql_query($sql);
	
	}
	else{
		$sql = "insert into pendf_rj (id_pasien, id_layanan, tanggal, rujukan, id_klinik, id_dokter, nama_pj, posisi_pj, tgl_lhr_pj, pkrjaan_pj, no_telp_pj) 
			values ('$_POST[id_pasien]', '$_POST[id_layanan]', '$_POST[tanggal]','$_POST[rujukan]', '$_POST[id_klinik]', '$_POST[id_dokter]', '$_POST[nama_pj]', '$_POST[posisi_pj]', '$_POST[tgl_lhr_pj]', '$_POST[pkrjaan_pj]', '$_POST[no_telp_pj]')";
			echo $sql;
	mysql_query($sql);
	}
	
	$id_pendaftaran_rj=mysql_insert_id();

	
	echo "<meta http-equiv='refresh' content='0; url=simpan_rj.php?id=$id_pendaftaran_rj'>";
}
?>