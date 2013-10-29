	var xmlhttp;

	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	var validasiBarang = {
		cekQuantity: function(){
			 var id_barang = document.getElementById('id_barang').value;
	 		 var quantity = document.getElementById('quantity').value;
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					var data = JSON.parse(xmlhttp.responseText);
					if (data.status) {
						alert("Transaction works");
					} else {
						alert("Transaction not WOrks");
					}
				}
			}
			if (quantity < 0) {
				//input tidak valid
				log("input not valid");
			} else {
				xmlhttp.open("GET",server+"/api/stokCukup?id_barang="+id_barang+"&quantity="+quantity,true);
				xmlhttp.send();
			}
		}
	}

	function log(msg) {
    setTimeout(function() {
        throw new Error(msg);
    }, 0);
	}

