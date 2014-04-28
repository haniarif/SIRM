
<?php
	include "../../koneksi.php";
	$id=$_GET['id_provinsi'];
	$query=mysql_query("delete from provinsi where id_provinsi = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=provinsi.php'>";
	}
?>