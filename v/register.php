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
 <div id="errorSummary"></div>
<form method="post">
	<input type="text" name="Register[nama]" id="nama" placeholder="nama" value="<?php echo $model->nama ?>" onchange="cekNama()" required>
	<span id="error-nama"></span><br>
	<input type="text" name="Register[email]" id="email" placeholder="email" value="<?php echo $model->email ?>" onchange="cekEmail()" required>
	<span id="error-email"></span><br>
	<input type="text" name="Register[username]" id="username" placeholder="Username" value="<?php echo $model->username ?>" onchange="cekUsername()"required>
	<span id="error-username"></span><br>
	<input type="password" name="Register[password]" id="password" placeholder="Password" value="<?php echo $model->password ?>" onchange="cekPassword()" required>
	<span id="error-password"></span><br>
	<input type="password" name="Register[confirm]" id="confirm" placeholder="Confirm Password" value="<?php echo $model->confirm ?>" onchange="cekConfirm()" required>
	<span id="error-confirm"></span><br>
	<input type="text" name="Register[alamat]" id="alamat" placeholder="alamat" value="<?php echo $model->alamat ?>" onchange="cekAlamat()" required>
	<span id="error-alamat"></span><br>
	<input type="text" name="Register[provinsi]" id="provinsi" placeholder="provinsi" value="<?php echo $model->provinsi ?>" onchange="cekProvinsi()" required>
	<span id="error-provinsi"></span><br>
	<input type="text" name="Register[kota]" id="kota" placeholder="kota" value="<?php echo $model->kota ?>" onchange="cekKota()" required>
	<span id="error-kota"></span><br>
	<input type="text" name="Register[kodepos]" id="kodepos" placeholder="kodepos" value="<?php echo $model->kodepos ?>" onchange="cekKodepos()" required>
	<span id="error-kodepos"></span><br>
	<input type="text" name="Register[telepon]" id="telepon" placeholder="telepon" value="<?php echo $model->telepon ?>" onchange="cekTelepon()" required>
	<span id="error-telepon"></span><br>
	
	<button type="submit" id="btn" disabled="disabled">Daftar</button>
</form>

<script type="text/javascript">
	var error = [];
	var xmlhttp;
	var validForm = {
		'username': false,
		'email': false,
		'password': false,
		'confirm': false,
		'nama':false
	};
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	function cekNama() {
		var nama = document.getElementById('nama').value;
		if (nama.indexOf(' ') == -1) {
			error['nama'] = "Nama Lengkap harus minimal mengandung satu spasi antara dua karakter (ada nama depan dan nama belakang)";
			validForm['nama'] = false;
		} else {
			validForm['nama'] = true;
		}
		validasi();
	}
	function cekConfirm() {
		var password = document.getElementById('password').value;
		var confirm = document.getElementById('confirm').value;
		if (password != confirm) {
			error['confirm'] = "Password harus sama dengan Konfirmasi";
			validForm['confirm'] = false;
		} else {
			validForm['confirm'] = true;
		}
		validasi();
	}
	function cekPassword() {
		var password = document.getElementById('password').value;
		var email = document.getElementById('email').value;
		var username = document.getElementById('username').value;
		if (username == password) {
			error['password'] = 'Password tidak boleh sama dengan Username';
			validForm['password'] = false;
			validasi();
		} else if (password == email) {
			error['password'] = "Password tidak boleh sama dengan email";
			validForm['password'] = false;
		} else {
			validForm['password'] = true;
		}
		validasi();
	}

	function cekUsername() {
		var username = document.getElementById('username').value;
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var data = JSON.parse(xmlhttp.responseText);
				if (data.status) {
					validForm['username'] = true;
				} else {
					error['username'] = 'Username sudah terpakai';
					validForm['username'] = false;
				}
				validasi();
			}
		}
		if (username.length < 5) {
			error['username'] = 'Username minimal 5 karakter';
			validForm['username'] = false;
			validasi();
		} else {
			xmlhttp.open("GET","<?php echo Template::getBaseUrl() ?>/api/usernameAvailable?username="+username,true);
			xmlhttp.send();
		}
	}
	function isValidEmail(email)
	{
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
			return false;
		}
		return true;
	}
	function cekEmail() {
		var email = document.getElementById('email').value;
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var data = JSON.parse(xmlhttp.responseText);
				if (data.status) {
					validForm['email'] = true;
				} else {
					error['email'] = 'Email sudah terpakai';
					validForm['email'] = false;
				}
				validasi();
			}
		}
		if (!isValidEmail(email)) {
			error['email'] = 'Email harus memiliki format XX@XX.YY (XX adalah satu karakter atau lebih, YY adalah dua karakter atau lebih)';
			validForm['email'] = false;
			validasi();
		} else {
			xmlhttp.open("GET","<?php echo Template::getBaseUrl() ?>/api/emailAvailable?email="+email,true);
			xmlhttp.send();	
		}
	}
	function validasi() {
		var valid = true;
		var errors = "";
		document.getElementById('errorSummary').innerHTML = "";
    	for (var key in validForm) {
			if (validForm.hasOwnProperty(key)) {
				var keyError = document.getElementById('error-'+key);
				keyError.innerHTML = "";
				var a = document.getElementById(key);
				if (validForm[key] == false) {
					a.classList.add("error");
					if (error[key])
						keyError.innerHTML = error[key];
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