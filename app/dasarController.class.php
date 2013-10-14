<?php 

abstract class dasarController {
	protected $brankas;
	function __construct($brankas) {
		$this->brankas = $brankas;
	}
	abstract function index();
}