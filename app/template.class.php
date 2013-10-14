<?php 

class Template {
	private $brankas;
	private $vars = array();
	function __construct($brankas) {
		$this->brankas = $brankas;
	}
	public function __set($index, $value) {
		$this->vars[$index] = $value;
	}
	function show($name) {
		$path = __DIREKTORI_UTAMA . '/v/' . $name . '.php';
		// jika template tidak ditemukan
		if (file_exists($path) == false) {
			echo ("Template tidak ditemukan di ".$path);
			return false;
		}

		foreach ($this->vars as $key => $value) {
			$$key = $value;
		}

		include ($path);
	}
}