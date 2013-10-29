<?php 

class Order extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("order", $key, $database);
    }
}