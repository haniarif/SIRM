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
	else if($_GET['aksi'] == 'cari_no_rm_rj'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM pendf_rj where no_rm LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['id_pasien'];
			$row_array['id'] = $row['id_pendftrn'];
			
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_pasien_rj'){
		$return_arr = array();
		$no_rm = $_GET['no_rm'];
		
		$fetch = mysql_query("SELECT * FROM pendf_rj z
	left join pasien e on z.id_pasien = e.id_pasien
	left outer join kelurahan a on e.id_kelurahan = a.id_kelurahan 
	left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
	left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
	left outer join provinsi d on c.id_provinsi = d.id_provinsi
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
			$row_array['agama_pasien'] = $row['agama_pasien'];
			$row_array['nama_pegawai'] = $row['nama_pegawai'];
			$row_array['nama_klinik'] = $row['nama_klinik'];
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
	else if($_GET['aksi'] =='cari_icd10'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM icd10 where nama_icd10 LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_icd10'];
			$row_array['id'] = $row['kode_icd10'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_icd10'){
		$return_arr = array();
		$kode_icd10 = $_GET['kode_icd10'];
		
		$fetch = mysql_query("SELECT * FROM icd10 where kode_icd10 LIKE '".$kode_icd10."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['kode_icd10'];
			$row_array['id_icd10'] = $row['id_icd10'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
}	
else if($_GET['aksi'] =='cari_icd9'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM icd9 where nama_icd9 LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_icd9'];
			$row_array['id'] = $row['kode_icd9'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_icd9'){
		$return_arr = array();
		$kode_icd19 = $_GET['kode_icd9'];
		
		$fetch = mysql_query("SELECT * FROM icd9 where kode_icd9 LIKE '".$kode_icd9."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['id'] = $row['kode_icd9'];
			$row_array['id_icd9'] = $row['id_icd9'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
}	
	else if($_GET['aksi'] =='cari_layanan'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM layanan where nama_layanan LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_layanan'];
			$row_array['id'] = $row['id_layanan'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] =='cari_kamar'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM kamar where nama_kamar LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_kamar'];
			$row_array['id'] = $row['kelas'];

			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_kamar'){
		$return_arr = array();
		$kelas = $_GET['kelas'];
		
		$fetch = mysql_query("SELECT * FROM kamar where kelas LIKE '".$kelas."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['kelas'];
			$row_array['id_kamar'] = $row['id_kamar'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'cari_mutasi'){
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM mutasi where no_rm LIKE '%$_GET[q]%' limit 10 "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['id_pasien'];
			$row_array['id'] = $row['id_mutasi'];
			
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
	else if($_GET['aksi'] == 'get_mutasi'){
		$return_arr = array();
		$no_rm = $_GET['no_rm'];
		
		$fetch = mysql_query("SELECT * FROM mutasi z
	left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
	left outer join pasien b on a.id_pasien = b.id_pasien
	left join pengguna c on z.id_pengguna = c.id_pengguna
	left outer join pegawai d on c.id_pegawai = d.id_pegawai
	left join dokter e on z.id_dokter = e.id_dokter
	left outer join pegawai f on e.id_pegawai = f.id_pegawai
	left join kamar g on z.id_kamar = g.id_kamar where no_rm LIKE '".$no_rm."'  "); 
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			$row_array['name'] = $row['nama_pasien'];
			$row_array['id'] = $row['no_rm'];
			$row_array['id_mutasi'] = $row['id_mutasi'];
			$row_array['alamat_pasien'] = $row['alamat_pasien'];
			$row_array['id_kelurahan'] = isset($row['id_kelurahan'])?$row['id_kelurahan']:null;
			$row_array['nama_kelurahan'] = isset($row['nama_kelurahan'])? $row['nama_kelurahan'].' '.$row['nama_kecamatan'].' '.$row['nama_kabupaten'].' '.$row['nama_provinsi']:null;
			$row_array['jk_pasien'] = $row['jk_pasien'];
			$row_array['tgl_lhr'] = $row['tgl_lhr'];
			$row_array['gol_darah'] = $row['gol_darah'];
			$row_array['agama_pasien'] = $row['agama_pasien'];
			$row_array['nama_klinik'] = $row['nama_klinik'];
			$row_array['nama_pegawai'] = $row['nama_pegawai'];
			$row_array['nama_kamar'] = $row['nama_kamar'];
			$row_array['nama_kelas'] = $row['nama_kelas'];
			$row_array['tgl_masuk'] = $row['tgl_masuk'];
			$row_array['nama_pengguna'] = $row['nama_pengguna'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
}
}
?>