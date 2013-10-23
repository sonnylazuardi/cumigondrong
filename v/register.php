<h1>Register</h1>

<?php 
if (count($model->error) > 0) {
	echo "<ul>";
	foreach ($model->error as $errorItem) {
		echo "<li>".$errorItem."</li>";
	}
	echo "</ul>";
}
 ?>
 <style>
	.error{
		background: #fdd;
		/*border: thin solid #ddd;*/
	}
 </style>
<form method="post">
	<input type="text" name="Register[nama]" id="nama" placeholder="nama" value="<?php echo $model->nama ?>" onchange="validasi()" required><br>
	<input type="text" name="Register[email]" id="email" placeholder="email" onchange="cekEmail()" value="<?php echo $model->email ?>" required><br>
	<input type="text" name="Register[username]" id="username" placeholder="Username" onchange="cekUsername()" value="<?php echo $model->username ?>" required><br>
	<input type="password" name="Register[password]" id="password" placeholder="Password" value="<?php echo $model->password ?>"><br>
	<input type="password" name="Register[confirm]" id="confirm" placeholder="Confirm Password" value="<?php echo $model->confirm ?>"><br>
	<input type="text" name="Register[alamat]" id="alamat" placeholder="alamat" value="<?php echo $model->alamat ?>" required><br>
	<input type="text" name="Register[provinsi]" id="provinsi" placeholder="provinsi" value="<?php echo $model->provinsi ?>" required><br>
	<input type="text" name="Register[kota]" id="kota" placeholder="kota" value="<?php echo $model->kota ?>" required><br>
	<input type="text" name="Register[kodepos]" id="kodepos" placeholder="kodepos" value="<?php echo $model->kodepos ?>" required><br>
	<input type="text" name="Register[telepon]" id="telepon" placeholder="telepon" value="<?php echo $model->telepon ?>" required><br>
	
	<button type="submit" id="btn" disabled="disabled">Daftar</button>
</form>

<script type="text/javascript">
	var error = [];
	var xmlhttp;
	var validForm = {
		'username': false,
		'email': false
		// 'password': false
	};
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	function cekUsername() {
		var username = document.getElementById('username').value;
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var data = JSON.parse(xmlhttp.responseText);
				if (data.status) {
					alert('Username tersedia');
					validForm['username'] = true;
				} else {
					alert('Username tidak tersedia');
					validForm['username'] = false;
				}
				validasi();
			}
		}
		xmlhttp.open("GET","<?php echo Template::getBaseUrl() ?>/api/usernameAvailable?username="+username,true);
		xmlhttp.send();
	}
	function cekEmail() {
		var email = document.getElementById('email').value;
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var data = JSON.parse(xmlhttp.responseText);
				if (data.status) {
					alert('Email tersedia');
					validForm['email'] = true;
				} else {
					alert('Email tidak tersedia');
					validForm['email'] = false;
				}
				validasi();
			}
		}
		xmlhttp.open("GET","<?php echo Template::getBaseUrl() ?>/api/emailAvailable?email="+email,true);
		xmlhttp.send();
	}
	function validasi() {
		var valid = true;
    	for (var key in validForm) {
			if (validForm.hasOwnProperty(key)) {
				var a = document.getElementById(key);
				if (validForm[key] == false) {
					a.classList.add("error");
					valid = false;
				} else {
					a.classList.remove("error");
				}
			}
		}
		if (!valid) {
			document.getElementById("btn").disabled = true;
		} else {
			document.getElementById("btn").disabled = false;
		}
		return valid;
	}
</script>