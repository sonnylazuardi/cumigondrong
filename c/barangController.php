<?php

class BarangController extends dasarController {


	public function index() {
		$model = new Barang();
		$array = $model->cariID($this->getParam());
		if ($array == null) $this->redirect('index/home');
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
		$id_barang = $this->getParam();
		$model = new Barang($id_barang);

		$array = $_SESSION['dibeli'];
		if(($key = array_search($model->nama, $array)) !== false) {
		    unset($array[$key]);
		    $_SESSION['dibeli'] = $array;
		}

		$_SESSION['dibeli'] = $array;
		unset($_SESSION['msg'.$model->nama]);

		$this->redirect("cart/index");
	}
}	
