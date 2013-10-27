<h1>Cart</h1>

<?php
		/**dummy dapat dilihat di cartController.php*/
		echo "Detail Pembelian barang:" . '<br/>';
		$x = 0;
		foreach ($_SESSION['cart_cat'] as $key => $value) {
			if ($value != null){
				$x++;
				echo  '<br/>' . "$value" . '<br/>';
					foreach ($_SESSION[$value] as $key2 => $value2){
						echo "merk --> $key2 , Quantity = $value2 " . '<br/>';
					}
			}
		}		

?>