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
}