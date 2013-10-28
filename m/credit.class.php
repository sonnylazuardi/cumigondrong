<?php 

class Credit extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("kredit", $key, $database);
    }
    public static function creditNumberValid($credit_number) {
    	$model = new self();
    	$result = $model->cari("card_number=:c",array(":c"=>$credit_number));
    	if ($result == null) {
    		return true;
    	} else {
    		return false;
    	}
    }
    public static function nameOfCardValid($name_of_card) {
    	$model = new self();
    	$result = $model->cari("name_of_card=:c",array(":c"=>$name_of_card));
    	if ($result == null) {
    		return true;
    	} else {
    		return false;
    	}
    }
}