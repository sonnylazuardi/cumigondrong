<?php 
class ShopController extends dasarController{
	public function index()
	{
		 $model = new Barang();

		 $template = $this->brankas->template;
		 $template->view = "shop";
		 $template->model = $model;
		 $template->show('layout');
	}

}
?>