
<?php
	include "../../koneksi.php";
	$id=$_GET['id_kecamatan'];
	$query=mysql_query("delete from kecamatan where id_kecamatan = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=kecamatan.php'>";
	}
?>