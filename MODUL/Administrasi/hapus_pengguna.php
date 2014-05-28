
<?php
	include "../../koneksi.php";
	$id=$_GET['id_pengguna'];
	$query=mysql_query("delete from pengguna where id_pengguna = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=pengguna.php'>";
	}
?>