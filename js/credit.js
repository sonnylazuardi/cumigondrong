var xmlhttp;
if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
} else {// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
function credit() {	
	var parameters = "Credit[credit_number]=" + encodeURI( document.getElementById("card_number").value ) + "&Credit[name_of_card]=" + encodeURI( document.getElementById("name_of_card").value );
	xmlhttp.open("POST",server+"/api/checkCreditCard",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var data = JSON.parse(xmlhttp.responseText);
			if (data.success) {
				document.getElementById('form_credit').submit();
			} else {
				alert(data.error);
			}
		}
	}
}