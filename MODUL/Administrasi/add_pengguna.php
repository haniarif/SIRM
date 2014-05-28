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
					<?php
					if(!empty($_POST['id_pengguna'])){
						if((empty($_POST['id_pegawai']))||(empty($_POST['id_role']))){
							echo "<p>Gagal menyimpan data pengguna. Masukkan semua data dengan benar</p>";
						}else{
							$id_pengguna = $_POST['id_pengguna'];
							$arr_pegawai = explode(",", $_POST['id_pegawai']);
							$pegawai = $arr_pegawai[0];
							$role = explode(",", $_POST['id_role']);
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$status = $_POST['status'];
							$insert_pengguna = mysql_query("INSERT INTO pengguna values('$id_pengguna', '$pegawai', '$username', '$password', '$status')");
							if($insert_pengguna){
								if(!empty($role)){
									foreach($role as $val){
										$insert_role	= mysql_query("INSERT INTO pengguna_role values('$id_pengguna', '$val')");
										echo "<meta http-equiv='refresh' content='0; url=pengguna.php'>";
										if($insert_role == FALSE){
											$error = TRUE;
										}
									}
									if(!empty($error)){
										echo "Gagal menyimpan akses pengguna";
									}else{
										
										
										echo "Berhasil menambahkan pengguna";
									}
								}
							}else{
								echo "Gagal menyimpan pengguna. Pastikan semua data terisi dengan benar.";
							}
						}
					}
					?>
					<div class="box-head">
						<h2 class="left">TAMBAH DATA PENGGUNA</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<form action="" method="POST">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>NAMA</td>
									<td colspan="3"> <input type="text" name="id_pegawai" id="input_data" size="50" placeholder="require">
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
									<td>AKSES</td>
									<td colspan="3"> <input type="text" name="id_role" id="id_role" size="50" placeholder="require">
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#id_role").tokenInput("../../config/file_json.php?aksi=cari_role", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
									</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td><input type="text" name="username" class="isi"/></td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td><input type="text" name="password" class="isi"/></td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td><input type="radio" name="status" value="1"/> AKTIF &nbsp; <input type="radio" name="status" value="0"/> TIDAK AKTIF</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="hidden" name="id_pengguna" value="<?php echo uniqid(16);?>" />
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