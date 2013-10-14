<h1>Login</h1>

<form method="post">
	<input type="text" name="Login[username]" id="username" placeholder="username" value="<?php echo $model->username ?>"><br>
	<input type="password" name="Login[password]" id="password" placeholder="password" value="<?php echo $model->password ?>"><br>
	<button onclick="login(); return false;">Login</button>
</form>

<script>
function login() {
	var xmlhttp;
	var parameters = "Login[username]=" + encodeURI( document.getElementById("username").value ) + "&Login[password]=" + encodeURI( document.getElementById("password").value );

	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var data = JSON.parse(xmlhttp.responseText);
			if (data.success) {
				alert('Anda berhasil login');
				window.location = "<?php echo Template::getBaseUrl() ?>/index/index";
			} else {
				alert('Username atau password salah');
			}
		}
	}

	xmlhttp.open("POST","<?php echo Template::getBaseUrl() ?>/api/login",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", parameters.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(parameters);
}
</script>