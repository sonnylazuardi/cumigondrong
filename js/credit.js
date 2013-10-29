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
function loadCalendar(month, year) {
	if(typeof(month)==='undefined') month = new Date().getDate();
	if(typeof(year)==='undefined') year = new Date().getFullYear();
	xmlhttp.open("GET",server+"/api/gambar_calendar?month="+month+"&year="+year,true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById('calendar_content').innerHTML = xmlhttp.responseText;
			document.getElementById('calendar').classList.remove('hidden');
		}
	}
}
function hideCalendar() {
	document.getElementById('calendar').classList.add('hidden');
}
function changeDate(date_now) {
	hideCalendar();
	document.getElementById('expired_date').value = date_now;
}
function loadDate() {
	var month = document.getElementById('cal_month').value;
	var year = document.getElementById('cal_year').value;
	loadCalendar(month, year);
}