<?php
include "../../koneksi.php";
if(isset($_GET['id_spesialisasi'])){
$id = $_GET['id_spesialisasi'];
$sql = mysql_query ("select * from spesialisasi where id_spesialisasi = '$id'") or die(mysql_error());
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
						<h2 class="left"><a href="spesialisasi.php">MASTER DATA SPESIALISASI</a></h2>
						<div class="right">
							<label>search SPESIALISASI</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<form method="post" action="editspesialisasi.php">
							<table border="0" cellspacing="0" cellpadding="5" width="95%" class="form">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_spesialisasi' value='<?php echo $data['id_spesialisasi'];?>'/></td>
								</tr>
								<tr>
									<td width="150">Nama</td>
									<td colspan="3">: <input type="text" name="nama_spesialisasi" size="50" value="<?php echo $data['nama_spesialisasi'];?>"></td>
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
					<a href="tambahspesialisasi.php" class="add-button"><span>TAMBAH SPESIALISASI</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM spesialisasi");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_spesialisasi'];?></td>
								<td><a href="hapusspes.php?id_spesialisasi=<?=$data['id_spesialisasi']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_spesialisasi'];?>')">Delete</a><a href="editspesialisasi.php?id_spesialisasi=<?=$data['id_spesialisasi']?>" class="ico edit">Edit</a></td>
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
	$id=$_POST['id_spesialisasi'];
	$nama_spesialisasi=$_POST['nama_spesialisasi'];
	$query=mysql_query("update spesialisasi set nama_spesialisasi = '$nama_spesialisasi'
					where id_spesialisasi = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=spesialisasi.php'>";
	}
}	
?>