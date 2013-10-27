<form method="post">
	<div class='register_div'>
		<h1 class='header'>Edit Profile</h1>
		<div class="per_form">
			<label>Nama Lengkap: </label><input type="text" value="<?php echo $model->nama ?>" name="Profile[nama]" id="nama" required onblur="Register.cekNama()">
			<span class="error" id="error-nama"></span>
		</div>
		<div class="per_form">
			<label>Username: </label><input type="text" value="<?php echo $model->username ?>" id="username" disabled="disabled">
		</div>
		<div class="per_form">
			<label>Email: </label><input type="text" value="<?php echo $model->email ?>" id="email" disabled="disabled">
		</div>
		<div class="per_form">
			<label>Password Baru : </label><input type="password" value="" name="Profile[password]" id="password" required onblur="Register.cekPassword()">
			<span class="error" id="error-password"></span>
		</div>
		<div class="per_form">
			<label>Confirm Pass. : </label><input type="password" value="" name="Profile[confirm]" id="confirm" required onblur="Register.cekConfirm()">
			<span class="error" id="error-confirm"></span>
		</div>
	</div>
	<div class='register_div'>
		<div class="per_form">
			<label>Alamat: </label><input type="text" value="<?php echo $model->alamat ?>" name="Profile[alamat]" id="alamat" required>
		</div>
		<div class="per_form">
			<label>Provinsi: </label><input type="text" value="<?php echo $model->provinsi ?>" name="Profile[provinsi]" id="provinsi" required>
		</div>
		<div class="per_form">
			<label>Kota: </label><input type="text" value="<?php echo $model->kota ?>" name="Profile[kota]" id="kota" required>
		</div>
		<div class="per_form">
			<label>Kode Pos: </label><input type="text" value="<?php echo $model->kodepos ?>" name="Profile[kodepos]" id="kodepos" required>
		</div>
		<div class="per_form">
			<label>Telepon: </label><input type="text" value="<?php echo $model->telepon ?>" name="Profile[telepon]" id="telepon" required>
		</div>
		<button type="submit" id="btn" disabled="disabled" class="btn">Simpan</button>
	</div>
</form>


<script src="<?php echo $this->getBaseUrl() ?>/js/register.js"></script>
<script>
	var server = "<?php echo Template::getBaseUrl() ?>";
	Register.validForm = {
		'username': true,
		'email': true,
		'password': false,
		'confirm': false,
		'nama':false
	};
</script>