<?php
	include "../../koneksi.php";
	$id=$_GET['id_icd10'];
	$query=mysql_query("delete from icd10 where id_icd10 = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=icd10.php'>";
	}
?>