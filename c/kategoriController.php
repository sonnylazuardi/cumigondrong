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
		$hal = (isset($_GET['hal']) ? $_GET['hal'] : 1);
		$sort = (isset($_GET['sort']) ? $_GET['sort'] : null);
		if (!in_array($sort, array('nama asc', 'nama desc', 'harga asc', 'harga desc'))) $sort = null;
		$model = new Barang();
		$kategori = new Kategori();
		$data = null;
		$data = $this->getParam();
		if ($data!="view") {
			$model_data = $model->cariKategori($data, $hal, $sort);
			$total = $model->jumlahSemua('id_kategori=:i',array(':i'=>$data));
			$attrib = $kategori->getData($data);
			$template = $this->brankas->template;
			$template->paging = $template->paginasi($total, $hal, 10);
			$template->view = 'browse';
			$template->title = $attrib[0]->nama_kategori;
			$template->model = $model_data;
			$template->show('layout');
		}
	}
}