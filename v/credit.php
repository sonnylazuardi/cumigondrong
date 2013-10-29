<form method="post" id="form_credit" onsubmit="credit(); return false;">
	<div class='register_div'>
		<h1 class='header'>Registrasi Kartu Kredit</h1>
		<div class='per_form'>
			<label>Card Number</label><input type="text" name="Credit[card_number]" id="card_number" value="<?php echo $model->card_number ?>" required>
			<span class='error' id="error-card_number"></span>
		</div>
		
		<div class='per_form'>
			<label>Name of Card</label><input type="text" name="Credit[name_of_card]" id="name_of_card" value="<?php echo $model->name_of_card ?>" required>
			<span class='error' id="error-name_of_card"></span>
		</div>
		
		<div class='per_form'>
			<label>Expired Date</label><input type="text" name="Credit[expired_date]" id="expired_date" value="<?php echo $model->expired_date ?>" required>
			<span class='error' id="error-expired_date"></span>
		</div>
		<button type="submit" id="btn" class="btn">Register</button>
		<?php if (!$sudahSet): ?>
			<a href="<?php echo $this->makeUrl('kategori/index') ?>" class="btn">Skip</a>
		<?php endif; ?>
	</div>
</form>

<script src="<?php echo $this->getBaseUrl() ?>/js/credit.js"></script>
<script>
	var server = "<?php echo $this->getBaseUrl() ?>";
</script>