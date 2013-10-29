<?php 

class OrderItem extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("order_item", $key, $database);
    }
}