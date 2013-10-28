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
		fitimg(obj,340,340,true,true);
	}
</script>	
<h1 class='header'><?php echo $model->nama ?></h1>
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
	<form method="post"  action = "<?php echo $this->makeUrl("barang/update"); ?>"> 
		<label class='qty'>Quantity</label>
		<input type='number' name="quantity" class='qty' value=1></input>
		<input type="hidden" name="id_barang" value="<?php echo $model->id; ?>">
		<p>Request Message :</p>
		<textarea class='req_msg' name='req_msg'></textarea>
		<input type='submit' class='cart' value = 'Add to Cart'></input>
	</form>
</div>

<!-- something wrong here -->
<script>
function Stok()
{
	var xmlhttp;
	var id_barang = document.getElementById('id_barang').value;
	var quantity = document.getElementById('quantity').value;
	var server = "<?php echo Template::getBaseUrl() ?>";
	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();	
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    		var data = JSON.parse(xmlhttp.responseText);
				if (data.status) {
				// 	$model = new Barang($id_barang);

				// $_SESSION[$model->nama]= $quantity;
				// $_SESSION[ "msg" . $model->nama] = $req_msg;
				
				//  $this->redirect("cart/index");
				} else {
					//pop up error
					document.write("Stok tidak tersedia!");				
				}
	    }
	  }
	xmlhttp.open("GET",server+"/api/stokCukup?id_barang="+id_barang +"&quantity="+quantity ,true);
	xmlhttp.send();
}
</script>