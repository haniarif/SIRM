<?php
session_start();
include "../../koneksi.php";

$id_mutasi=isset($_GET['id_mutasi'])?$_GET['id_mutasi']:null;

if($id_mutasi!=null){
	$query=mysql_query('select * from mutasi z
						left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
						left outer join pasien b on a.id_pasien = b.id_pasien where z.id_mutasi = '.$id_mutasi) or die(mysql_error());
	$data_mutasi=mysql_fetch_array($query);					
	$no_rm=$data_mutasi['no_rm'];
	$id_kamar_lama=$data_mutasi['id_kamar'];
	$nama_pasien=$data_mutasi['nama_pasien'];
	$id_pendaftaran=$data_mutasi['id_pendftrn'];
	
	mysql_query("update mutasi set status='0' where id_mutasi=".$id_mutasi) or die(mysql_error());
	mysql_query("update kamar set status='0' where id_kamar=".$id_kamar_lama) or die(mysql_error());
}

header("location: ../informasi/info_mutasi.php");
