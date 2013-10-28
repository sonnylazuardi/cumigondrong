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
		$model = new Barang();
		$kategori = new Kategori();
		$data = null;
		$data = $this->getParam();
		if ($data!="view") {
			$model_data = $model->cariKategori($data);
			$attrib = $kategori->getData($data);
			$template = $this->brankas->template;
			$template->view = 'browse';
			$template->attribute = $attrib[0];
			$template->model = $model_data;
			$template->show('layout');
		}
	}
}