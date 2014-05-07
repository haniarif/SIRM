<?php
    if(isset($_POST['submit'])){
      include "../../koneksi.php";
            foreach ($_POST['rows'] as $key => $count ){
                $nama_layanan = $_POST['nama_layanan'.$count];
                $nama_kamar = $_POST['nama_kamar'.$count];
                $kelas = $_POST['kelas'.$count];
				$frekuensi = $_POST['frekuensi'.$count];
                $petugas = $_POST['petugas'.$count];
                $dokter = $_POST['dokter'.$count];
				$dokter2 = $_POST['dokter2'.$count];
				
 
                $query_2 = "INSERT INTO mutasi () VALUES ('$nama_layanan','$nama_kamar','$kelas')";
 
                mysql_query($query_2) or die(mysql_error());
            }
 
            echo "Data Berhasil disimpan <br>";
            echo "<a href=\"mutasi.php\">Kembali</a>";
 
        mysql_close($connection);
 
    }else{
        header('Location: mutasi.php');
    }
?>