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
		if ($quantity <= $model->stok && $quantity >= 0) {
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false, "stok"=>$model->stok));
		}
	}
	public function changeQuantity() {
		$nama_barang = $_GET['nama_barang'];
		$quantity = $_GET['quantity'];
		$model = new Barang();
		$model = $model->cari('nama=:a',array(':a'=>$nama_barang));
		if ($quantity <= $model->stok && $quantity >= 0) {
			if(isset($_SESSION[$nama_barang]))
			$_SESSION[$nama_barang] = $quantity;
			echo json_encode(array("status"=>true));
		} else {
			echo json_encode(array("status"=>false, "stok"=>$model->stok));
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
	public function gambar_calendar(){
		$month = (isset($_GET['month'])? $_GET['month'] : date('n'));
		$year = (isset($_GET['year'])? $_GET['year'] : date('Y'));
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
		$headings = array('Min','Sen','Sel','Rab','Kam','Jum','Sab');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
		$calendar.= '<tr class="calendar-row">';

		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar.= '<td class="calendar-day">';
				$calendar.= '<div class="day-number"><a href="#" onclick="changeDate(\''.$year.'-'.$month.'-'.$list_day.'\')" id="cal-'.$list_day.'">'.$list_day.'</a></div>';
				// $calendar.= str_repeat('<p> </p>',2);
			$calendar.= '</td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;
		$calendar.= '</tr>';
		$calendar.= '</table>';
		echo $calendar;
	}
}