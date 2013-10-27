<?php 

class Credit extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("kredit", $key, $database);
    }
}