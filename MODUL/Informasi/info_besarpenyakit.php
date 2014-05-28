<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
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
						<h2 class="left">INFORMASI 10 BESAR PENYAKIT</h2>
					</div>
					<!-- End Box Head -->	
					<?php
					//untuk koneksi database
					include "../../koneksi.php";
						
					//untuk menantukan tanggal awal dan tanggal akhir data di database
					$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from rmrj"));
					$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from rmrj"));
					?>
					<!-- Table -->
					<div class="table">
					<form action="info_besarpenyakit.php" method="POST" name="postform">
						<table>
							<tr>
								<td>PILIH KATEGORI</td>
							</tr>
							<tr>
								<td>Kategori </td>
								<td>
										<?php
										$sql = "select * from kategori_jk order by nama_kategori_jk";
										$query = mysql_query($sql); ?>
										<select name='id_kategori'>
											<option value=''>-kategori-</option>
										<?php 
										while ($r = mysql_fetch_array($query)){ ?>
											<option value="<?php echo $r['id_kat_jk'];?>"><?php echo $r['nama_kategori_jk'];?></option>
										<?php }	?>
										</select>
								</td>
							</tr>
							<tr>
								<td> PERIODE </td>
								<td><input type="text" name="tanggal_awal" size="15" value="<?php echo $min_tanggal['min_tanggal'];?>"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
								</td>
								<td> S/D</td>
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
						$rmrj_POST['rmrj'];
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
							//jika tidak menginput apa2
							$query=mysql_query("select * from rmrj");
							
						}
						?>						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO</th>
								<th>KODE ICD10</th>
								<th>NAMA PENYAKIT</th>
								<th>TOTAL PENDERITA</th>
							</tr>
							<?php
							$no=0;
							$query = mysql_query("SELECT * FROM rmrj z
								left join icd10 a on z.id_icd10 = a.id_icd10
								");
								while($data= mysql_fetch_array($query))
								{
								$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['kode_icd10'];?></td>
								<td><?php echo $data['nama_icd10'];?></td>
								<td><?php echo $data['total'];?></td>
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
