<?php

class Login extends FormRecord {
	protected $_fields = array(
		'username'=>'',
		'password'=>'',
	);
	public function login() {
		$model = new Account();
		$res = $model->cari('username=:u AND password=:p', array(
			':u'=>$this->_fields['username'],
			':p'=>$this->_fields['password']
		));
		return $res;
	}
}
