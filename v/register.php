<h1>Register</h1>

<form method="post">
	<input type="text" name="Register[nama]" id="nama" placeholder="nama" 
	value="<?php echo $model->nama ?>"><br>
	<input type="text" name="Register[email]" id="email" placeholder="email" value="<?php echo $model->email ?>"><br>
	<input type="text" name="Register[username]" id="username" placeholder="Username" value="<?php echo $model->username ?>"><br>
	<input type="password" name="Register[password]" id="password" placeholder="Password" value="<?php echo $model->password ?>"><br>
	<input type="password" name="Register[confirm]" id="confirm" placeholder="Confirm Password" value="<?php echo $model->confirm ?>"><br>
	<input type="text" name="Register[alamat]" id="alamat" placeholder="alamat" value="<?php echo $model->alamat ?>"><br>
	<input type="text" name="Register[provinsi]" id="provinsi" placeholder="provinsi" value="<?php echo $model->provinsi ?>"><br>
	<input type="text" name="Register[kota]" id="kota" placeholder="kota" value="<?php echo $model->kota ?>"><br>
	<input type="text" name="Register[kodepos]" id="kodepos" placeholder="kodepos" value="<?php echo $model->kodepos ?>"><br>
	<input type="text" name="Register[telepon]" id="telepon" placeholder="telepon" value="<?php echo $model->telepon ?>"><br>
	
	<button type="submit">Daftar</button>
</form>