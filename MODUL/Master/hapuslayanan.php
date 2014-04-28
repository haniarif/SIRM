
<?php
	include "../../koneksi.php";
	$id=$_GET['id_layanan'];
	$query=mysql_query("delete from layanan where id_layanan = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=layanan.php'>";
	}
?>