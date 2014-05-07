<?php
session_start();
if(empty($_SESSION['id_pengguna'])){ ?>
	<meta http-equiv="refresh" content="0;url=../../login.php" /><?php
}
include "../../koneksi.php";
?>
<?php
include "../../koneksi.php";
if(isset($_GET['id_rekam_medik'])){
$id = $_GET['id_rekam_medik'];
$sql = mysql_query ("select * from data_rm a left join kategori_rm b on a.id_kategori = b.id_kategori where id_rekam_medik = '$id'") or die(mysql_error());
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
						<h2 class="left">MASTER DATA ICD9</h2>
						<div class="right">
							<label>search ICD9</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<form method="post" action="editdatarm.php">
							<table border="0" cellspacing="0" cellpadding="5" width="95%" class="form">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_rekam_medik' value='<?php echo $data['id_rekam_medik'];?>'/></td>
								</tr>
								<tr>
									<td>Nama </td>
									<td colspan="3">: <input type='text' name='nama_rm' class="isi" value='<?php echo $data['nama_rm'];?>'></td>
								</tr>
								<tr>
									<td>Kategori Rekam Medik </td>
									<td colspan="3">: 
										
										<?php
										$sql = "select * from kategori_rm order by nama_kategori";
										$query = mysql_query($sql); ?>
										<select name='id_kategori'>
											<option value="<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori'];?></option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_kategori'];?>"><?php echo $r['nama_kategori'];?></option>
										<?php }	?>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="ubah" value="Ubah"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
					</form>
				
				<div class="table">
				<a href="tambahdatarm.php" class="add-button"><span>TAMBAH REKAM MEDIK</span></a><br>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA</th>
								<th>KATEGORI DATA RM</th>
								<th>AKSI</th>
							</tr>
							<?php
							$no=0;
							$query = mysql_query("SELECT * FROM data_rm a left join kategori_rm b on a.id_kategori = b.id_kategori");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_rm'];?></td>
								<td><?php echo $data['nama_kategori'];?></td>
								<td><a href="hapusdatarm.php?id_rekam_medik=<?=$data['id_rekam_medik']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_rm'];?>')">Delete</a><a href="editdatarm.php?id_rekam_medik=<?=$data['id_rekam_medik']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
						</table>				
					</div>
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
	$id=$_POST['id_rekam_medik'];
	$nama_rm=$_POST['nama_rm'];
	$kategori_rm=$_POST['id_kategori'];
	$query=mysql_query("update data_rm set nama_rm = '$nama_rm',
					id_kategori = '$kategori_rm'
					where id_rekam_medik = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=datarm.php'>";
	}
}	
?>