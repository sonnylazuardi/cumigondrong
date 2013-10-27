<?php 

class Account extends ActiveRecord {
	public function __construct($key = null, $database = null){
        parent::__construct("account", $key, $database);
    }
    public static function isUsernameUnik($username) {
    	$model = new self();
    	$result = $model->cari("username=:username",array(":username"=>$username));
    	if ($result == null) {
    		return true;
    	} else {
    		return false;
    	}
    }
    public static function isEmailUnik($email) {
    	$model = new self();
    	$result = $model->cari("email=:email",array(":email"=>$email));
    	if ($result == null) {
    		return true;
    	} else {
    		return false;
    	}
    }
}