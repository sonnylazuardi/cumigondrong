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
	public function search() {
		$q = (isset($_GET['q']) ? $_GET['q'] : null);
		$kat = (isset($_GET['kat']) ? $_GET['kat'] : null);
		$h1 = (isset($_GET['h1']) ? $_GET['h1'] : null);
		$h2 = (isset($_GET['h2']) ? $_GET['h2'] : null);
		$hal = (isset($_GET['hal']) ? $_GET['hal'] : 1);
		$sort = (isset($_GET['sort']) ? $_GET['sort'] : null);
		if (!in_array($sort, array('nama asc', 'nama desc', 'harga asc', 'harga desc'))) $sort = null;
		$model = new Barang();
		$first = true;
		$params = array();
		$sql = "";
		if ($q != null) {
			if (!$first) $sql .= ' and '; else $first = false;
			$sql .= '(lower(nama) like :q)';
			$params[':q'] = '%'.strtolower($q).'%';
		}
		if ($kat > 0) {
			if (!$first) $sql .= ' and '; else $first = false;
			$sql .= '(id_kategori = :kat)';
			$params[':kat'] = $kat;
		}
		if ($h1 != null) {
			if (!$first) $sql .= ' and '; else $first = false;
			$sql .= '(harga >= :h1)';
			$params[':h1'] = $h1;
		}
		if ($h2 != null) {
			if (!$first) $sql .= ' and '; else $first = false;
			$sql .= '(harga <= :h2)';
			$params[':h2'] = $h2;
		}
		$total = $model->jumlahSemua($sql, $params, $sort);
		$res = $model->cariSemua($sql, $params, ($hal-1)*10, 10, $sort);
		$template = $this->brankas->template;
		$template->paging = $template->paginasi($total, $hal, 10);
		$template->search_show = true;
		$template->view = 'browse';
		$template->title = 'Search';
		$template->model = $res;
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
