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
		$q = (isset($_GET['q']) ? $_GET['q'] : "");
		$hal = (isset($_GET['hal']) ? $_GET['hal'] : 1);
		$sort = (isset($_GET['sort']) ? $_GET['sort'] : null);
		$model = new Barang();
		$total = $model->jumlahSemua('lower(nama) like :q or lower(kategori.nama_kategori) like :q or harga = :n', array(':q'=>'%'.strtolower($q).'%', ':n'=>$q), $sort, 'left join kategori on barang.id_kategori = kategori.id');
		$res = $model->cariSemua('lower(nama) like :q or lower(kategori.nama_kategori) like :q or harga = :n', array(':q'=>'%'.strtolower($q).'%', ':n'=>$q), ($hal-1)*10, 10, $sort, 'barang.*', 'left join kategori on barang.id_kategori = kategori.id');

		$template = $this->brankas->template;
		$template->paging = $template->paginasi($total, $hal, 10);
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

				$contain = 0;

				if (!isset($_SESSION['cart_cat'])){
					$_SESSION['cart_cat'] = array();
				}

				foreach ($_SESSION['cart_cat'] as $key) {
					if ($key == $model->id_kategori){
						$contain = 1;
					}
				}

				if ($contain == 0) {
					array_push($_SESSION['cart_cat'], $model->id_kategori);
				}

				$_SESSION[$model->nama]= $quantity;
				$_SESSION[ "msg" . $model->nama] = $req_msg;
				
				// $this->redirect("barang/" . $id_barang);
				 $this->redirect("cart/index");
	}

	public function delete(){
		$quantity = 0;
		$id_barang = $this->getParam();
		$model = new Barang($id_barang);

				$contain = 0;

				if (!isset($_SESSION['cart_cat'])){
					$_SESSION['cart_cat'] = array();
				}

				foreach ($_SESSION['cart_cat'] as $key) {
					if ($key == $model->id_kategori){
						$contain = 1;
					}
				}

				if ($contain == 0) {
					array_push($_SESSION['cart_cat'], $model->id_kategori);
				}

				$_SESSION[$model->nama]= $quantity;
				$_SESSION[ "msg" . $model->nama] = $req_msg;
				
				 $this->redirect("cart/index");
	}

}	


	
