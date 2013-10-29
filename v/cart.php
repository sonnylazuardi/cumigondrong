
	
		<h1 class='header'>Shopping Cart</h1>
<div class='orderdata'>
			<div class="wrapV_m">
				<div class='orderdetail'><h4>Order details</h4></div>
			<div id="contentV_m">
				<div>
					<div class='row'>
						<div class='list_head' id='no'><h6>No</h6></div>
						<div class='list_head' id='item'><h6>Item</h6></div>
						<div class='list_head' id='price'><h6>Price</h6></div>
						<div class='list_head' id='qty'><h6>Qty.</h6></div>
						<div class='list_head' id='subtotal'><h6>Sub Total</h6></div>
					</div>
					<?php
					$array = $model->cariSemua();
					$kategori = new Kategori();
					$ind = 1;
					$total = 0;
					foreach ($array as $item) {
						if ((isset($_SESSION[$item->nama])) && ($_SESSION[$item->nama] > 0)){
							echo "
							<div class='row'>
								<div class='list_body' id='no'><p>".$ind.".</p></div>
								<div class='list_body' id='item'><p><b>".$kategori->cari('id=:_id',array('_id'=>$item->id_kategori))->nama_kategori." :</b><br/> &nbsp &nbsp &nbsp".$item->nama."</p></div>
								<div class='list_body' id='price'><p>IDR ".$this->toCurrency($item->harga)."</p></div>
								<div class='list_body' id='qty'><p>".$_SESSION[$item->nama]."</p></div>
								<div class='list_body' id='subtotal'><p>IDR ".$this->toCurrency($item->harga*$_SESSION[$item->nama])."</p></div>
							</div>
							";
							$total += $item->harga*$_SESSION[$item->nama];
							$ind++;
						}
					} ?>			
						<div class='row'>
							<div class='list_foot' id='totallabel'><h6>TOTAL</h6></div>
							<div class='list_foot' id='total'><p>IDR <?php echo $this->toCurrency($total) ?></p></div>
						</div>
					<h2>Delivery costs are not included.</h2>
				</div>
			</div></div>
			<div class='formcontainer'>
				<div class='buyerdetail'><h4>Buyer Data</h4></div>
				<form method='post' action='ordervalidation.php'>
				<div class='formbox'><div class='label'><p>Name</p></div><div class='data'><input type='text' name='name' style='width:200px;height:20px;'></div></div>
				<div class='formbox'><div class='label'><p>Mobile</p></div><div class='data'><input type='text' name='mobile' style='width:150px;height:20px;'></div></div>
				<div class='formbox'><div class='label'><p>e-mail</p></div><div class='data'><input type='text' name='email' style='width:200px;height:20px;'></div></div>
				<div class='formbox'><div class='label'><p>Address</p></div><div class='data'><textarea type='text' name='address' style='width:220px;height:70px;margin-bottom:5px'></textarea></div></div>
				<div class='formbox'><div class='label'><p>Postal Code</p></div><div class='data'><input type='text' name='postal' style='width:100px;height:20px;'></div></div>
			</div>
		</div>