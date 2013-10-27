<?php

class BarangController extends dasarController {
	public function index() {
		$model = new Barang();
		$array = $model->cariSemua();
		$template = $this->brankas->template;
		$template->view = 'barang';
		$template->title = 'All Items';
		$template->model = $array;
		$template->show('layout');
	}

}