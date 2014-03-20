<!doctype html>
<html>
<head>
<title>AJAX Autocomplete With PHP - phphunger.com</title>
</head>
<body>
<?php
include "../../koneksi.php";
if (isset($_GET['search']) && $_GET['search'] != '') {
 //Add slashes to any quotes to avoid SQL problems.
 $search = $_GET['search'];
 $suggest_query = mysql_query("SELECT distinct(nama_klinik) as autosuggest FROM klinik WHERE nama_klinik like('" .$search . "%') ORDER BY nama_klinik");
 while($suggest = mysql_fetch_array($suggest_query)) {
  echo $suggest['autosuggest'] . "\n";
 }
}

?>
</body>
</html>