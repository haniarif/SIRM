
<?php
	include "../../koneksi.php";
	$id=$_GET['id_rekam_medik'];
	$query=mysql_query("delete from data_rm where id_rekam_medik = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=datarm.php'>";
	}
?>