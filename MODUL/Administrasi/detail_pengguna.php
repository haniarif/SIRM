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
						<h2 class="left">DETAIL DATA PENGGUNA</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->

					<div class="table">
						<form action="" method="POST">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<?php
									$query = mysql_query("SELECT * FROM pengguna a
													left join pegawai b on a.id_pegawai = b.id_pegawai
													left join role c on a.id_pengguna = c.id_role
													");
									$data = mysql_fetch_array($query);
									?>
								<tr>
									<td>NAMA</td>
									<td> : <?php echo $data['nama_pegawai'];?></td>
								</tr>
								<tr>
									<td>AKSES</td>
									<td> : <?php echo $data['nama_role'];?></td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td>: <?php echo $data['user'];?></td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>: <?php echo $data['password'];?></td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td>: <?php echo $data['status'];?></td>
								</tr>
						</table>
						</form>
					</div>
					</div>
					<div class="table">
					<a href="add_pengguna.php" class="add-button"><span>TAMBAH PENGGUNA</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO</th>
								<th>NIP</th>
								<th>NAMA</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
							<?php
							$sql = mysql_query("SELECT A.*, B.* FROM pengguna A, pegawai B WHERE B.id_pegawai=A.id_pegawai");
							$n = 1;
							while($data = mysql_fetch_array($sql)){ ?>
								<tr>
									<td><?php echo $n;?></td>
									<td><?php echo $data['nip'];?></td>
									<td><?php echo $data['nama_pegawai'];?></td>
									<td><?php if($data['status'] == 1){ echo "Aktif";}else{ echo "Tidak aktrif";}?></td>
									<td><a href="hapus_pengguna.php?id_pengguna=<?=$data['id_pengguna']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['nama_pegawai'];?>')">Delete</a><a href="editpengguna.php?id=<?php echo $data['id_pengguna'];?>" class="ico edit">Edit</a><a href="detail_pengguna.php" class="ico">Detail</a></td>
								</tr><?php
								$n++;
							}
							?>
							
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