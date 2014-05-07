<?php

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
					<?php
					if(!empty($_POST['id_pengguna'])){
						if((empty($_POST['username']))||(empty($_POST['id_role']))){
							echo "<p>Gagal memperbaharui data pengguna. Masukkan semua data dengan benar</p>";
						}else{
							$id_pengguna = $_POST['id_pengguna'];
							$role = explode(",", $_POST['id_role']);
							$username = $_POST['username'];
							$pass		= $_POST['password'];
							$password = md5($_POST['password']);
							$status = $_POST['status'];
							if(empty($pass)){
								$update_pengguna = mysql_query("UPDATE pengguna set user='$username', status='$status' WHERE id_pengguna='$id_pengguna' ");
								if($update_pengguna){
									$update_role = TRUE;
								}else{
									echo "Gagal memperbaharuan data pengguna. Pastikan semua data terisi dengan benar.";
								}
							}else{
								$update_pengguna = mysql_query("UPDATE pengguna set user='$username', password='$password', status='$status' WHERE id_pengguna='$id_pengguna' ");
								if($update_pengguna){
									$update_role = TRUE;
								}else{
									echo "Gagal memperbaharuan data pengguna. Pastikan semua data terisi dengan benar.";
								}
							}
							if(!empty($update_role)){
								$delete = mysql_query("DELETE FROM pengguna_role WHERE id_pengguna='$id_pengguna' ");
									if(!empty($role)){
										foreach($role as $val){
											$insert_role	= mysql_query("INSERT INTO pengguna_role values('$id_pengguna', '$val')");
											if($insert_role == FALSE){
												$error = TRUE;
											}
										}
									}
									if(!empty($error)){
										echo "Gagal memperbaharuan akses pengguna";
									}else{
										echo "Berhasil memperbaharuan data pengguna";
									}
							}
						}
					}
					?>
					<div class="box-head">
						<h2 class="left">EDIT DATA PENGGUNA</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->

									<script type='text/javascript'>
									$(document).ready(function() {
										$("#id_role").tokenInput("../../config/file_json.php?aksi=cari_role", {
											preventDuplicates: true,
											theme: "facebook", 
												prePopulate: [
					<?php
					$sql = mysql_query("SELECT A.*, B.* FROM pengguna_role A, role B WHERE A.id_pengguna='".$_GET['id']."' AND B.id_role=A.id_role");
					while($data = mysql_fetch_array($sql)){
						echo '{id: "'.$data['id_role'].'", name: "'.$data['nama_role'].'"},';
					}
					?>
												]											
										});
									});
									</script>
					<div class="table">
						<form action="" method="POST">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>NAMA</td>
									<?php
									$sql = mysql_query("SELECT A.*, B.* FROM pengguna A, pegawai B WHERE A.id_pengguna='".$_GET['id']."' AND B.id_pegawai=A.id_pegawai");
									$data = mysql_fetch_array($sql);
									$id_pengguna = $data['id_pengguna'];
									$nama = $data['nama_pegawai'];
									$username = $data['user'];
									$status = $data['status'];
									?>
									<td colspan="3"> <input type="text" name="nama_pegawai" class="isi" size="50" value="<?php echo $nama;?>" readonly >
									</td>
								</tr>
								<tr>
									<td>AKSES</td>
									<td colspan="3"> <input type="text" name="id_role" id="id_role" size="50" placeholder="require">
									</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td><input type="text" name="username" class="isi" value="<?php echo $username;?>"/></td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td><input type="text" name="password" class="isi"/></td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td><input type="radio" name="status" value="1" <?php if($status == 1){ echo "checked";}?>/> AKTIF &nbsp; <input type="radio" name="status" value="0" <?php if($status == 0){ echo "checked";}?> /> TIDAK AKTIF</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>" />
										<input type="submit" name="btn" value="Simpan" />
									</td>
								</tr>
						</table>
						</form>
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
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
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