<?php 

class Account extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("account", $key, $database);
    }
}