
<?php
	include "../../koneksi.php";
	$id=$_GET['id_dokter'];
	$query=mysql_query("delete from dokter where id_dokter = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=dokter.php'>";
	}
?>