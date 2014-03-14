	function autosum(a,b){
		var a = document.forms['get_item']['harga_satuan'].value;
		var b = document.forms['get_item']['jumlah'].value;
		var c = a*b;
		document.forms['get_item']['subtotal'].value = c;
	}

