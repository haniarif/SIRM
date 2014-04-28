<?php
include "../../koneksi.php";
if(isset($_GET['id_jenis_kasus'])){
$id = $_GET['id_jenis_kasus'];
$sql = mysql_query ("select * from jenis_kasus where id_jenis_kasus = '$id'") or die(mysql_error());
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
				<a href="#">Log out</a>
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
						<h2 class="left">MASTER DATA ICD9</h2>
						<div class="right">
							<label>search ICD9</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<form method="post" action="editjk.php">
							<table border="0" cellspacing="0" cellpadding="5" width="95%" class="form">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_jenis_kasus' value='<?php echo $data['id_jenis_kasus'];?>'/></td>
								</tr>
								<tr>
									<td>Nama </td>
									<td colspan="3">: <input type='text' name='nama_jk' value='<?php echo $data['nama_jk'];?>'></td>
								</tr>
								<tr>
									<td>Kategori Jenis Kasus</td>
									<td>:<select width=50px name='kategori_jk' value='<?php echo $data['kategori_jk'];?>'>
														   <option value=kategorirm>Pilih Kategori Jenis Kasus</option>
														   <option value=rawatjalan>Rawat Jalan</option>
														   <option value=rawatinap>Rawat Inap</option>
														   <option value=rawatdarurat>Rawat Darurat</option>
									</select></td>
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
								<th>NAMA</th>
								<th>KATEGORI</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM jenis_kasus");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_jk'];?></td>
								<td><?php echo $data['kategori_jk'];?></td>
								<td><a href="hapusjk.php?id_jenis_kasus=<?=$data['id_jenis_kasus']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_jk'];?>')">Delete</a><a href="editjk.php?id_jenis_kasus=<?=$data['id_jenis_kasus']?>" class="ico edit">Edit</a></td>
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
	$id=$_POST['id_jenis_kasus'];
	$nama_jk=$_POST['nama_jk'];
	$kategori_jk=$_POST['kategori_jk'];
	$query=mysql_query("update jenis_kasus set nama_jk = '$nama_jk',
					kategori_jk = '$kategori_jk'
					where id_jenis_kasus = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=jenis_kasus.php'>";
	}
}	
?>