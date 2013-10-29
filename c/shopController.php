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

	public function payment() {		

		//Check whether transaction success
		 $template = $this->brankas->template;
		 $template->view = "transaksiSelesai";

		 $model = new Barang();
		 $array = $model->cariSemua();
		 $template->isSuccess = true;

		 foreach ($array as $item) {
		 	if(isset($_SESSION[$item->nama])){ 
			 	if ($_SESSION[$item->nama] > 0){ 
			 		if ($_SESSION[$item->nama] > $item->stok){
						//transaction failed
						$template->isSuccess = false;
						// echo "Not works because" . $item->nama . " n = " . $_SESSION[$item->nama];
			 		}
			 	}
		 	}
		 }

		 if ($template->isSuccess){
		 	foreach ($array as $item) {
			 	if(isset($_SESSION[$item->nama])){ 
			 		unset($_SESSION[$item->nama]);			 		
			 	}
		 	}
		 }
		 $template->show('layout');

	}
}