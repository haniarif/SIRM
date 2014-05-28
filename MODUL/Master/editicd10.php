<?php
include "../../koneksi.php";
if(isset($_GET['id_icd10'])){
$id = $_GET['id_icd10'];
$sql = mysql_query ("select * from icd10 where id_icd10 = '$id'") or die(mysql_error());
$data = mysql_fetch_array($sql);
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
						<h2 class="left">MASTER DATA icd10</h2>
						<div class="right">
							<label>search icd10</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<form method="post" action="editicd10.php">
							<table border="0" cellspacing="0" cellpadding="5" width="95%" class="form">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_icd10' value='<?php echo $data['id_icd10'];?>'/></td>
								</tr>
								<tr>
									<td width="150">Nama</td>
									<td colspan="3">: <input type="text" name="nama_icd10" class="isi" size="8" value="<?php echo $data['nama_icd10'];?>"></td>
								</tr>
								<tr>
									<td>Kode</td>
									<td colspan="3">: <input type="text" name="kode_icd10" size="50" class="isi" value="<?php echo $data['kode_icd10'];?>"></td>
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
	$id=$_POST['id_icd10'];
	$nama_icd10=$_POST['nama_icd10'];
	$kode_icd10=$_POST['kode_icd10'];
	$query=mysql_query("update icd10 set nama_icd10 = '$nama_icd10',
					kode_icd10 = '$kode_icd10'
					where id_icd10 = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=icd10.php'>";
	}
}	
?>