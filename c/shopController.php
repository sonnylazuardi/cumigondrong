<?php 
class ShopController extends dasarController{
	public function index()
	{
	
	}

	public function payment() {		


		//Check whether transaction success
		 $template = $this->brankas->template;
		 $template->isSuccess = true;
		 $template->view = "transaksiSelesai";
		 if (!$template->userLogged()){
		 	 $this->redirect("index/register");
		 }
		 $model = new Barang();
		 $array = (isset($_SESSION["dibeli"]) ? $_SESSION['dibeli'] : null);
		 if ($array == null){
		 	$template->isSuccess = false;
		 	$template->errorMsg = "Tidak ada barang yang dibeli";
		 	$template->show('layout');
		 }else{
		 	$total = 0;
			 foreach ($array as $item) {
			 	$data = new Barang();
				$brg = $data->cari('nama=:n',array(':n'=>$item));
			 	if(isset($_SESSION[$item])){ 
				 	if ($_SESSION[$item] > 0){ 
				 		if ($_SESSION[$item] > $brg->stok){
							//transaction failed
							$total += $brg->harga*$_SESSION[$item];
							$template->isSuccess = false;
							$template->errorMsg = "Barang yang anda pesan tidak tersedia";
				 		}
				 	}
			 	}
			 }

			 $_SESSION['total_shopping'] = $total;

			 if ($template->isSuccess){
			 	$data2 = new Account();
			 	$account = $data2->cari('username=:n',array(':n'=>$template->userLogged()));
				$order = new Order();
				$order->id_account = $account->id;
				$order->total = $_SESSION['total_shopping'];
				$order->simpan();
			 	foreach ($array as $x) {
				 	if(isset($_SESSION[$x])){ 
				 		$data = new Barang();
				 		$brg = $data->cari('nama=:n',array(':n'=>$x));

				 		$order_item = new OrderItem();
						$order_item->id_order = $order->id;
						$order_item->id_barang = $brg->id;
						$order_item->jumlah = $_SESSION[$x];
						$order_item->tambahan = $_SESSION['msg'.$x];
						$order_item->simpan();

						$brg->stok -= $_SESSION[$x];
						$brg->counter += $_SESSION[$x];
						$brg->simpan();

			 			unset($_SESSION[$x]);
			 			unset($_SESSION['msg'.$x]);
			 		}
			 	}
			 	unset($_SESSION['dibeli']);
			 	unset($_SESSION['total_shopping']);
			 }
			 $template->show('layout');
		}
	}
}
