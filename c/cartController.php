<?php 
class CartController extends dasarController{
	public function index()
	{
		$model = new Barang();
		$template = $this->brankas->template;
		if ($template->userLogged()){
				 $template->view = "cart";
				 $template->model = $model;
				 $template->show('layout');			
		} else {
			$this->redirect("index/register");
		}
	}
}
?>