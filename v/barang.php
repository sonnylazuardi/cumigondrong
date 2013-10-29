<?php
function toRP($num) {
	// PRICE ADVANCE PRINT IN Rp
	$price = strval($num);
	$price = strrev($price); 
	$nchar = strlen($price);
	$rp = '';
	for($i=0;$i<strlen($price);$i++){
		$rp .= $price[$i];
		if((($i+1)%3==0)&&($i!=(strlen($price)-1))){
			$rp .= '.';
		}
	}
	$rp = strrev($rp); 
	return $rp;
}



?>
<script type="text/javascript">
	function fitpict(obj) {
		fitimg(obj,340,340,true,true,false);
	}
</script>
<h1 class='small-header'><?php echo $model->nama ?></h1>
<div class='item_pict'>
	<img src='<?php echo $this->getBaseUrl() ?>/img/barang/<?php echo $model->gambar; ?>' onload='fitpict(this)' ></img>
</div>

<div class='item_detail'>
	<h4>product description</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit lorem, scelerisque sed sapien non, vestibulum venenatis nisi. Nullam in arcu eleifend nunc volutpat venenatis a sed massa. Nullam eget congue eros. Donec tincidunt dui arcu. Aliquam erat volutpat.<br/>Vivamus ullamcorper massa facilisis orci sodales imperdiet. Suspendisse aliquet sodales eros, sit amet tincidunt eros pulvinar et. Etiam id nibh enim. Nullam turpis enim, lacinia a dictum vitae, posuere non risus. Maecenas interdum augue eget nisl consectetur, in rhoncus ligula eleifend.<br/>Nullam non ligula consequat, consequat dolor et, vulputate nisl. Nunc varius mollis enim, euismod posuere quam malesuada at. </p>
</div>

<div class='item_price'>
		<p>get it for :</p>
		<h4>IDR <?php echo toRP($model->harga) ?></h4>
	<!-- <form method="post" onSubmit="Stok(); return false;" >  -->
	 <form method="post" onsubmit="cekQuantity(); return false;"  action = "<?php echo $this->makeUrl("barang/update"); ?>" id="form-shop"> 
		<label class='qty'>Quantity</label>
		<input type='number' name="quantity" id="quantity" class='qty' value=1></input>
		<input type="hidden" name="id_barang" id="id_barang" value="<?php echo $model->id; ?>">
		<p>Request Message :</p>
		<textarea class='req_msg' name='req_msg'></textarea>
		<input type='submit' class='cart' value = 'Add to Cart'></input>
	 </form>
</div>

<script src="<?php echo $this->getBaseUrl() ?>/js/validasiBarang.js"></script>
<script>
	var server = "<?php echo $this->getBaseUrl() ?>";
</script>

