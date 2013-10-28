<h1>Cart</h1>

<?php
		/**dummy dapat dilihat di cartController.php*/
		echo "Detail Pembelian barang:" . '<br/>';

		$array = $model->cariSemua();
		if ($array == null){
			$array = array();
		}
		$total = 0;
		foreach ($array as $item) {
			if ((isset($_SESSION[$item->nama])) && ($_SESSION[$item->nama] > 0)){
				echo $item->nama; echo " ";//nama item
				echo $_SESSION[$item->nama];//jumlah pesanan
				$total_pars = $item->harga * $_SESSION[$item->nama];
				echo "harga : $total_pars"; 
				echo "</br>";
				$total = $total + $total_pars;
			}
		}
		echo "Total akhir : $total";

?>