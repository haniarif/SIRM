
<?php
	include "../../koneksi.php";
	$id=$_GET['id_pegawai'];
	$query=mysql_query("delete from pegawai where id_pegawai = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=pegawai.php'>";
	}
?>