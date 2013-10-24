<?php  
class profileController extends dasarController {
	public function index() {
		$model = $this->loadAccount();

		$template = $this->brankas->template;
		$template->view = "profile";
		$template->model = $model;
		$template->show('layout');
	}
	public function edit() {
		$model = $this->loadAccount();
		if (isset($_POST['Profile'])) {
			$model->populasi($_POST['Profile'], array('nama','email','alamat','provinsi','kota','kodepos','telepon'));
			echo "hallo";
			echo $model->nama;
			$model->simpan();
			$this->redirect('profile/index');
		}
		$template = $this->brankas->template;
		$template->view = "profile_edit";
		$template->model = $model;
		$template->show('layout');	
	}

	public function loadAccount() {
		$model = new Account();
		$result = $model->cari('username=:u',array(':u'=>$_SESSION['account_id']));
		if (!$result) $this->redirect('index/login');
		return $model;
	}
}
