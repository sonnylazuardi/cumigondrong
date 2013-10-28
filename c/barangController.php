<?php

class BarangController extends dasarController {


	public function index() {
		$model = new Barang();
		$array = $model->cariID($this->getParam());
		$template = $this->brankas->template;
		$template->view = 'barang';
		$template->model = $array[0];
		$template->show('layout');
	}

	public function update(){
		$quantity = $_POST['quantity'];
		$req_msg = $_POST['req_msg'];
		$id_barang = $_POST['id_barang'];
		$model = new Barang($id_barang);

				// $contain = 0;

				// if (!isset($_SESSION['cart_cat'])){
				// 	$_SESSION['cart_cat'] = array();
				// }

				// foreach ($_SESSION['cart_cat'] as $key) {
				// 	if ($key == $model->id_kategori){
				// 		$contain = 1;
				// 	}
				// }

				// if ($contain == 0) {
				// 	array_push($_SESSION['cart_cat'], $model->id_kategori);
				// }

				$_SESSION[$model->nama]= $quantity;
				$_SESSION[ "msg" . $model->nama] = $req_msg;
				
				 $this->redirect("cart/index");
	}

	public function delete(){
		$quantity = 0;
		$id_barang = $this->getParam();
		$model = new Barang($id_barang);

				// $contain = 0;

				// if (!isset($_SESSION['cart_cat'])){
				// 	$_SESSION['cart_cat'] = array();
				// }

				// foreach ($_SESSION['cart_cat'] as $key) {
				// 	if ($key == $model->id_kategori){
				// 		$contain = 1;
				// 	}
				// }

				// if ($contain == 0) {
				// 	array_push($_SESSION['cart_cat'], $model->id_kategori);
				// }

				$_SESSION[$model->nama]= $quantity;
				$_SESSION[ "msg" . $model->nama] = $req_msg;
				
				 $this->redirect("cart/index");
	}

}
?>	
