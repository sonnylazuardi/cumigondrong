<?php 

class Barang extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("barang", $key, $database);
    }
    public function cariKategori($kat_id, $hal, $sort) {
    	return $this->cariSemua('id_kategori=:kat_id',array('kat_id'=>$kat_id), ($hal-1)*10, 10, $sort);
    }
    public function cariID($_id) {
    	return $this->cariSemua('id=:_id',array('_id'=>$_id));
    }
    public function tripleBestCategory($kat_id) {
    	$array = $this->cariSemua('id_kategori=:kat_id',array('kat_id'=>$kat_id),0,3,'counter DESC');
    	$kategori = new Kategori();
    	$array['kat_data'] = $kategori->cariSemua('id=:_id',array('_id'=>$kat_id),0,1)[0];
    	return $array;
    }
}