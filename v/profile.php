<div class="center">
<div class="register_div">
	<h1 class='header'>Profil</h1>
	<div class="per_form">
		<label>Nama Lengkap:</label><p><?php echo $model->nama ?></p>
	</div>
	<div class="per_form">
		<label>Username:</label><p><?php echo $model->username ?></p>
	</div>
	<div class="per_form">
		<label>Email:</label><p><?php echo $model->email ?></p>
	</div>
	<div class="per_form">
		<label>Alamat:</label><p><?php echo $model->alamat ?></p>
	</div>
	<div class="per_form">
		<label>Provinsi:</label><p><?php echo $model->provinsi ?></p>
	</div>
	<div class="per_form">
		<label>Kota:</label><p><?php echo $model->kota ?></p>
	</div>
	<div class="per_form">
		<label>Kode Pos:</label><p><?php echo $model->kodepos ?></p>
	</div>
	<div class="per_form">
		<label>Telepon:</label><p><?php echo $model->telepon ?></p>
	</div>
	<div class="per_form">
		<?php
			$order = new Order(); 
			$order_count = $order->jumlahSemua('id_account=:a', array(':a'=>$model->id));
		?>
		<label>Transaksi:</label><p><?php echo $order_count ?></p>
	</div>
	<a href="<?php echo $this->makeUrl('profile/edit') ?>" class="btn">Edit Profile</a>
</div>

</div>