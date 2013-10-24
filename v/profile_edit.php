<h1>Edit Profile</h1>

<form method="post">
	<div>
		Nama Lengkap: <input type="text" value="<?php echo $model->nama ?>" name="Profile[nama]" required>
	</div>
	<div>
		Username: <?php echo $model->username ?>
	</div>
	<div>
		Email: <input type="text" value="<?php echo $model->email ?>" name="Profile[email]" required>
	</div>
	<div>
		Alamat: <input type="text" value="<?php echo $model->alamat ?>" name="Profile[alamat]" required>
	</div>
	<div>
		Provinsi: <input type="text" value="<?php echo $model->provinsi ?>" name="Profile[provinsi]" required>
	</div>
	<div>
		Kota: <input type="text" value="<?php echo $model->kota ?>" name="Profile[kota]" required>
	</div>
	<div>
		Kode Pos: <input type="text" value="<?php echo $model->kodepos ?>" name="Profile[kodepos]" required>
	</div>
	<div>
		Telepon: <input type="text" value="<?php echo $model->telepon ?>" name="Profile[telepon]" required>
	</div>
	<button type="submit" class="btn">Simpan</button>
</form>