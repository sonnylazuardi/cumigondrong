<?php  
class indexController extends dasarController {
	public function index() {
		$template = $this->brankas->template;
		$template->halo = "Selamat datang di MVC CumiGondrong";

		$template->show('index');
	}
	public function hello() {
		echo "Hello World";
	}
}