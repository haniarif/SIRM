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
				
				<div class="box-content" style="height:620px; width:1200px" >
					<!-- Table -->
					<div class="table">
						<table style="float:left" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>NO. RM</td>
								<?php
										include "../../koneksi.php";
										include "../fungsi/fungsi.php";
										$sql = "SELECT MAX(ID_PASIEN)+1 AS ID FROM pendft_rj z left join pasien e on z.id_pasien = a.id_pasien";
										$query = mysql_query($sql);
										$data = mysql_fetch_array($query);
										$nil = 1;
										if($data['ID'] !== NULL){
											$nil = $data['ID'];
										}
										$value = auto_rm($nil);
									?>
								<td><input type="text" name="Id_pasien" id="input_data" value="<?php echo $value;?>">
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_no_rm", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
								</td>
								<td>Rujukan</td>
								<td><select width=80px><option value=pilihrujukan>Pilih Rujukan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td><input type="text" name="id_pasien" id="input_data2" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data2").tokenInput("../../config/file_json.php?aksi=cari_pasien", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
								</td>
								<td>Layanan</td>
								<td><input type="text" name="id_layanan" id="input_data3" placeholder="require">
									
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
								<td><input type=text; name=nama; class="isi"></td>
								<td>DOKTER</td>
								<td><input type=text; name=nama; class="isi"></td>
							</tr>
							<tr>
								<td>KELURAHAN</td>
								<td><input type="text" name="id_kelurahan" id="input_data4" placeholder="require">
									
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
						<table style="float:left">
							<tr>
								<td>JENIS KELAMIN</td>
									<td><input type="radio" name="radioku" value=laki-laki> Laki-laki
										<input type="radio" name="radioku" value=perempuan> Perempuan</td>
							</td>
							<tr>
								<td>TANGGAL LAHIR</td>
								<td><input type=text; name=nama; size=13px > UMUR :
								<input type=text; name=nama; size=1px>thn
								<input type=text; name=nama; size=1px>bln
								<input type=text; name=nama; size=1px>hr</td>
							</tr>
							<tr>
								<td>GOL. DARAH</td>
								<td><select width=50px ><option value=pilihgol >Pilih Gol. Darah</option>
									</select></td>
							</tr>
							<tr>
								<td>STATUS PERKAWINAN</td>
								<td><select width=50px><option value=pilihstatus>Pilih Status</option>
									</select></td>
							</tr>
							<tr>
								<td>PENDIDIKAN TERAKHIR</td>
								<td><select width=50px><option value=pilihpendidikan>Pilih Pendidikan</option>
									</select></td>
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td><select width=50px><option value=pilihpekerjaan>Pilih Pekerjaan</option>
									</select></td>
							</tr>
							<tr>
								<td>AGAMA</td>
								<td><select width=50px><option value=pilihagama>Pilih Agama</option>
									</select></td>
							</tr>
							<tr>
								<td> <input type="submit" name="submit" value=SIMPAN></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
						</table>	
						<div class="box" style="float:right;width: 44%;height:238px;margin-top:-31%;margin-left:60%;">					
							<!-- Box Head -->
							<div class="box-head">
								<h2>PENANGGUNG JAWAB</h2>
							</div>
							<!-- End Box Head-->
							
							<div class="box-content">
								<!-- Table -->
								<table>
									<tr>
										<td>NAMA</td>
										<td><input type=text; name=namapenanggungjawab; class="isi"></td>
									</tr>
									<tr>
										<td>POSISI</td>
										<td><select width=50px><option value=pilihposisi>Pilih Posisi</option>
											</select></td>
									</tr>
									<tr>
										<td>TANGGAL LAHIR</td>
										<td><input type=text; name=nama; size=13px class="isi"> </td>
									</tr>
									<tr>
										<td>UMUR :</td>
										<td><input type=text; name=nama; size=1px>thn
										<input type=text; name=nama; size=1px>bln
										<input type=text; name=nama; size=1px>hr</td>
									</tr>
									<tr>
										<td>PEKERJAAN</td>
										<td><select width=50px><option value=pilihpekerjaan>Pilih Pekerjaan</option>
											</select></td>
									</tr>
									<tr>
										<td>No Telp.</td>
										<td><input type=text; name=notelppenanggungjawab; class="isi"></td>
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

<?php
	$query = mysql_query("SELECT * FROM pendf_rj z
	left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
	left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
	left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
	left outer join provinsi d on c.id_provinsi = d.id_provinsi
	left join pasien e on z.id_pasien = e.id_pasien
	left join layanan f on z.id_layanan = f.id_layanan
	left join klinik g on z.id_klinik = g.id_klinik");
	while($data= mysql_fetch_array($query)){
		}					
							?>