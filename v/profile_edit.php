<form method="post">
	<div class='register_div'>
		<h1 class='header'>Edit Profile</h1>
		<div class="per_form">
			<label>Nama Lengkap</label><input type="text" value="<?php echo $model->nama ?>" name="Profile[nama]" id="nama" required onkeyup="Register.cekNama()">
			<span class="error" id="error-nama"></span>
		</div>
		<div class="per_form">
			<label>Username</label><input type="text" value="<?php echo $model->username ?>" id="username" disabled="disabled">
		</div>
		<div class="per_form">
			<label>Email</label><input type="text" value="<?php echo $model->email ?>" id="email" disabled="disabled">
		</div>
		<div class="per_form">
			<label>Password Baru</label><input type="password" value="" name="Profile[password]" id="password" onkeyup="Register.cekPassword()">
			<span class="error" id="error-password"></span>
		</div>
		<div class="per_form">
			<label>Confirm Pass.</label><input type="password" value="" name="Profile[confirm]" id="confirm" onkeyup="Register.cekConfirm()">
			<span class="error" id="error-confirm"></span>
		</div>
	</div>
	<div class='register_div'>
		<div class="per_form">
			<label>Alamat</label><input type="text" value="<?php echo $model->alamat ?>" name="Profile[alamat]" id="alamat" required>
			<span id="error-alamat"></span>
		</div>
		<div class="per_form">
			<label>Provinsi</label>
			<select value="<?php echo $model->provinsi ?>" name="Profile[provinsi]" id="provinsi" required>
				<option value="">Pilih Provinsi :</option>
				<?php 
				$propinsi = array("Aceh", "Sumatera Utara", "Sumatera Barat", "Riau", "Jambi", "Sumatera Selatan", "Lampung", "Bengkulu", "Bangka Belitung", "Kepulauan Riau", "Jakarta", "Jawa Barat", "Jawa Tengah", "Yogyakarta", "Jawa Timur", "Banten", "Bali", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Kalimantan Barat", "Kalimantan Timur", "Kalimantan Tengah", "Kalimantan Selatan", "Sulawesi Utara", "Sulawesi Tengah", "Sulawesi Selatan", "Sulawesi Tenggara", "Gorontalo", "Sulawesi Barat", "Maluku", "Maluku Utara", "Papua", "Papua Barat");
				sort($propinsi);
				foreach ($propinsi as $item) : ?>
					<option value="<?php echo $item ?>" <?php if ($item==$model->provinsi) echo "selected" ?>><?php echo $item ?></option>
				<?php endforeach; ?>
			</select>
			<span id="error-provinsi"></span>
		</div>
		<div class="per_form">
			<label>Kota</label><input type="text" value="<?php echo $model->kota ?>" name="Profile[kota]" id="kota" required>
			<span id="error-kota"></span>
		</div>
		<div class="per_form">
			<label>Kode Pos</label><input type="text" value="<?php echo $model->kodepos ?>" name="Profile[kodepos]" id="kodepos" required>
			<span id="error-kodepos"></span>
		</div>
		<div class="per_form">
			<label>Telepon</label><input type="text" value="<?php echo $model->telepon ?>" name="Profile[telepon]" id="telepon" required>
			<span id="error-telepon"></span>
		</div>
		<button type="submit" id="btn" onclick="return Register.compareDefault()" class="btn">Simpan</button>
	</div>
</form>


<script src="<?php echo $this->getBaseUrl() ?>/js/register.js"></script>
<script>
	var server = "<?php echo $this->getBaseUrl() ?>";
	var defaultForm = {};
	for (var key in Register.validForm) {
		if (Register.validForm.hasOwnProperty(key)) {
			defaultForm[key] = document.getElementById(key).value;
		}
	}
</script>