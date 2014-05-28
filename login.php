<?php
session_start();
if(!empty($_SESSION['id_pengguna'])){ ?>
	<meta http-equiv="refresh" content="0;url=MODUL/index.php" /><?php
}
include "koneksi.php";
?>
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
				<?php
				if(!empty($_POST['log'])){
					$user = $_POST['user'];
					$pass = md5($_POST['password']);
					$cek = mysql_query("SELECT * FROM pengguna WHERE user='$user' AND password='$pass' ");
					$data = mysql_fetch_array($cek);
					
					if(!empty($data['id_pengguna'])){
						$_SESSION['id_pengguna'] = $user;
						?> <meta http-equiv="refresh" content="0;url=MODUL/index.php" /><?php
					}else{
						echo "Username atau password salah";
					}
				}
				?>
				<form action="" method="POST">
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
							<td><input type="hidden" name="log" value="Login"><input type="submit" name="submit" value="Login"></td>
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
			$pengguna=mysql_fetch_array($login);
			if ($hasil>=1){
			echo "<p>Selamat datang ".$namauser."</p>";
			$_SESSION['user']=$namauser;
			$_SESSION['id_user']=$pengguna['id_pengguna'];
			header('location:modul/index.php');
			}else{
			echo "gagal";
			}
			?>
	</body>
</html>


