
<?php
	include "../../koneksi.php";
	$id=$_GET['id_klinik'];
	$query=mysql_query("delete from klinik where id_klinik = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=klinik.php'>";
	}
?>