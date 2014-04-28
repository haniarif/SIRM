
<?php
	include "../../koneksi.php";
	$id=$_GET['id_spesialisasi'];
	$query=mysql_query("delete from spesialisasi where id_spesialisasi = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=spesialisasi.php'>";
	}
?>