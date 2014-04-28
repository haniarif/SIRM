<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function konfirmasi(nama){
			return confirm('Apakah anda yakin menghapus data '+nama+'?');
		}
	</script>
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
			    <li><a href="master.php" class="active"><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../../informasi.php"><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">	
		
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left" ><a href="pegawai.php">MASTER DATA PEGAWAI</a></h2>
						<div class="right">
							<label>search Pegawai</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
						<div class="table">
					<form method="post" action="tambahdokter.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>No. Identitas</td>
									<td colspan="3">: <input type="text" name="id_pegawai" id="input_data" size="50" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_pegawai", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>Nama</td>
									<td colspan="3">: <input type="text" name="nama_pegawai" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td colspan="3">: <input type="text" name="alamat_pgwai" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td><input type="radio" name="jk_pegawai" value=laki-laki> Laki-laki
										<input type="radio" name="jk_pegawai" value=perempuan> Perempuan</td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:<select width=50px name="agama"><option value=agama>Pilih Agama </option>
														   <option value=islam>Islam</option>
														   <option value=kristen>Kristen</option>
														   <option value=katolik>Katolik</option>
														   <option value=hindu>Hindu</option>
														   <option value=budha>Budha</option>
									</select>
									</td>
								</tr>
								<tr>
									<td>NO. SIP</td>
									<td colspan="3">: <input type="text" name="no_sip" size="50" placeholder="require">
									</td>
								</tr>
								<tr>
									<td>Spesialisasi</td>
									<td colspan="3">: <input type="text" name="id_spesialisasi" id="input_data" size="50" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_spesialisasi", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script></td>
								</tr>
								<tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Simpan"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
						</div>
					<div class="table">
					<a href="tambahdokter.php" class="add-button"><span>TAMBAH DOKTER</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>JENIS KELAMIN</th>
								<th>AGAMA</th>
								<th>NO. SIP</th>
								<th>SPESIALISASI</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM dokter");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nip'];?></td>
								<td><?php echo $data['nama_pegawai'];?></td>
								<td><?php echo $data['level'];?></td>
								<td><?php echo $data['alamat_pgwai']. ' Kec.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
								<td><?php echo $data['jabatan'];?></td>
								<td><a href="hapuspg.php?id_pegawai=<?=$data['id_pegawai']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_pegawai'];?>')">Delete</a><a href="editpg.php?id_pegawai=<?=$data['id_pegawai']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
						</table>				
					</div>
					<!-- Table -->
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp; </div>			
		</div>
		<!-- Main -->
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
<script>
$(document).ready(function(){
	$("#input-data").on('change',function(){
		$.ajax('');
	});
});
</script>
<?php
// simpan dokter
if (isset($_POST['submit'])){
include "../../koneksi.php";
	$sql = "insert into dokter (nip, nama_pegawai, level, no_id_pegawai, alamat_pgwai, id_kelurahan, jk_pegawai, tgl_lhr_pgwai, kk_pegawai, 	
			posisi_pgawai, no_telp_pegawai, golongan, jabatan, pangkat, no_sk, tgl_sk, tgl_masuk_unit, pnddkn, pekerjaan, agama, kawin ) 
			values ('$_POST[nip]', '$_POST[nama_pegawai]', '$_POST[level]', '$_POST[no_id_pegawai]', '$_POST[alamat_pgwai]', '$_POST[id_kelurahan]',  '$_POST[jk_pegawai]', '$_POST[tgl_lhr_pgwai]', '$_POST[kk_pegawai]', '$_POST[posisi_pgawai]', '$_POST[no_telp_pegawai]', '$_POST[golongan]', '$_POST[jabatan]', '$_POST[pangkat]', '$_POST[no_sk]', '$_POST[tgl_sk]', '$_POST[tgl_masuk_unit]', '$_POST[pnddkn]', '$_POST[pekerjaan]','$_POST[agama]', '$_POST[kawin]')";
			echo $sql;
	mysql_query($sql);
	echo "<meta http-equiv='refresh' content='0; url=pegawai.php'>";
}
?>