
	
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
							
				</div>

					<?php
					$array = $model->cariSemua();
					if ($array == null){
						$array = array();
					}
					$total = 0;

					$ind = 1;
					foreach ($array as $item) {
						if ((isset($_SESSION[$item->nama])) && ($_SESSION[$item->nama] > 0)){
								echo '<div class = "row">';
								echo '<div class = "list_body" id = "no">'. $ind . '</div>' ; 
								echo '<div class = "list_body" id = "item">'. $item->nama . '</div>' ; 
								echo '<div class = "list_body" id = "qty">'. $_SESSION[$item->nama] . '</div>' ; 
								$total_pars = $item->harga * $_SESSION[$item->nama];
								echo '<div class = "list_body" id = "price">'. $total_pars . '</div>' ; 
								if (isset($_SESSION[ 'msg' . $item->nama  ])){
									echo '<div class = "list_body" id = "msg">'. $_SESSION[ 'msg' . $item->nama  ] . '</div>' ; 									
								}
								else{
									echo '<div class = "list_body" id = "msg"></div>' ;	
								}

								$ind++;						
								$total = $total + $total_pars;
								echo '</div>'	;
						}
					}
					echo '<div class = "row">';
					echo "Total Pembayaran : $total";
					echo '</div><br/>'	;
					?>
					<div class = "row">
					<input type="btn" name="submit" value="Send" class="button">

					</div>
			</div>

					
		</div>

		

