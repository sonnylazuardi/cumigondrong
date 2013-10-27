<script type="text/javascript">
	function fitpict(obj) {
		fitimg(obj,490,340,true,true);
	}
</script>
<h1 class='header'><?php echo $model->nama ?></h1>
<div class='item_pict'>
	<img src='<?php echo $this->getBaseUrl() ?>/img/barang/3.jpg' onload='fitpict(this)' ></img>
</div>

<div class='item_detail'>
	<div class='price'>
		<p>get it for :</p>
		<h4>IDR 450.000</h4>
	</div>
	<form>
		<div class='quantity'>
			<p>Quantity:</p>
				<input type='number' class='qty' value=1></input>
		</div>
		<input type='submit' class='cart' value='add to cart'></input>
	</form>
	<h4>product description</h4>
	<p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
</div>

<!-- <div class='item_price'>
	<p>Get it for :</p>
	<h4>Rp 450.000,-</h4>
</div> -->
