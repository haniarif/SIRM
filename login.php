<html>
	<head>
		<title> SIRM </title>
		<link rel='stylesheet' type='text/css' href='css/login.css'>
	</head>
	<body>
		<div id='warper'>
		<br><br><br><br><br><br><br><br>
		<p align=center><b>SISTEM INFORMASI REKAM MEDIS <BR>UMMI KHASANAH BANTUL</b></p>
		<br/>
			<div id='box-login'>
				<form action=?login&aksi=submit method=POST>
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="user"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="Login"></td>
							<td><input type="reset" name="reset" value="Batal"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<?php
			session_start();
			include "modul/administrasi/koneksi.php";
			$namauser = $_POST['user'];
			$password = $_POST['password'];

			$login=mysql_query("SELECT * FROM pengguna WHERE user='$namauser'");
			$hasil=mysql_num_rows($login);
			if ($hasil>=1){
			echo "<p>Selamat datang ".$namauser."</p>";
			$_SESSION['user']=$namauser;
			header('location:modul/index.php');
			}else{
			echo "gagal";
			}
			?>
	</body>
</html>


