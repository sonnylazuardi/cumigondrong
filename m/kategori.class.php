<?php 

class Barang extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("kategori", $key, $database);
    }
}