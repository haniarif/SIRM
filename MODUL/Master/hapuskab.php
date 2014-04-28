
<?php
	include "../../koneksi.php";
	$id=$_GET['id_kabupaten'];
	$query=mysql_query("delete from kabupaten where id_kabupaten = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=kabupaten.php'>";
	}
?>