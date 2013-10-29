<?php  
class apiController extends dasarController {
	public function index() {

	}
	public function login() {
		if (isset($_REQUEST['Login'])) {
			$req = $_REQUEST['Login'];
			$model = new Login();
			$model->populasi($_POST['Login']);
			$account = $model->login();
			if ($account != null) {
				$res = array('success'=>true);	
			} else {
				$res = array('success'=>false);	
			}
			echo json_encode($res);
		} else {
			echo json_encode(array('success'=>false));
		}
	}
	public function logout() {
		setcookie("auth_key", "", time() - 3600, '/');
		session_unset($_SESSION['account_id']);
		session_destroy();
		echo json_encode(array('success'=>true));	
	}
	public function usernameAvailable() {
		$username = $_GET['username'];
		$ada = Account::isUsernameUnik($username);
		if ($ada) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false));
		}
	}
	public function emailAvailable() {
		$email = $_GET['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo json_encode(array("status"=>false));
			exit;
		}
		$ada = Account::isEmailUnik($email);
		if ($ada) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false));
		}
	}
	public function stokCukup() {
		$id_barang = $_GET['id_barang'];
		$quantity = $_GET['quantity'];
		$model = new Barang($id_barang);
		if ($quantity < $model->stok) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false));
		}
	}
	
	public function creditNumberValid() {
		$credit_number = $_GET['credit_number'];
		$valid = Credit::creditNumberValid($credit_number);
		if ($valid) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false));
		}
	}
	public function nameOfCardValid() {
		$name_of_card = $_GET['name_of_card'];
		$valid = Credit::nameOfCardValid($name_of_card);
		if ($valid) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false));
		}
	}
	public function checkCreditCard() {
		$credit_number = $_POST['Credit']['credit_number'];
		$name_of_card = $_POST['Credit']['name_of_card'];
		if (!Credit::creditNumberValid($credit_number)) {
			echo json_encode(array("success"=>false, "error"=>'Card Number sudah dipakai'));
		} else if (!Credit::nameOfCardValid($name_of_card)) {
			echo json_encode(array("success"=>false, "error"=>'Name of Card sudah dipakai'));
		} else {
			echo json_encode(array("success"=>true));
		}
	}
}