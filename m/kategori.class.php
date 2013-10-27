<?php 

class Kategori extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("kategori", $key, $database);
    }
    public function getData($id) {
    	return $this->cariSemua('id=:_id',array('_id'=>$id));
    }
}