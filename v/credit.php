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
			<label>Expired Date</label><input onfocus="loadCalendar()" type="text" name="Credit[expired_date]" id="expired_date" value="<?php echo $model->expired_date ?>" required>
			<span class='error' id="error-expired_date"></span>
			<div id="calendar" class="hide">
				<div class="calendar_header">
					<a onclick="hideCalendar()" href="#">X</a>
					<select id="cal_month" onchange="loadDate()">
						<?php 
							$m = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
							foreach ($m as $key => $bulan) : ?>
						<option value="<?php echo $key ?>"><?php echo $bulan ?></option>
						<?php endforeach; ?>
					</select>
					<input type="text" id="cal_year" onchange="loadDate()" value="<?php echo date('Y') ?>">
				</div>
				<div id="calendar_content"></div>
			</div>
		</div>
		<button type="submit" id="btn" class="btn">Register</button>
		<?php if (!$sudahSet): ?>
			<a href="<?php echo $this->makeUrl('index/home') ?>" class="btn">Skip</a>
		<?php endif; ?>
	</div>
</form>

<script src="<?php echo $this->getBaseUrl() ?>/js/credit.js"></script>
<script>
	var server = "<?php echo $this->getBaseUrl() ?>";
</script>