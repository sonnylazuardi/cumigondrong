<?php 

class Barang extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("barang", $key, $database);
    }
    public function cariKategori() {
    	$model = new $this();
    	return $model->cariSemua("id_kategori=0");
    }
}