<?php 

class Db {
	private static $instance = null;

	private function __construct() {

	}

	public static function getInstance($brankas) {
		if (!self::$instance)
		{
			$myDb = $brankas->config['db'];
			self::$instance = new PDO($myDb['host'], $myDb['username'], $myDb['password']);
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$instance;
	}

	private function __clone() {
		
	}
}