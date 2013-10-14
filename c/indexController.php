<?php  
class indexController extends dasarController {
	public function index() {
		$template = $this->brankas->template;
		$template->view = "index";
		$template->show('layout');
	}
	public function login() {
		$model = new Login();
		if (isset($_POST['Login'])) {
			$model->populasi($_POST['Login']);
			if ($account = $model->login()) {
				$_SESSION['account_id'] = $account->username;
				$this->redirect('index/index');	
			}
		}
		$template = $this->brankas->template;
		$template->view = "login";
		$template->model = $model;
		$template->show('layout');
	}
	public function logout() {
		session_destroy();
		$this->redirect('index/index');
	}
	public function register() {
		$model = new Register();
		if (isset($_POST['Register'])) {
			$req = $_POST['Register'];
			$account = new Account();
			$account->username = $req['username'];
			$account->password = $req['password'];
			$account->nama = $req['nama'];
			$account->email = $req['email'];
			$account->alamat = $req['alamat'];
			$account->provinsi = $req['provinsi'];
			$account->kota = $req['kota'];
			$account->kodepos = $req['kodepos'];
			$account->telepon = $req['telepon'];

			$account->commit();
			$this->redirect('index/login');
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
}