
	
<<<<<<< HEAD
	<h1 class='header'>Shopping Cart</h1>
	<br/>
	<div class='payment_div'>
		<div id = "contentV_m" style="overflow: hidden;">
		<div class = "row">	
			<div class = "list_head" id = "no"><label>No</label> </div>
			<div class = "list_head" id = "item"><label>Merk Barang</label> </div>
			<div class = "list_head" id = "qty"><label>Qty</label> </div>
			<div class = "list_head" id = "price"><label>Subtotal</label></div>
			<div class = "list_head" id = "msg"><label>Message</label></div>
			<div class = "list_head" id = "price"><label>Action</label></div>	
		</div>
			<?php
			$total = 0;
			$ind = 1;
			if (isset($_SESSION["dibeli"])){
				$array = $_SESSION["dibeli"];
				foreach ($array as $item) {
					if ((isset($_SESSION[$item])) && ($_SESSION[$item] > 0)){
						$data = new Barang();
						$brg = $data->cari('nama=:n',array(':n'=>$item));
						echo '<div class = "row">';
						echo '<div class = "list_body" id = "no">'. $ind . '</div>' ; 
						echo '<div class = "list_body" id = "item">'. $item . '</div>' ; 
						echo '<div class = "list_body" id = "qty">'. $_SESSION[$item] . '</div>' ;
						$total_pars = $brg->harga * $_SESSION[$item];
						echo '<div class = "list_body" id = "price">'. $total_pars . '</div>' ; 
						if (isset($_SESSION[ 'msg' . $item  ])){
							echo '<div class = "list_body" id = "msg">'. $_SESSION[ 'msg' . $item  ] . '</div>' ; 					
						} else {
							echo '<div class = "list_body" id = "msg"></div>' ;	
						}
						echo '<div class = "list_body" id ="price"><a href=" '. $this->getBaseUrl() . '/barang/'.$brg->id.'">Edit</a>|<a href=" '. $this->getBaseUrl() . '/barang/delete/'.$brg->id.'">Delete</a>  </div>';
						$ind++;			
						$total = $total + $total_pars;
						echo '</div>';
					}
				}	
			}
			echo '<div class = "row">';
			echo "Total Pembayaran : $total";
			$_SESSION["total_shopping"] = $total;
			?>
			<div class = "row">
			<a href='<?php echo $this->getBaseUrl() ?>/profile/credit?redirect=shop/payment'><input type="btn" name="submit" value="Process to payment" class="button"></a>
			<a href='<?php echo $this->getBaseUrl() ?>/index/home'><input type="btn" name="submit" value="Add Item" class="button"></a>
			</div>
			</div>
			<br/>

		
		</div>

			
	</div>
