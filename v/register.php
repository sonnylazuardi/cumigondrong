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

<form method="post">
	
	<div>
		Nama : <input type="text" name="Register[nama]" id="nama" value="<?php echo $model->nama ?>" onblur="Register.cekNama()" required>
		<span id="error-nama"></span>
	</div>
	
	<div>
		Email : <input type="text" name="Register[email]" id="email" value="<?php echo $model->email ?>" onblur="Register.cekEmail()" required>
		<span id="error-email"></span>
	</div>
	
	<div>
		Username : <input type="text" name="Register[username]" id="username" value="<?php echo $model->username ?>" onblur="Register.cekUsername()"required>
		<span id="error-username"></span>
	</div>
	
	<div>
		Password : <input type="password" name="Register[password]" id="password" placeholderPassword : ="" value="<?php echo $model->password ?>" onblur="Register.cekPassword()" required>
		<span id="error-password"></span>
	</div>
	
	<div>
		Confirm Password : <input type="password" name="Register[confirm]" id="confirm" value="<?php echo $model->confirm ?>" onblur="Register.cekConfirm()" required>
		<span id="error-confirm"></span>
	</div>
	
	<div>
		Alamat : <input type="text" name="Register[alamat]" id="alamat" value="<?php echo $model->alamat ?>" onblur="Register.cekAlamat()" required>
		<span id="error-alamat"></span>
	</div>
	
	<div>
		Provinsi : <input type="text" name="Register[provinsi]" id="provinsi" value="<?php echo $model->provinsi ?>" onblur="Register.cekProvinsi()" required>
		<span id="error-provinsi"></span>
	</div>
	
	<div>
		Kota : <input type="text" name="Register[kota]" id="kota" value="<?php echo $model->kota ?>" onblur="Register.cekKota()" required>
		<span id="error-kota"></span>
	</div>
	
	<div>
		Kodepos : <input type="text" name="Register[kodepos]" id="kodepos" value="<?php echo $model->kodepos ?>" onblur="Register.cekKodepos()" required>
		<span id="error-kodepos"></span>
	</div>
	
	<div>
		Telepon : <input type="text" name="Register[telepon]" id="telepon" value="<?php echo $model->telepon ?>" onblur="Register.cekTelepon()" required>
		<span id="error-telepon"></span>
	</div>
	
	<button type="submit" id="btn" disabled="disabled" class="btn">Daftar</button>
</form>
<script src="<?php echo $this->getBaseUrl() ?>/js/register.js"></script>
<script>
	var server = "<?php echo Template::getBaseUrl() ?>";
</script>