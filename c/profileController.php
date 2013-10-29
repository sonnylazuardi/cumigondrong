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
			$model->populasi($_POST['Profile'], array('nama','email','alamat','password','provinsi','kota','kodepos','telepon'));
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
		if (!$result) $this->redirect('index/register');
		return $model;
	}

	public function credit() {
		$edit=isset($_GET['edit']);
		$redirect=(isset($_GET['redirect']) ? $_GET['redirect'] : 'profile/index');
		
		$account = $this->loadAccount();

		$model = new Credit();
		$res = $model->cari('id_account=:i', array(':i'=>$account->id));
		$template = $this->brankas->template;

		if ($res == null) {
			$model = new Credit();
			$model->id_account = $account->id;
			$model->name_of_card = $account->nama;
			$model->expired_date = date('Y-m-d');
			$template->sudahSet = false;
		} else {
			$template->sudahSet = true;
			if (!$edit) $this->redirect($redirect);
		}
		if (isset($_POST['Credit'])) {
			$model->populasi($_POST['Credit'], array('card_number', 'name_of_card', 'expired_date'));
			$model->simpan();
			$this->redirect($redirect);
		}
		
		$template->view = "credit";
		$template->model = $model;
		$template->show('layout');
	}
}
