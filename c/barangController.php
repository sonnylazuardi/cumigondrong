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
		$kat = (isset($_GET['kat']) ? $_GET['kat'] : "");
		$h1 = (isset($_GET['h1']) ? $_GET['h1'] : "");
		$h2 = (isset($_GET['h2']) ? $_GET['h2'] : "");
		$hal = (isset($_GET['hal']) ? $_GET['hal'] : 1);
		$sort = (isset($_GET['sort']) ? $_GET['sort'] : null);
		if (!in_array($sort, array('nama asc', 'nama desc', 'harga asc', 'harga desc'))) $sort = null;
		$model = new Barang();
		$total = $model->jumlahSemua('(lower(nama) like :q) and (id_kategori = :kat or :kat = 0) and (harga between :h1 and :h2)', array(':q'=>'%'.strtolower($q).'%', ':kat'=>$kat, ':h1'=>$h1, ':h2'=>$h2), $sort);
		$res = $model->cariSemua('(lower(nama) like :q) and (id_kategori = :kat or :kat = 0) and (harga between :h1 and :h2)', array(':q'=>'%'.strtolower($q).'%', ':kat'=>$kat, ':h1'=>$h1, ':h2'=>$h2), ($hal-1)*10, 10, $sort);
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

				$_SESSION[$model->nama]= $quantity;

				//added to $_SESSION['dibeli']
				if (isset($_SESSION["dibeli"])){
					$isAda =false;
					foreach ($_SESSION["dibeli"] as $key ) {
						if ($key == $model->nama){
							$isAda =true;							
						}
					}
					if ($isAda == false){
						$arr =$_SESSION["dibeli"];
						array_push($arr, $model->nama);
						$_SESSION["dibeli"]=$arr;						
					}
				
				}
				else{
					$_SESSION["dibeli"] = array($model->nama);
				}

				$_SESSION[ "msg" . $model->nama] = $req_msg;
				
				 $this->redirect("cart/index");
	}

	public function delete(){
		$quantity = 0;
		$id_barang = $this->getParam();
		$model = new Barang($id_barang);

		$_SESSION[$model->nama]= $quantity;
		$_SESSION[ "msg" . $model->nama] = $req_msg;
				
		$this->redirect("cart/index");
	}
}	
