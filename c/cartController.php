<?php 
class CartController extends dasarController{
	public function index()
	{
		 $model = new Barang();
		 $template = $this->brankas->template;
		 $template->view = "cart";
		 $template->model = $model;
		 $template->show('layout');
	}

}
?>