<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SISTEM INFORMASI REKAM MEDIS</title>
	<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery_append.js"></script> 
	<script type="text/javascript" src="../../config/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../config/auto.js"></script>
    <script type="text/javascript" src="../../config/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="../../css/token-input.css" type="text/css" />
</head>
<body>
<tr>
										<td>ICD9</td>
										<td><input type="text" name="nama_icd9" id="input_data3">
										<script type='text/javascript'>
									$(document).ready(function() {
									$("#input_data3").tokenInput("../../config/file_json.php?aksi=cari_icd9", {
											preventDuplicates: true,
											theme: "facebook",
											onAdd: function (item) {
												get_icd9(item.name)
											}
											
										});
									});
									function get_icd9(kode_icd9){
										$.ajax({
											type: 'GET',
											url: '../../config/file_json.php?aksi=get_icd9&kode_icd9='+kode_icd9,
											dataType: 'json',
											success: function(data){
												var icd9 = data[0];
												console.log(icd9);	
												$('#kode_icd9').val(icd9.kode_icd9);
												
											}
										});
									}
									</script></td>
									</tr>
									<td><input type="text" name="kode_icd9" id="kode_icd9">