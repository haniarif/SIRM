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
	else if($_GET['aksi'] == 'cari_layanan'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM layanan where nama_layanan LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch)) {
			$row_array['name'] = $row['nama_layanan'];
			$row_array['id'] = $row['id_layanan'];

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
			$row_array['name'] = $row['nama_pasien'];
			$row_array['id'] = $row['id_pasien'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'cari_no_rm'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM pasien where no_rm LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['no_rm'];
			$row_array['id'] = $row['nama_pasien'];
			
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] =='cari_dokter'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM dokter a left join pegawai b on a.id_pegawai = b.id_pegawai where nama_pegawai LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_pegawai'];
			$row_array['id'] = $row['id_dokter'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_pasien'){
		$return_arr = array();
		$no_rm = $_GET['no_rm'];
		
		$fetch = mysql_query("SELECT * FROM pasien z
												left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
												left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
												left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
												left outer join provinsi d on c.id_provinsi = d.id_provinsi where no_rm LIKE '".$no_rm."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_pasien'];
			$row_array['id'] = $row['no_rm'];
			$row_array['id_pasien'] = $row['id_pasien'];
			$row_array['alamat_pasien'] = $row['alamat_pasien'];
			$row_array['id_kelurahan'] = isset($row['id_kelurahan'])?$row['id_kelurahan']:null;
			$row_array['nama_kelurahan'] = isset($row['nama_kelurahan'])? $row['nama_kelurahan'].' '.$row['nama_kecamatan'].' '.$row['nama_kabupaten'].' '.$row['nama_provinsi']:null;
			$row_array['jk_pasien'] = $row['jk_pasien'];
			$row_array['tgl_lhr'] = $row['tgl_lhr'];
			$row_array['gol_darah'] = $row['gol_darah'];
			$row_array['perkawinan'] = $row['perkawinan'];
			$row_array['penddkn'] = $row['penddkn'];
			$row_array['pekerjaan'] = $row['pekerjaan'];
			$row_array['agama_pasien'] = $row['agama_pasien'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_pasien_rj'){
		$return_arr = array();
		$no_rm = $_GET['no_rm'];
		
		$fetch = mysql_query("SELECT * FROM pendf_rj z
							left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
							left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
							left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
							left outer join provinsi d on c.id_provinsi = d.id_provinsi
							left join pasien e on z.id_pasien = e.id_pasien
							left join layanan f on z.id_layanan = f.id_layanan
							left join klinik g on z.id_klinik = g.id_klinik
							left join dokter h on z.id_dokter = h.id_dokter
							left outer join pegawai i on h.id_pegawai = i.id_pegawai where no_rm LIKE '".$no_rm."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_pasien'];
			$row_array['id'] = $row['no_rm'];
			$row_array['id_pendftrn'] = $row['id_pendftrn'];
			$row_array['alamat_pasien'] = $row['alamat_pasien'];
			$row_array['id_kelurahan'] = isset($row['id_kelurahan'])?$row['id_kelurahan']:null;
			$row_array['nama_kelurahan'] = isset($row['nama_kelurahan'])? $row['nama_kelurahan'].' '.$row['nama_kecamatan'].' '.$row['nama_kabupaten'].' '.$row['nama_provinsi']:null;
			$row_array['jk_pasien'] = $row['jk_pasien'];
			$row_array['tgl_lhr'] = $row['tgl_lhr'];
			$row_array['gol_darah'] = $row['gol_darah'];
			$row_array['perkawinan'] = $row['perkawinan'];
			$row_array['penddkn'] = $row['penddkn'];
			$row_array['pekerjaan'] = $row['pekerjaan'];
			$row_array['agama_pasien'] = $row['agama_pasien'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}else if($_GET['aksi'] == 'cari_role'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM role where nama_role LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_role'];
			$row_array['id'] = $row['id_role'];
			
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	
}
?>