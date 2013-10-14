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
}