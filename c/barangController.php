<?php

class BarangController extends dasarController {
	public function index() {
		$model = new Barang();
		$array = $model->cariSemua();
		$template = $this->brankas->template;
		$template->view = 'barang';
		$template->model = $array;
		$template->show('layout');
	}

	public function view() {
		$model = new Barang();
		$data = null;
		$data = $this->getParam();
		if ($data!="view") $data = $model->cariKategori($data);
		$template = $this->brankas->template;
		
		$template->view = 'barang';
		$template->model = $data;
		$template->show('layout');
	}
}