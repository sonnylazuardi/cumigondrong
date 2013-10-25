<h1>Profil</h1>

<div>
	<p>Nama Lengkap: <?php echo $model->nama ?></p>
</div>
<div>
	<p>Username: <?php echo $model->username ?></p>
</div>
<div>
	<p>Email: <?php echo $model->email ?></p>
</div>
<div>
	<p>Alamat: <?php echo $model->alamat ?></p>
</div>
<div>
	<p>Provinsi: <?php echo $model->provinsi ?></p>
</div>
<div>
	<p>Kota: <?php echo $model->kota ?></p>
</div>
<div>
	<p>Kode Pos: <?php echo $model->kodepos ?></p>
</div>
<div>
	<p>Telepon: <?php echo $model->telepon ?></p>
</div>

<a href="<?php echo $this->makeUrl('profile/edit') ?>" class="btn">Edit Profile</a>