<?php 

abstract class dasarController {
	protected $brankas;
	function __construct($brankas) {
		$this->brankas = $brankas;
	}
	abstract function index();
	public function redirect($loc) {
		header('Location: '.Template::getBaseUrl().'/'.$loc);
		exit;
	}
	public function isAjaxRequest() {
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	public function getParam($n = 0) {
		$data = $_SERVER['REQUEST_URI'];
		$dataarr = explode("/", $data);
		return $dataarr[count($dataarr)-$n-1];
	}
}