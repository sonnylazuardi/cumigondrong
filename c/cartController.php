<?php 
class CartController extends dasarController{
	public function index()
	{
		/**dummy mode*/
		//misal barang yg udh dipilih dibeli kategori kulkas, meja, kursi
		$cart_cat = array('Kulkas', 'Meja', 'Kursi');

		$_SESSION['cart_cat']=$cart_cat;

		//contoh misal Kulkas dibeli tipe sinyoku, sanyo
		$cat_kulkas = array('Sanyo' => 3, 'Sinyoku' => 6 ); 
		$_SESSION['Kulkas']=$cat_kulkas;


		$cat_meja = array('chitose' => 1, 'cumi' => 7 ); 
		$_SESSION['Meja']=$cat_meja;

		$cat_kursi = array('ayomi' => 4, 'cokoro' => 4 ); 
		$_SESSION['Kursi']=$cat_kursi;
	
	//test case

//update trans
		//contoh update chitose jadi jumlah 2
		$_SESSION['Meja']['chitose']=2;

//insert new trans 2 case
		//contoh insert buff ke meja jumlah 1
		$_SESSION['Meja']['buff']=1;

//insert sesuatu baru + kategori baru
		//contoh kategori baju
		$ada = 0;
		foreach ($_SESSION['cart_cat'] as $key) {
			if ($key == 'baju'){
				$ada = 1;
			}
		}

		if ($ada == 0) array_push($_SESSION['cart_cat'], 'Baju');

		// $cat_baju = array('Gio' => 3);
		$_SESSION['Baju']['Gio'] = 3;

//delete trans 2 case 
		//contoh delete sanyo from cart
		array_splice($_SESSION['Kulkas'], 0,1);

		//terus delete Sinyoku
		array_splice($_SESSION['Kulkas'], 0,1);

//penanganan delete semua anak kategori itu
		if ($_SESSION['Kulkas'] == null){
			array_splice($_SESSION['cart_cat'], 0,1);
		}




	/**Debug Mode*/
		// echo "Detail barang:" . '<br/>';
		// $x = 0;
		// foreach ($_SESSION['cart_cat'] as $key => $value) {
		// 	if ($value != null){
		// 		$x++;
		// 		echo  '<br/>' . "$value" . '<br/>';
		// 			foreach ($_SESSION[$value] as $key2 => $value2){
		// 				echo "merk --> $key2 , Quantity = $value2 ";
		// 			}
		// 	}
		// }		
/**Debug Mode*/

		 $model = new Barang();
		 $template = $this->brankas->template;
		 $template->view = "cart";
		 $template->model = $model;
		 $template->show('layout');
	}

	/**not tested yet*/
	//input harus $Quantity >=0
	public function update($categ = 'Kulkas', $merk = 'Sanyo', $Quantity = 3){
		//under maintenance
		if ($Quantity <=0){//delete the merk
		
		}
		else{
		
		}


		//test case
//update trans
		//contoh update chitose jadi jumlah 2
		
		$_SESSION['Meja']['chitose']=2;

//insert new trans 2 case
		//contoh insert buff ke meja jumlah 1
		$_SESSION['Meja']['buff']=1;

//insert sesuatu baru + kategori baru
		//contoh kategori baju
		$ada = 0;
		foreach ($_SESSION['cart_cat'] as $key) {
			if ($key == 'baju'){
				$ada = 1;
			}
		}

		if ($ada == 0) array_push($_SESSION['cart_cat'], 'Baju');

		// $cat_baju = array('Gio' => 3);
		$_SESSION['Baju']['Gio'] = 3;

//delete trans 2 case 
		//contoh delete sanyo from cart
		array_splice($_SESSION['Kulkas'], 0,1);

		//terus delete Sinyoku
		array_splice($_SESSION['Kulkas'], 0,1);

//penanganan delete semua anak kategori itu
		if ($_SESSION['Kulkas'] == null){
			array_splice($_SESSION['cart_cat'], 0,1);
		}


	}
	
}
?>