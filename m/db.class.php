<?php 

class Db {
	private static $instance = null;

	private function __construct() {

	}

	public static function getInstance() {
		if (!self::$instance)
		{
			self::$instance = new PDO("mysql:host=localhost;dbname=test_db", 'root', '');;
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$instance;
	}

	private function __clone() {
		
	}
}