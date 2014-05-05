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
			<h1><a href="../index.php">SIRM</a></h1>
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
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
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
						<h2 class="left" ><a href="pasien.php">MASTER DATA PASIEN</a></h2>
						<div class="right">
							<label>search PASIEN</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
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
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
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