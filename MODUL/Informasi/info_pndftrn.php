<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="tabel.css" />
</head>
<body onLoad="document.postform.elements['pendaftaran'].focus();">
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
			    <li><a href="../MASTER/master.php"><span>MASTER DATA</span></a></li>
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="informasi.php" class="active"><span>INFORMASI</span></a></li>
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
			<div id="content" style="width:115%">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">INFORMASI PENDAFTARAN RAWAT JALAN</h2>
					</div>
					<!-- End Box Head -->	
					<?php
					//untuk koneksi database
					include "../../koneksi.php";
						
					//untuk menantukan tanggal awal dan tanggal akhir data di database
<<<<<<< HEAD
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from pendf_rj"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from pendf_rj"));
=======
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from tabel_nasabah"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from tabel_nasabah"));
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
					?>
					<!-- Table -->
					<div class="table">
					<form action="info_pndftrn.php" method="POST" name="postform">
						<table>
							<tr>
								<td> PERIODE </td>
<<<<<<< HEAD
								<td colspan="2"><input type="text" name="tanggal_awal" size="15" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
								<td> &nbsp; S/D</td>
								<td colspan="2"><input type="text" name="tanggal_akhir" size="15"/>
=======
								<td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php echo $min_tanggal['min_tanggal'];?>"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
								<td> &nbsp; S/D</td>
								<td colspan="2"><input type="text" name="tanggal_akhir" size="15" value="<?php echo $max_tanggal['max_tanggal'];?>"/>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
									<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
							</tr>
							<tr>
								<td> <input type="submit" name="cari" value=CARI></td>
								<td><input type="reset" name="batal" value=BATAL ></td>
							</tr>
							<BR>
						</table>
					</FORM>
					<BR><BR><BR>
					<?php
					//di proses jika sudah klik tombol cari
					if(isset($_POST['cari'])){
						
						//menangkap nilai form
<<<<<<< HEAD
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						
=======
						$pendaftaran=$_POST['pendaftaran'];
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
							//jika tidak menginput apa2
							$query=mysql_query("select * from pendftr_rj");
							
						}
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
						?>
					
						
						
<<<<<<< HEAD
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<?php
							echo "Informasi Pendaftaran dari tanggal " .$tanggal_awal. " s/d " .$tanggal_akhir;
						?>
=======
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
							<tr>
								<th>NO.</th>
								<th>TANGGAL</th>
								<th>DOKTER</th>
								<th>NO.RM</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>JENIS KELAMIN</th>
								<th>LAYANAN</th>
								<th>KLINIK</th>
							</tr>
							<?php
							$no=0;
							$query = mysql_query("SELECT * FROM pendf_rj z
<<<<<<< HEAD
								left join pasien e on z.id_pasien = e.id_pasien
								left outer join kelurahan a on e.id_kelurahan = a.id_kelurahan 
								left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
								left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
								left outer join provinsi d on c.id_provinsi = d.id_provinsi
								
=======
								left join kelurahan a on z.id_kelurahan = a.id_kelurahan 
								left outer join kecamatan b on a.id_kecamatan = b.id_kecamatan
								left outer join kabupaten c on b.id_kabupaten = c.id_kabupaten
								left outer join provinsi d on c.id_provinsi = d.id_provinsi
								left join pasien e on z.id_pasien = e.id_pasien
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
								left join layanan f on z.id_layanan = f.id_layanan
								left join klinik g on z.id_klinik = g.id_klinik
								left join dokter h on z.id_dokter = h.id_dokter
								left outer join pegawai i on h.id_pegawai = i.id_pegawai
<<<<<<< HEAD
								where z.tanggal between '$tanggal_awal' and '$tanggal_akhir'
								");
=======
								");
								echo "ada yang error:".mysql_error();
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
							while($data= mysql_fetch_array($query)){
							
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['tanggal'];?></td>
								<td><?php echo $data['nama_pegawai'];?></td>
<<<<<<< HEAD
								<td> <?php echo $data['no_rm'];?></td>
								<td><?php echo $data['nama_pasien'];?> </td>
								<td><?php echo $data['alamat_pasien']. ' Kec.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
								<td><P ALIGN=CENTER><?php echo $data['jk_pasien'];?></P></td>
								<td><?php echo $data['nama_layanan'];?></td>
=======
								<td><?php echo $data['nama_pasien'];?> </td>
								<td> <?php echo $data['no_rm'];?></td>
								<td> <?php echo $data['alamat_pasien'];?></td>
								<td><P ALIGN=CENTER><?php echo $data['jk_pasien'];?></P></td>
								<td><?php echo $data['perkawinan'];?></td>
>>>>>>> 429e6a569239838b0f3d7fe6eb43c467f7846aec
								<td><?php echo $data['nama_klinik'];?> </td>
								
							</tr>
							<?php }  ?>
							<?php }  ?>
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
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe><!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2014 - SIRM</span>
	</div>
</div>
<!-- End Footer -->


	
</body>
</html>
