<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
</head>
<body onLoad="document.postform.elements['mutasi'].focus();">
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
						<h2 class="left">INFORMASI MUTASI RAWAT INAP</h2>
					</div>
					<!-- End Box Head -->	
					<?php
					//untuk koneksi database
					include "../../koneksi.php";
						
					//untuk menantukan tanggal awal dan tanggal akhir data di database
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tgl_masuk) as min_tanggal from mutasi where tgl_masuk<>'0000-00-00 00:00:00'"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tgl_masuk) as max_tanggal from mutasi where tgl_masuk<>'0000-00-00 00:00:00'"));
					?>
					<!-- Table -->
					<div class="table">
					<form action="info_mutasi.php" method="POST" name="postform">
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
						//$mutasi=isset($_POST['mutasi'])?$_POST['mutasi']:null;
						$tanggal_awal=isset($_POST['tanggal_awal'])?$_POST['tanggal_awal']:null;
						$tanggal_akhir=isset($_POST['tanggal_akhir'])?$_POST['tanggal_akhir']:null;
												
						?>
					
						
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>TANGGAL MASUK</th>
								<th>TANGGAL KELUAR</th>
								<th>NO.RM</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>DOKTER</th>
								<th>KAMAR</th>
								<th>AKSI</th>
							</tr>
							<?php
							$no=0;
							if(empty($tanggal_awal) and empty($tanggal_akhir)){//empty($mutasi) and 
								$where="where ";
							}else{
								$where="where z.tgl_masuk between '$tanggal_awal' and '$tanggal_akhir' and";
							}
							$query = mysql_query("SELECT * FROM mutasi z
								left join pendf_rj a on z.id_pendftrn = a.id_pendftrn
								left outer join pasien b on a.id_pasien = b.id_pasien
								left outer join kelurahan kl on b.id_kelurahan = kl.id_kelurahan 
								left outer join kecamatan kc on kl.id_kecamatan = kc.id_kecamatan
								left outer join kabupaten kb on kc.id_kabupaten = kb.id_kabupaten
								left outer join provinsi pr on kb.id_provinsi = pr.id_provinsi
								left join pengguna c on z.id_pengguna = c.id_pengguna
								left outer join pegawai d on c.id_pegawai = d.id_pegawai
								left join dokter e on z.id_dokter = e.id_dokter
								left outer join pegawai f on e.id_pegawai = f.id_pegawai
								left join kamar g on z.id_kamar = g.id_kamar $where z.status=1") or die(mysql_error());
								$data= mysql_fetch_array($query);
								
								while($data= mysql_fetch_array($query))
								{
							
									$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['tgl_masuk'];?></td>
								<td><?php echo $data['tgl_keluar'];?></td>
								<td> <?php echo $data['no_rm'];?></td>
								<td><?php echo $data['nama_pasien'];?> </td>
								<td><?php echo $data['alamat_pasien']. ' Kec.' .$data['nama_kelurahan'].' Kab. '.$data['nama_kabupaten'].' Prop. '.$data['nama_provinsi'];?></td>
								<td><P ALIGN=CENTER><?php echo $data['nama_pegawai'];?></P></td>
								<td><?php echo $data['nama_kamar'].$data['kelas'];?></td>
								<td><a href="../transaksi/mutasi.php?id_mutasi=<?php echo $data['id_mutasi'];?>">PINDAH</a>&nbsp;<a href="../transaksi/selesai.php?id_mutasi=<?php echo $data['id_mutasi'];?>">SELESAI</a>&nbsp;<a href="detail_mutasi.php?id_mutasi=<?php echo $data['id_mutasi'];?>">DETAIL</a></td>
							</tr>
							<?php }
						
							?>
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
