<?php

class KategoriController extends dasarController {
	public function index() {
		$model = new Kategori();
		$array = $model->cariSemua();
		$template = $this->brankas->template;
		$_page = $this->getParam();
		
		if (is_int($_page)) $template->page = $_page;
			else
				$template->page = 1;
		$template->view = 'kategori';
		$template->model = $array;
		$template->show('layout');
	}

	public function view() {
		$model = new Kategori();
		$data = null;
		$data = $this->getParam();
		if (is_int($data)) $data = $model->cariKategori($data);
		$template = $this->brankas->template;
		$template->view = 'barang';
		$template->model = $data;
		$template->show('layout');
	}
}