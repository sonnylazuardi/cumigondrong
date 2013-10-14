<?php 

class Router {
	private $brankas;
	private $path;
	private $args = array();
	public $file;
	public $controller;
	public $action;
	function __construct($brankas) {
		$this->brankas = $brankas;
	}
	function setPath($path) {
		// cek apakah path itu direktori atau bukan
		if (is_dir($path) == false) {
			die("Tidak ditemukan alamat `".$path."`");
		}
		// set path-nya
		$this->path = $path;
	}
	// Loading controller-nya
	public function loader() {
		// cek routenya bener atau nggak
		$this->getController();
		if (is_readable($this->file) == false)  {
			// echo $this->file;
			// Halaman tidak ditemukan
			die("404 Tidak Ditemukan");
		}

		// include controller
		include $this->file;

		// tambah sebuah instance kelas controller
		$class = $this->controller.'Controller';
		$controller = new $class($this->brankas);

		// cek apakan aksi dapat dipanggik
		if (is_callable(array($controller, $this->action)) == false) {
			$action = 'index';
		} else {
			$action = $this->action;
		}

		//jalankan aksi controller
		$controller->$action();
	}
	// dapatkan controller
	private function getController() {
		// dapatkan route dari url
		$route = (empty($_GET['alamat']) ? '' : $_GET['alamat']);

		// default route
		if (empty($route)) {
			$route = 'index';
		} else {
			// dapatkan bagian dari route
			$bagian = explode('/', $route);
			$this->controller = $bagian[0];
			if (isset($bagian[1])) {
				$this->action = $bagian[1];
			}
		}

		//default controller
		if (empty($this->controller)) {
			$this->controller = 'index';
		}

		//default aksi
		if (empty($this->action)) {
			$this->action = 'index';
		}

		//atur file path
		$this->file = $this->path . '/' . $this->controller . 'Controller.php';
	}
}