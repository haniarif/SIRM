
<?php
	include "../../koneksi.php";
	$id=$_GET['id_jenis_kasus'];
	$query=mysql_query("delete from jenis_kasus where id_jenis_kasus = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=jenis_kasus.php'>";
	}
?>