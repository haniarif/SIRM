<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
</head>
<body onLoad="document.postform.elements['rm_ri'].focus();">
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
						<h2 class="left">INFORMASI REKAM MEDIS RAWAT JALAN</h2>
					</div>
					<!-- End Box Head -->	
					<?php
					//untuk koneksi database
					include "../../koneksi.php";
						
					//untuk menantukan tanggal awal dan tanggal akhir data di database
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from rm_ri"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from rm_ri"));
					?>
					<!-- Table -->
					<div class="table">
					<form action="info_rmri.php" method="POST" name="postform">
						<table>
							<tr>
								<td> PERIODE </td>
								<td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php echo $min_tanggal['min_tanggal'];?>"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
								<td> &nbsp; S/D</td>
								<td colspan="2"><input type="text" name="tanggal_akhir" size="15" value="<?php echo $max_tanggal['max_tanggal'];?>"/>
									<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
									</td>
							</tr>
							<tr>
								<td> <input type="submit" name="cari" value="CARI"></td>
								<td><input type="reset" name="batal" value="BATAL" ></td>
							</tr>
							<BR>
						</table>
					</FORM>
					<BR><BR><BR>
					<?php
					//di proses jika sudah klik tombol cari
					if(isset($_POST['cari'])){
						
						//menangkap nilai form
						$rm_ri=$_POST['rm_ri'];
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
							//jika tidak menginput apa2
							$query=mysql_query("select * from rm_ri");
							
						}
						?>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NO. RM</th>
								<th>NAMA</th>
								<th>WAKTU</th>
								<th>DOKTER</th>
								<th>KAMAR</th>
								<th>JENIS KASUS</th>
								<th>NAMA PETUGAS</th>
								<th>DIAGNOSA</th>
								<th>AKSI</th>
							</tr>
							<?php
							$no=0;
							$query = mysql_query("SELECT * FROM  rm_ri z
									left join mutasi a on z.id_mutasi = a.id_mutasi
									left outer join pendf_rj pn on a.id_pendftrn = pn.id_pendftrn 
									left outer join pasien b on pn.id_pasien = b.id_pasien
									left outer join kelurahan c on b.id_kelurahan = c.id_kelurahan 
									left outer join kecamatan d on c.id_kecamatan = d.id_kecamatan
									left outer join kabupaten e on d.id_kabupaten = e.id_kabupaten
									left outer join provinsi f on e.id_provinsi = f.id_provinsi
									left outer join kamar h on a.id_kamar = h.id_kamar
									left outer join dokter i on a.id_dokter = i.id_dokter
									left outer join pegawai j on i.id_pegawai = j.id_pegawai
									left join icd9 k on z.id_icd9 = k.id_icd9
									left join icd10 l on z.id_icd10 = l.id_icd10
									left join jenis_kasus n on z.id_jenis_kasus = n.id_jenis_kasus");
								echo "ada yang error:".mysql_error();
							while($data= mysql_fetch_array($query)){
							
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td> <?php echo $data['no_rm'];?></td>
								<td><?php echo $data['nama_pasien'];?> </td>
								<td><?php echo $data['waktu'];?> </td>
								<td><?php echo $data['nama_pegawai'];?> </td>
								<td><?php echo $data['nama_kamar'];?></td>
								<td><?php echo $data['nama_jk'];?></td>
								<td><?php echo $data['nama_pegawai'];?> </td>
								<td><?php echo $data['nama_icd10'];?> </td>
								<td><a href=#></a></td>
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
