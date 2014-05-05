<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function konfirmasi(nama){
			return confirm('Apakah anda yakin menghapus data '+nama+'?');
		}
	</script>
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />

</head>
<body>

<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="master/index.php">SIRM</a></h1>
			<div id="top-navigation">
				<a href="#">Ubah Password</a>
				<span>|</span>
				<a href="#">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="master.php" class="active"><span>MASTER DATA</span></a></li>
				<li><a href="../../transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../../administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../../informasi.php"><span>INFORMASI</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">	
		
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left"><a href="pasien.php">MASTER DATA PASIEN</a></h2>
						<div class="right">
							<label>search PASIEN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	
					
					<!-- Table -->
					<div class="table">
					<form method="post" action="tambahpasien.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>NO. RM </td>
									
									<?php
										include "../../koneksi.php";
										include "../fungsi/fungsi.php";
										$sql = "SELECT MAX(ID_PASIEN)+1 AS ID FROM PASIEN";
										$query = mysql_query($sql);
										$data = mysql_fetch_array($query);
										$nil = 1;
										if($data['ID'] !== NULL){
											$nil = $data['ID'];
										}
										$value = auto_rm($nil);
									?>
									<td colspan="3">: <input type="text" name="no_rm" size="50" value="<?php echo $value;?>"></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td colspan="3">: <input type="text" name="nama_pasien" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>No. Identitas</td>
									<td colspan="3">: <input type="text" name="no_id_pasien" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>No. KK</td>
									<td colspan="3">: <input type="text" name="no_kk" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td colspan="3">: <input type="text" name="alamat_pasien" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Kelurahan</td>
									<td colspan="3">
									<input type="text" name="id_kelurahan" id="input_data" size="50" placeholder="require">
									
									<script type='text/javascript'>
									$(document).ready(function() {
										$("#input_data").tokenInput("../../config/file_json.php?aksi=cari_kelurahan", {
											preventDuplicates: true,
											theme: "facebook"				
										});
									});
									</script>
									</td>
								</tr>
								<tr>
										<td>Jenis Kelamin</td>
										<td><input type="radio" name="jk_pasien" value=laki-laki> Laki-laki
										<input type="radio" name="jk_pasien" value=perempuan> Perempuan</td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td colspan="3">: <input type="text" name="tgl_lhr" size="50" placeholder="tahun-bulan-hari"></td>
								</tr>
								<tr>
									<td>Gol. Darah</td>
									<td>:<select width=50px name="gol_darah"><option value=goldarah>Pilih Golongan Darah</option>
														   <option value=o>O</option>
														   <option value=ab>AB</option>
														   <option value=a>A</option>
														   <option value=b>B</option>
									</select></td>
								</tr>
								<tr>
									<td>No. Telp</td>
									<td colspan="3">: <input type="text" name="no_telp" size="50" placeholder="require"></td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:<select width=50px name="agama_pasien"><option value=agama>Pilih Agama </option>
														   <option value=islam>Islam</option>
														   <option value=kristen>Kristen</option>
														   <option value=katolik>Katolik</option>
														   <option value=hindu>Hindu</option>
														   <option value=budha>Budha</option>
									</select></td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td>:<select width=50px name="penddkn"><option value=agama>Pilih Pendidikan </option>
														   <option value=sd>SD</option>
														   <option value=smp>SMP</option>
														   <option value=sma>SMA</option>
														   <option value=s1>S1</option>
									</select></td>
								</tr>
								<tr>
									<td>Pekerjaan</td>
									<td>:<select width=50px name="pekerjaan"><option value=pekerjaan>Pilih Pekerjaan </option>
														   <option value=wiraswasta>Wiraswasta</option>
														   <option value=pns>PNS</option>
														   <option value=tidakbekerja>Tidak Bekerja</option>
									</select></td>
								</tr>
								<tr>
									<td>Perkawinan</td>
									<td>:<select width=50px name="perkawinan"><option value=perkawinan>Pilih Perkawinan </option>
														   <option value=islam>Menikah</option>
														   <option value=kristen>Belum Menikah</option>
									</select></td>
								</tr>
								<tr>
									<td>Posisi di Keluarga</td>
									<td>:<select width=50px name="posisi"><option value=posisi>Pilih Posisi di Keluarga</option>
														   <option value=ayah>Ayah</option>
														   <option value=ibu>Ibu</option>
														   <option value=anak>Anak</option>
														   <option value=paman>Paman</option>
														   <option value=bibi>Bibi</option>
									</select></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Simpan"> 
									<input type="reset" name="reset" value="Set ulang"></td>
									<td colspan="2"></td>
								</tr>
							</table>
						</div>
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NO. RM</th>
								<th>NO. IDENTITAS</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>JENIS KELAMIN</th>
								<th>TGL. LAHIR</th>
								<th>GOL. DARAH</th>
								<th>NO. TELP</th>
								<th>AGAMA</th>
								<th>PEKERJAAN</th>
								<th>PERKAWINAN</th>
								<th>AKSI</th>
							</tr>
							<?php
							include "../../koneksi.php";
							$no=0;
							$query = mysql_query("SELECT * FROM pasien z
												left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
												left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
												left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
												left outer join provinsi d on c.id_provinsi = d.id_provinsi");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['no_rm'];?></td>
								<td><?php echo $data['no_id_pasien'];?></td>
								<td><?php echo $data['nama_pasien'];?></td>
								<td><?php echo $data['alamat_pasien']. ' Kec.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
								<td><?php echo $data['jk_pasien'];?></td>
								<td><?php echo $data['tgl_lhr'];?></td>
								<td><?php echo $data['gol_darah'];?></td>
								<td><?php echo $data['no_telp'];?></td>
								<td><?php echo $data['agama_pasien'];?></td>
								<td><?php echo $data['pekerjaan'];?></td>
								<td><?php echo $data['perkawinan'];?></td>
								<td><a href="hapuspasien.php?id_pasien=<?=$data['id_pasien']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['no_rm'].' - '.$data['nama_pasien'];?>')">Delete</a><a href="editpasien.php?id_pasien=<?=$data['id_pasien']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
						</table>				
					</div>
					<!-- Table -->
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp; </div>			
		</div>
		<!-- Main -->
	</div>

<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>

<?php

// simpan pasien
if (isset($_POST['submit'])){
	$sql = "insert into pasien 
		(no_rm, no_id_pasien, nama_pasien, no_kk, alamat_pasien, id_kelurahan, jk_pasien, tgl_lhr, gol_darah, no_telp, agama_pasien, penddkn, pekerjaan, perkawinan, posisi) 
	
	values ('$_POST[no_rm]','$_POST[no_id_pasien]','$_POST[nama_pasien]','$_POST[no_kk]','$_POST[alamat_pasien]','$_POST[id_kelurahan]','$_POST[jk_pasien]','$_POST[tgl_lhr]',
	'$_POST[gol_darah]','$_POST[no_telp]','$_POST[agama_pasien]','$_POST[penddkn]','$_POST[pekerjaan]','$_POST[perkawinan]','$_POST[posisi]')";
	
	$simpan = mysql_query($sql);
	if($simpan){
		echo "<meta http-equiv='refresh' content='0; url=pasien.php'>";
	}
	else{
		echo $sql;
	}
}
?>