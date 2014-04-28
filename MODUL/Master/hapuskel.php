
<?php
	include "../../koneksi.php";
	$id=$_GET['id_kelurahan'];
	$query=mysql_query("delete from kelurahan where id_kelurahan = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=kelurahan.php'>";
	}
?>