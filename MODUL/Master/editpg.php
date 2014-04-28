<?php
include "../../koneksi.php";
if(isset($_GET['id_pegawai'])){
$id = $_GET['id_pegawai'];
$sql = mysql_query ("select * from pegawai where id_pegawai = '$id'") or die(mysql_error());
$data = mysql_fetch_array($sql);
?>

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
						<h2 class="left"><a href="pegawai.php">MASTER DATA PEGAWAI</a></h2>
						<div class="right">
							<label>search PEGAWAI</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
					<form method="post" action="editpg.php" class="form">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td> &nbsp; </td>
									<td><input type='hidden' name='id_pasien' value='<?php echo $data['id_pegawai'];?>'/></td>
								</tr>
								<tr>
									<td>NIP </td>
									<td colspan="3">: <input type="text" name="nip" size="50" value='<?php echo $data['nip'];?>'></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td colspan="3">: <input type="text" name="nama_pegawai" size="50" value='<?php echo $data['nama_pegawai'];?>'></td>
								</tr>
								<tr>
									<td>No. Identitas</td>
									<td colspan="3">: <input type="text" name="no_id_pegawai" size="50" value='<?php echo $data['no_id_pegawai'];?>'></td>
								</tr>
								<tr>
									<td>No. KK</td>
									<td colspan="3">: <input type="text" name="kk_pegawai" size="50" value='<?php echo $data['kk_pegawai'];?>'></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td colspan="3">: <input type="text" name="alamat_pgwai" size="50" value='<?php echo $data['alamat_pgwai'];?>'></td>
								<tr>
									<td>Kelurahan</td>
									<td colspan="3">
									<input type="text" name="id_kelurahan" id="input_data" size="50" value='<?php echo $data['id_kelurahan'];?>'>
									
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
									<td>Level</td>
									<td colspan="3">: <input type="text" name="level" size="50" value='<?php echo $data['level'];?>'></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td><input type="radio" name="jk_pegawai" value=laki-laki value='<?php echo $data['jk_pegawai'];?>'> Laki-laki
										<input type="radio" name="jk_pegawai" value=perempuan value='<?php echo $data['jk_pegawai'];?>'> Perempuan</td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td colspan="3">: <input type="text" name="tgl_lhr_pgwai" size="50" value='<?php echo $data['tgl_lhr_pgwai'];?>'></td>
								</tr>
								<tr>
									<td>No. Tep</td>
									<td colspan="3">: <input type="text" name="no_telp_pegawai" size="50" value='<?php echo $data['no_telp_pegawai'];?>'>></td>
								</tr>
								<tr>
									<td>Posisi</td>
									<td>:<select width=50px name="posisi_pgawai" value='<?php echo $data['posisi_pgawai'];?>'><option value=posisi>Pilih Posisi Pegawai</option>
														   <option value=o>O</option>
														   <option value=ab>AB</option>
														   <option value=a>A</option>
														   <option value=b>B</option>
									</select></td>
								</tr>
								<tr>
									<td>Golongan</td>
									<td>:<select width=50px name="golongan" value='<?php echo $data['golongan'];?>'><option value=golongan>Pilih Golongan </option>
														   <option value=Ia>Ia</option>
														   <option value=Ib>Ib</option>
														   <option value=IIa>IIa</option>
														   <option value=IIb>IIb</option>
														   <option value=IIIa>IIIa</option>
									</select></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>:<select width=50px name="jabatan" value='<?php echo $data['jabatan'];?>'><option value=jabatan>Pilih Jabatan </option>
														   <option value=sd>Direkutur</option>
														   <option value=smp>Manager</option>
														   <option value=sma>Staff</option>
														   <option value=s1>Dokter</option>
									</select></td>
								</tr>
								<tr>
									<td>Pangkat</td>
									<td>:<select width=50px name="pangkat" value='<?php echo $data['pangkat'];?>'><option value=pangkat>Pilih Pangkat </option>
														   <option value=wiraswasta>Pangkat A</option>
														   <option value=pns>Pangkat B</option>
														   <option value=tidakbekerja>Pangkat C</option>
									</select></td>
								</tr>
								<tr>
									<td>No. SK</td>
									<td colspan="3">: <input type="text" name="no_sk" size="50" value='<?php echo $data['no_sk'];?>'></td>
								</tr>
								<tr>
									<td>Tanggal SK</td>
									<td colspan="3">: <input type="text" name="tgl_sk" size="50" value='<?php echo $data['tgl_sk'];?>' placeholder="tahun-bulan-hari"></td>
								</tr>
								<tr>
									<td>Tanggal Masuk Unit</td>
									<td colspan="3">: <input type="text" name="tgl_masuk_unit" size="50" value='<?php echo $data['tgl_masuk_unit'];?>'placeholder="tahun-bulan-hari"></td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td>:<select width=50px name="pnddkn" value='<?php echo $data['pnddkn'];?>'><option value=penddkn>Pilih Pendidikan </option>
														   <option value=sd>SD</option>
														   <option value=smp>SMP</option>
														   <option value=sma>SMA</option>
														   <option value=s1>S1</option>
									</select></td>
								</tr>
								<tr>
									<td>Pekerjaan</td>
									<td>:<select width=50px name="pekerjaan" value='<?php echo $data['pekerjaan'];?>'><option value=pekerjaan>Pilih Pekerjaan </option>
														   <option value=wiraswasta>Wiraswasta</option>
														   <option value=pns>PNS</option>
														   <option value=tidakbekerja>Tidak Bekerja</option>
									</select></td>
								</tr>
								<tr>
									<td>Perkawinan</td>
									<td>:<select width=50px name="kawin" value='<?php echo $data['kawin'];?>'><option value=kawinan>Pilih Perkawinan </option>
														   <option value=islam>Menikah</option>
														   <option value=kristen>Belum Menikah</option>
									</select></td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:<select width=50px name="agama" value='<?php echo $data['agama'];?>'><option value=agama>Pilih Agama </option>
														   <option value=islam>Islam</option>
														   <option value=kristen>Kristen</option>
														   <option value=katolik>Katolik</option>
														   <option value=hindu>Hindu</option>
														   <option value=budha>Budha</option>
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
					<a href="tambahpasien.php" class="add-button"><span>TAMBAH PASIEN</span></a><br>
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
							$query = mysql_query("SELECT * FROM pasien");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['no_rm'];?></td>
								<td><?php echo $data['no_id_pasien'];?></td>
								<td><?php echo $data['nama_pasien'];?></td>
								<td><?php echo $data['alamat_pasien'];?></td>
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
}else{
	if(isset($_POST['ubah'])){
	include "../../koneksi.php";
	$id=$_POST['id_pasien'];
	$no_rm=$_POST['no_rm'];
	$no_id_pasien=$_POST['no_id_pasien'];
	$nama_pasien=$_POST['nama_pasien'];
	$no_kk=$_POST['no_kk'];
	$alamat_pasien=$_POST['alamat_pasien'];
	$jk_pasien=$_POST['jk_pasien'];
	$tgl_lhr=$_POST['tgl_lhr'];
	$gol_darah=$_POST['gol_darah'];
	$no_telp=$_POST['no_telp'];
	$agama_pasien=$_POST['agama_pasien'];
	$penddkn=$_POST['penddkn'];
	$pekerjaan=$_POST['pekerjaan'];
	$perkawinan=$_POST['perkawinan'];
	$posisi=$_POST['posisi'];
	$query=mysql_query("update pasien set no_rm= '$no_rm',
					no_id_pasien= '$no_id_pasien',
					nama_pasien= '$nama_pasien',
					no_kk= '$no_kk',
					alamat_pasien= '$alamat_pasien',
					jk_pasien= '$jk_pasien',
					tgl_lhr= '$tgl_lhr',
					gol_darah= '$gol_darah',
					no_telp= '$no_telp',
					agama_pasien= '$agama_pasien',
					penddkn= '$penddkn',
					pekerjaan= '$pekerjaan',;
					perkawinan= '$perkawinan',
					posisi= '$posisi'
					where id_pasien = '$id' ") or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0; url=pasien.php'>";
	}

}	
?>