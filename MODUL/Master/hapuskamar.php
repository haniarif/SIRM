
<?php
	include "../../koneksi.php";
	$id=$_GET['id_kamar'];
	$query=mysql_query("delete from kamar where id_kamar = '$id'");
	if($query){
	echo "<meta http-equiv='refresh' content='0; url=kamar.php'>";
	}
?>