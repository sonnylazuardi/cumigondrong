<?php  
class apiController extends dasarController {
	public function index() {

	}
	public function login() {
		if (isset($_REQUEST['Login'])) {
			$req = $_REQUEST['Login'];
			$model = new Login();
			$model->populasi($_POST['Login']);
			if ($account = $model->login()) {
				$_SESSION['account_id'] = $account->username;
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
		session_destroy();
		echo json_encode(array('success'=>true));	
	}
}