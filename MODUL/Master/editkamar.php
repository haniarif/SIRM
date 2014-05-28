<?php
include "../../koneksi.php";
if(isset($_GET['id_kamar'])){
$id = $_GET['id_kamar'];
$sql = mysql_query ("select * from kamar a left join klinik b on a.id_klinik = b.id_klinik where id_kamar = '$id'") or die(mysql_error());
$data = mysql_fetch_array($sql);
?>

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
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input2.css" type="text/css" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="master/index.php">SIRM</a></h1>
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
			    <li><a href="master.php" class="active"><span>MASTER DATA</span></a></li>
				<li><a href="../../transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../../administrasi.php"><span>ADMINISTRASI</span></a></li>
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
						<h2 class="left">MASTER DATA KAMAR</h2>
						<div class="right">
							<label>search KAMAR</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div>
					<form method="post" action="editkamar.php">
					<input type='hidden' name='id_kamar' value='<?php echo $data['id_kamar'];?>'/>
							<table border="1" cellspacing="0" cellpadding="5" width="95%" class="form">
								<tr>
									<td width="150">Nama</td>
									<td colspan="3"> <input type="text" name="nama_kamar" class="isi" size="8" value='<?php echo $data['nama_kamar'];?>'/></td>
								</tr>
								<tr>
									<td>Kelas </td>
									<td colspan="3"> <input type="text" name="kelas" size="50" class="isi" value='<?php echo $data['kelas'];?>'></td>
								</tr>
								<tr>
									<td rowspan="2">Klinik</td>
									<td><b><?php echo $data['nama_klinik'];?></b></td>
								</tr>
								<tr>
									<td>
										<input type="text" name="id_klinik" id="input_data" size="50">
										<script type='text/javascript'>
										$(document).ready(function() {
											$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_klinik", {
												preventDuplicates: true,
												theme: "facebook"										
											});
										});
										</script>
									</td>
								</tr>
								<tr>
									<td>Jenis </td>
									<td colspan="3"> <input type="text" name="jenis" size="50" class="isi" value='<?php echo $data['jenis'];?>'/></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="ubah" value="Ubah"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
							</form>
				</div>
				<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>Nama KAMAR</th>
								<th>KELAS</th>
								<th>KLINIK</th>
								<th>JENIS</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
							<?php
								include "../../koneksi.php";
								$no=0;
								$query = mysql_query("SELECT * FROM kamar");
								while($data= mysql_fetch_array($query)){
								$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_kamar'];?> </td>
								<td><?php echo $data['kelas'];?> </td>
								<td><?php 
								$q=mysql_query("SELECT nama_klinik FROM klinik WHERE id_klinik='$data[id_klinik]'");
								$data2=mysql_fetch_array($q);
								echo $data2['nama_klinik'];?> </td>
								<td><?php echo $data['jenis'];?></td>
								<td><?php echo $data['status'];?></td>
								<td><a href="hapuskamar.php?id_kamar=<?=$data['id_kamar']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_kamar'];?>')">Delete</a><a href="editkamar.php?id_kamar=<?=$data['id_kamar']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
						</table>				
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


<?php
}else{
	if(isset($_POST['ubah'])){
	include "../../koneksi.php";
	$id=$_POST['id_kamar'];
	$nama_kamar=$_POST['nama_kamar'];
	$id_klinik=$_POST['id_klinik'];
	$kelas=$_POST['kelas'];
	$jenis=$_POST['jenis'];
	$query=mysql_query("update kamar set nama_kamar = '$nama_kamar',
					id_klinik = '$id_klinik',
					kelas = '$kelas',
					jenis = '$jenis'
					where id_kamar = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=kamar.php'>";
	}
}	
?>