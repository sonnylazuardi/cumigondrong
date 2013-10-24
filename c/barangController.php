<?php

class BarangController extends dasarController {
	public function index() {
		$model = new Barang();
		$array = $model->cariKategori();
		// echo "<pre>";
		// print_r($array);
		// echo "</pre>";
		foreach ($array as $item) {
			echo $item->nama . " ";
			echo $item->stok . "<br>";
		}

		// $result = $model->cariSemua("id_kategori=:id_kategori", array(":id_kategori"=>$id_kategori));
		// $jumlah = $model->jumlahSemua();
		// $hal = isset($_GET['halaman'])?$_GET['halaman']:1;
		// $count = 2;
		// $offset = ($hal-1) * $count;
		// $result = $model->cariSemua(null, null, $offset, $count);
		// if ($result == null) {
		// 	echo "Tidak ada hasil";
		// } else {
		// 	foreach ($result as $item) {
		// 		echo $item->nama;
		// 	}
		// }

		// $template = $this->brankas->template;
		// $template->paginasi($jumlah, $hal, $count);
		// $template->view = "barang";
		// $template->model = $model;
		// $template->show('layout');
	}
}