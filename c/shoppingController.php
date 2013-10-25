<?php 
class ShoppingController extends dasarController{
	public function index()
	{
		$model = new Barang();
		
		$template = $this->brankas->template;
		$template->view = "shopBag";
		$template->model = $model;
		$template->show('layout');

	}


	public function updateBagContent() {
		foreach ($_POST['bag'] as $key => $value) {
			echo $key . "=>". $value. "<br>";
		}
	}	

	
}
?>