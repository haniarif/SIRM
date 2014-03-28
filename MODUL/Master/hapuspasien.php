
<?php
	include "../../koneksi.php";
	$id=$_GET['id_pasien'];
	$query=mysql_query("delete from pasien where id_pasien = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=pasien.php'>";
	}
?>