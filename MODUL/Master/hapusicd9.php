
<?php
	include "../../koneksi.php";
	$id=$_GET['id_icd9'];
	$query=mysql_query("delete from icd9 where id_icd9 = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=icd9.php'>";
	}
?>