<?php  
class IndexController extends dasarController {
	public function index($effect = true) {
		$template = $this->brankas->template;
		$template->view = "browse";
		$template->effect = $effect;
		$template->show('layout');
	}
	public function home() {
		$this->index(false);
	}
	public function login() {
		$model = new Login();
		if (isset($_POST['Login'])) {
			$model->populasi($_POST['Login']);
			$account = $model->login();
			if ($account != null) {
				$this->redirect('index/home');
			}
		}
		$template = $this->brankas->template;
		$template->view = "login";
		$template->model = $model;
		$template->show('layout');
	}
	public function logout() {
		setcookie("auth_key", "", time() - 3600, '/');
		session_unset($_SESSION['account_id']);
		session_destroy();
		$this->redirect('index/home');
	}
	public function register() {
		$model = new Register();
		if (isset($_POST['Register'])) {
			$account = new Account();
			$model->populasi($_POST['Register']);
			if ($model->validasi()) {
				$account->populasi($_POST['Register'], array(
				'username', 'password', 'nama', 'email', 'alamat', 'provinsi', 'kota', 'kodepos', 'telepon'));
				$account->simpan();
				$this->redirect('index/login');	
			}
		}
		$template = $this->brankas->template;
		$template->view = "register";
		$template->model = $model;
		$template->show('layout');
	}
	public function addAccount() {
		$model = new Account();
		echo "<pre>";
		print_r($model->deskripsi());
		echo "</pre>";
	}

	// public function shop(){
	// 	$model = new Barang();
	// 	$template = $this->brankas->template;
	// 	$template->view = "shop";
	// 	$template->model = $model;
	// 	$template->show('layout');
	// }
}