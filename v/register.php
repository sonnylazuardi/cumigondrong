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
			<label>Nama Lengkap</label><input type="text" name="Register[nama]" id="nama" value="<?php echo $model->nama ?>" onkeyup="Register.cekNama()" required>
			<span class='error' id="error-nama"></span>
		</div>
		
		<div class='per_form'>
			<label>Email</label><input type="text" name="Register[email]" id="email" value="<?php echo $model->email ?>" onkeyup="Register.cekEmail()" required>
			<span class='error' id="error-email"></span>
		</div>
		
		<div class='per_form'>
			<label>Username</label><input type="text" name="Register[username]" id="username" value="<?php echo $model->username ?>" onkeyup="Register.cekUsername()"required>
			<span class='error' id="error-username"></span>
		</div>
		
		<div class='per_form'>
			<label>Password</label><input type="password" name="Register[password]" id="password" placeholderPassword : ="" value="<?php echo $model->password ?>" onkeyup="Register.cekPassword()" required>
			<span class='error' id="error-password"></span>
		</div>
		
		<div class='per_form'>
			<label>Confirm Pass.</label><input type="password" name="Register[confirm]" id="confirm" value="<?php echo $model->confirm ?>" onkeyup="Register.cekConfirm()" required>
			<span class='error' id="error-confirm"></span>
		</div>
	</div>
	<div class='register_div'>
		<div class='per_form small'>
			<label class='uncheck'>Alamat</label><input type="text" name="Register[alamat]" id="alamat" value="<?php echo $model->alamat ?>" required>
			<span id="error-alamat"></span>
		</div>
		
		<div class='per_form small'>
			<label>Provinsi</label>
			<select value="<?php echo $model->provinsi ?>" name="Register[provinsi]" id="provinsi" required>
				<option value="">Pilih Provinsi :</option>
				<?php 
				$propinsi = array("Aceh", "Sumatera Utara", "Sumatera Barat", "Riau", "Jambi", "Sumatera Selatan", "Lampung", "Bengkulu", "Bangka Belitung", "Kepulauan Riau", "Jakarta", "Jawa Barat", "Jawa Tengah", "Yogyakarta", "Jawa Timur", "Banten", "Bali", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Kalimantan Barat", "Kalimantan Timur", "Kalimantan Tengah", "Kalimantan Selatan", "Sulawesi Utara", "Sulawesi Tengah", "Sulawesi Selatan", "Sulawesi Tenggara", "Gorontalo", "Sulawesi Barat", "Maluku", "Maluku Utara", "Papua", "Papua Barat");
				sort($propinsi);
				foreach ($propinsi as $item) : ?>
					<option value="<?php echo $item ?>"><?php echo $item ?></option>
				<?php endforeach; ?>
			</select>
			<span id="error-provinsi"></span>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Kota/Kabupaten</label><input type="text" name="Register[kota]" id="kota" value="<?php echo $model->kota ?>"  required>
			<span id="error-kota"></span>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Kodepos</label><input type="text" name="Register[kodepos]" id="kodepos" value="<?php echo $model->kodepos ?>" onkeyup="Register.cekKodepos()" required>
			<span id="error-kodepos"></span>
		</div>
		
		<div class='per_form small'>
			<label class='uncheck'>Telepon</label><input type="text" name="Register[telepon]" id="telepon" value="<?php echo $model->telepon ?>" onkeyup="Register.cekTelepon()" required>
			<span id="error-telepon"></span>
		</div>	
		<p class='keterangan'>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
		<button type="submit" id="btn" disabled="disabled" class="btn">Daftar</button>
	</div><br/>
</form>
<script src="<?php echo $this->getBaseUrl() ?>/js/register.js"></script>
<script>
	var server = "<?php echo Template::getBaseUrl() ?>";
</script>