<?php
include "../koneksi.php";
if(isset($_GET['aksi'])){
	if($_GET['aksi'] == 'cari_klinik'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM klinik where nama_klinik LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_klinik'];
			$row_array['id'] = $row['id_klinik'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}

	else if($_GET['aksi'] =='cari_spesialisasi'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM spesialisasi where nama_spesialisasi LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_spesialisasi'];
			$row_array['id'] = $row['id_spesialisasi'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	
	else if($_GET['aksi'] == 'cari_provinsi'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM provinsi where nama_provinsi LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_provinsi'];
			$row_array['id'] = $row['id_provinsi'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'cari_kabupaten'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM kabupaten where nama_kabupaten LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_kabupaten'];
			$row_array['id'] = $row['id_kabupaten'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'cari_kecamatan'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM kecamatan where nama_kecamatan LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_kecamatan'];
			$row_array['id'] = $row['id_kecamatan'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'cari_kelurahan'){
		$return_arr = array();
		$sql = "SELECT * FROM kelurahan a 
				left join kecamatan b on a.id_kecamatan = b.id_kecamatan
				left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
				left outer join provinsi d on c.id_provinsi = d.id_provinsi
				where a.nama_kelurahan LIKE '%$_GET[q]%' limit 10";
		$fetch = mysql_query($sql);
		while ($row = mysql_fetch_array($fetch)) {
			$row_array['name'] = $row['nama_kelurahan'].' '.$row['nama_kecamatan'].' '.$row['nama_kabupaten'].' '.$row['nama_provinsi'];
			$row_array['id'] = $row['id_kelurahan'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] =='cari_pegawai'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM pegawai where nama_pegawai LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_pegawai'];
			$row_array['id'] = $row['id_pegawai'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] =='cari_pasien'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM pasien where nama_pasien LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['no_rm'] = $row['no_rm'];
			$row_array['name'] = $row['nama_pasien'];
			$row_array['id'] = $row['id_pasien'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] =='cari_no_rm'){
		$return_arr = array();
		$fetch = mysql_query("SELECT no_rm, nama_pasien FROM pasien where name LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['no_rm'].' '.$row['nama_pasien'];
			$row_array['id'] = $row['id_pasien'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	
}
?>