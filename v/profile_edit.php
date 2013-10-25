<h1>Edit Profile</h1>

<form method="post">
	<div>
		Nama Lengkap: <input type="text" value="<?php echo $model->nama ?>" name="Profile[nama]" id="nama" required onblur="Register.cekNama()">
		<span id="error-nama"></span>
	</div>
	<div>
		Username: <input type="text" value="<?php echo $model->username ?>" id="username" disabled="disabled">
	</div>
	<div>
		Email: <input type="text" value="<?php echo $model->email ?>" id="email" disabled="disabled">
	</div>
	<div>
		Password Baru : <input type="password" value="" name="Profile[password]" id="password" required onblur="Register.cekPassword()">
		<span id="error-password"></span>
	</div>
	<div>
		Confirm Password Baru : <input type="password" value="" name="Profile[confirm]" id="confirm" required onblur="Register.cekConfirm()">
		<span id="error-confirm"></span>
	</div>
	<div>
		Alamat: <input type="text" value="<?php echo $model->alamat ?>" name="Profile[alamat]" id="alamat" required>
		<span id="error-alamat"></span>
	</div>
	<div>
		Provinsi: <input type="text" value="<?php echo $model->provinsi ?>" name="Profile[provinsi]" id="provinsi" required>
		<span id="error-provinsi"></span>
	</div>
	<div>
		Kota: <input type="text" value="<?php echo $model->kota ?>" name="Profile[kota]" id="kota" required>
		<span id="error-kota"></span>
	</div>
	<div>
		Kode Pos: <input type="text" value="<?php echo $model->kodepos ?>" name="Profile[kodepos]" id="kodepos" required>
		<span id="error-kodepos"></span>
	</div>
	<div>
		Telepon: <input type="text" value="<?php echo $model->telepon ?>" name="Profile[telepon]" id="telepon" required>
		<span id="error-telepon"></span>
	</div>
	<button type="submit" id="btn" disabled="disabled" class="btn">Simpan</button>
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