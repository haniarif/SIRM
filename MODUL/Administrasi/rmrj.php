<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
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
					<h2>REKAM MEDIS RAWAT JALAN</h2>
				</div>
				<!-- End Box Head-->
						<div class="box" style="float:left;width: 49%;height:470px;margin-top:1%;margin-left:1%;">					
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
												//$('#input_data4').val(pasien.id_kelurahan);
												$('#input_data4').tokenInput("add", {id: pasien.id_kelurahan, name: pasien.nama_kelurahan});
												$('#jk_pasien').val(pendf_rj.jk_pasien);
												$('#tgl_lhr').val(pendf_rj.tgl_lhr);
												$('#gol_darah').val(pendf_rj.gol_darah);
												$('#perkawinan').val(pendf_rj.perkawinan);
												$('#penddkn').val(pendf_rj.penddkn);
												$('#pekerjaan').val(pendf_rj.pekerjaan);
												$('#agama').val(pendf_rj.agama_pasien);
												
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
										<td><input type="text" name="alamat_pasien" class="isi" id="alamat"></textarea></td>
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
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>REKAM MEDIS</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>WAKTU</td>
										<td><input type="text" name="nafas" class="isi"></td>
									</tr>
									<tr>
										<td>KLINIK</td>
										<td><input type="text" name="nafas" class="isi"></td>
									</tr>
									<tr>
										<td>DOKTER</td>
										<td><input type="text" name="nafas" class="isi"></td>
									</tr>
									<tr>
										<td>ANAMNESA</td>
										<td><textarea name="anamnesa"></textarea></td>
									</tr>
									<tr>
										<td>JENIS KASUS</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>TINDAK LANJUT</td>
										<td><input type=text; name=namapenanggungjawab;></td>
									</tr>
									<tr>
										<td>CATATAN</td>
										<td><input type=text; name=namapenanggungjawab;></textarea></td>
									</tr>
								</table>	
							</div>
						</div>
					<div class="box" style="float:left;width: 49%;height:100px;margin-top:50%;margin-left:1%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 68%;">
								<h2>DIAGNOSA </h2>
								<a href="#" class="add-button"><span>DIAGNOSA</span></a><br>
								</div>
								<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:100px;margin-top:4%;margin-left:-28%;">
								<!-- Table -->
								<table border="1">
									<tr>
										<td> NO </td>
										<td> DIAGNOSA</td>
										<td> KODE ICD10</td>
										<td> AKSI </td>
									</tr>
									<TR>
										<td>1</td>
										<td>DIAGNOASA APA SAJA KAN SUDAH GEDE</td>
										<td>10.45</td>
										<td><input type="reset" name="batal" value=HAPUS ></td>
									</TR>
								</table>				
							</div>
					</div>
					<div class="box" style="float:left;width: 49%;height:100px;margin-top:8%;margin-left:1%;">					
							<!-- Box Head -->
							<div class="box-head"  style="height:25px; width: 68%;">
								<h2>TINDAKAN </h2>
								<a href="#" class="add-button"><span>TINDAKAN</span></a><br>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content" style="float:left;width: 49%;height:100px;margin-top:4%;margin-left:-28%;">
								<!-- Table -->
								<table border="1">
									<tr>
										<td> NO </td>
										<td> TINDAKAN</td>
										<td> KODE ICD9</td>
										<td> AKSI </td>
									</tr>
									<TR>
										<td>1</td>
										<td>DIAGNOASA APA SAJA KAN SUDAH GEDE</td>
										<td>10.45</td>
										<td><input type="reset" name="batal" value=HAPUS ></td>
									</TR>
								</table>				
							</div>
							
						</div>
						<div class="box" style="float:rifght;width: 40%;height:50px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>ALASAN DATANG</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>ALASAN DATANG</td>
										<td><select width=50px><option value=alasandatang>Pilih Alasan Datang</option>
										</select></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="box" style="float:rifght;width: 40%;height:238px;margin-top:1%;margin-left:57%;">				
							<!-- Box Head -->
							<div class="box-head" style="height:25px; width: 82%;">
								<h2>KELUAR</h2>
							</div>
							<!-- End Box Head-->
							<div class="box-content">
								<!-- Table -->	
								<table>
									<tr>
										<td>KEADAAN KELUAR</td>
										<td><select width=50px><option value=keadaankeluar>Pilih Keadaan Keluar</option>
										</select></td>
									</tr>
									<tr>
										<td>CARA KELUAR</td>
										<td><select width=50px><option value=carakeluar>Pilih Alasan Datang</option>
										</select></td>
									</tr>
									<tr>
										<td>PEMERIKSAAN LANJUTAN</td>
										<td><select width=50px><option value=pemeriksaanlanjutan>Pilih Alasan Datang</option>
										</select></td>
									</tr>
									<tr></tr><tr></tr><tr></tr><tr></tr>
									<tr>
										<td> <input type="submit" name="submit" value=SIMPAN></td>
										<td><input type="reset" name="batal" value=BATAL ></td>
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

