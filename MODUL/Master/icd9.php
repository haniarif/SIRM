<?PHP 
include "../../koneksi.php";
$offset=$_GET['offset'];
  $totalquery = mysql_query("select * from icd9");
  $numrows=mysql_num_rows($totalquery);
  
  //jumlah data yg ditampilkan per page
  $limit = 10;
  if (empty($offset)){
    $offset = 0;
  }
  if ($numrows == 0) {
    echo "<br><center>Tidak ada data</center>";
  }
  else { ?>
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
				<li><a href="../transaksi/transaksi.php"><span>TRANSAKSI</span></a></li>
			    <li><a href="../administrasi/administrasi.php"><span>ADMINISTRASI</span></a></li>
			    <li><a href="../informasi/informasi.php"><span>INFORMASI</span></a></li>
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
						<h2 class="left">MASTER DATA ICD9</h2>
						<div class="right">
							<label>search ICD9</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<?php if(isset($_GET['q']) && $_GET['q']){
						$q = $_GET['q'];
						$sql = "select * from icd9 where nama_icd9 like '%$q%' or 
						kode_icd9 like '%$q%'";
						$result = mysql_query($sql);
						if(mysql_num_rows($result) > 0){					?>
					<div class="table">
					<a href="tambahicd9.php" class="add-button"><span>TAMBAH ICD9</span></a><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>NO.</th>
								<th>NAMA</th>
								<th>KODE</th>
								<th>AKSI</th>
							</tr>
							
							<?php
							while($siswa = mysql_fetch_array($result)){
							$no=0;
							$no=0+$offset;
							$query = mysql_query("SELECT * FROM icd9 limit $offset,$limit");
							while($data= mysql_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_icd9'];?></td>
								<td><?php echo $data['kode_icd9'];?></td>
								<td><a href="hapusicd9.php?id_icd9=<?=$data['id_icd9']?>" class="ico del" onclick="return konfirmasi('<?php echo $data['kode_icd9'].' - '.$data['nama_icd9'];?>')">Delete</a><a href="editicd9.php?id_icd9=<?=$data['id_icd9']?>" class="ico edit">Edit</a></td>
							</tr>
							<?php }?>
							<?php }?>
						</table>
						<?php
						}else{
							echo 'Data not found!';
						}
						}
							?>
						<div class="pagging">
						<div class="right"><?PHP
	  if ($offset!=0) {
    $prevoffset = $offset-$limit;
    echo "<a href=icd9.php?offset=$prevoffset>prev</a>";

}
else {
	echo "<a>prev</a>";//cetak halaman tanpa link
}
//hitung jumlah halaman
$halaman = intval($numrows/$limit);//Pembulatan

if ($numrows%$limit){
	$halaman++;
}
for($i=1;$i<=$halaman;$i++){
	$newoffset = $limit * ($i-1);
	if($offset!=$newoffset){
		echo "<a href=icd9.php?offset=$newoffset> $i </a>";
		//cetak halaman
	}
	else {
		echo "<a><b>#</b></a>";//cetak halaman tanpa link
        
	}
}

//cek halaman akhir
if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

	//jika bukan halaman terakhir maka berikan next
	$newoffset = $offset + $limit;
	echo "<a href=icd9.php?offset=$newoffset>next</a>";
    echo "<br>";
    echo "<br>";
}
else {
	echo "<a>next</a>";//cetak halaman tanpa link
    echo "<br>";
    echo "<br>";
    echo "<center>";
    }
?>					</div>
					</div>
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
<?PHP }  ?>