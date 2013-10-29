var xmlhttp;

if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
} else {// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}


function cekQuantity() {
	var id_barang = document.getElementById('id_barang').value;
	var quantity = document.getElementById('quantity').value;
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var data = JSON.parse(xmlhttp.responseText);
			if (data.status) {
				document.getElementById('form-shop').submit();
			} else {
				alert("Stok untuk barang tersebut tidak cukup");
			}
		}
	}
	if (quantity <= 0) {
		console.log("input not valid");
	} else {
		xmlhttp.open("GET",server+"/api/stokCukup?id_barang="+id_barang+"&quantity="+quantity,true);
		xmlhttp.send();
	}
}