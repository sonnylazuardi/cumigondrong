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
	<div class='register_div'>
		<h1 class='header'>Register</h1>
		<div class='per_form'>
			<label>Nama</label><input type="text" name="Register[nama]" id="nama" value="<?php echo $model->nama ?>" onchange="Register.cekNama()" required>
			<span class='error' id="error-nama"></span>
		</div>
		
		<div class='per_form'>
			<label>Email</label><input type="text" name="Register[email]" id="email" value="<?php echo $model->email ?>" onchange="Register.cekEmail()" required>
			<span class='error' id="error-email"></span>
		</div>
		
		<div class='per_form'>
			<label>Username</label><input type="text" name="Register[username]" id="username" value="<?php echo $model->username ?>" onchange="Register.cekUsername()"required>
			<span class='error' id="error-username"></span>
		</div>
		
		<div class='per_form'>
			<label>Password</label><input type="password" name="Register[password]" id="password" placeholderPassword : ="" value="<?php echo $model->password ?>" onchange="Register.cekPassword()" required>
			<span class='error' id="error-password"></span>
		</div>
		
		<div class='per_form'>
			<label>Confirm Pass.</label><input type="password" name="Register[confirm]" id="confirm" value="<?php echo $model->confirm ?>" onchange="Register.cekConfirm()" required>
			<span class='error' id="error-confirm"></span>
		</div>
	</div>
	<div class='register_div'>
		<div class='per_form small'>
			<label class='uncheck'>Alamat</label><input type="text" name="Register[alamat]" id="alamat" value="<?php echo $model->alamat ?>" onchange="Register.cekAlamat()" required>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Provinsi</label><input type="text" name="Register[provinsi]" id="provinsi" value="<?php echo $model->provinsi ?>" onchange="Register.cekProvinsi()" required>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Kota</label><input type="text" name="Register[kota]" id="kota" value="<?php echo $model->kota ?>" onchange="Register.cekKota()" required>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Kodepos</label><input type="text" name="Register[kodepos]" id="kodepos" value="<?php echo $model->kodepos ?>" onchange="Register.cekKodepos()" required>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Telepon</label><input type="text" name="Register[telepon]" id="telepon" value="<?php echo $model->telepon ?>" onchange="Register.cekTelepon()" required>
		</div>	
		<p class='keterangan'>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
		<button type="submit" id="btn" disabled="disabled" class="btn">Daftar</button>
	</div><br/>
</form>
<script src="<?php echo $this->getBaseUrl() ?>/js/register.js"></script>
<script>
	var server = "<?php echo Template::getBaseUrl() ?>";
</script>