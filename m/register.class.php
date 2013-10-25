<?php

class Register extends FormRecord {
	protected $_fields = array(
		'username'=>'',
		'password'=>'',
		'confirm'=>'',
		'nama'=>'',
		'email'=>'',
		'alamat'=>'',
		'provinsi'=>'',
		'kota'=>'',
		'kodepos'=>'',
		'telepon'=>'',
	);
	public $error = array();
	public function validasi() {
    	$valid = true;
    	$this->error = array();
    	$username = $this->_fields['username'];
    	$password = $this->_fields['password'];
    	$confirm = $this->_fields['confirm'];
    	$nama = $this->_fields['nama'];
    	$email = $this->_fields['email'];
    	$alamat = $this->_fields['alamat'];
    	$provinsi = $this->_fields['provinsi'];
    	$kota = $this->_fields['kota'];
    	$kodepos = $this->_fields['kodepos'];
    	$telepon = $this->_fields['telepon'];
    	foreach ($this->_fields as $field=>$value) {
    		if ($value === "") {
    			$this->error[] = $field." tidak boleh kosong";
    			$valid = false;	
    		}
    	}
    	if ($username == $password) {
    		$this->error[] = "Username tidak boleh sama dengan Password";
    		$valid = false;
    	}
    	if (strlen($username) < 5) {
    		$this->error[] = "Username minimal 5 karakter";
    		$valid = false;
    	}
    	if ($password == $email) {
			$this->error[] = "Password tidak boleh sama dengan Email";
    		$valid = false;
    	}
    	if ($confirm != $password) {
    		$this->error[] = "Konfirmasi Password harus sama dengan Password";
    		$valid = false;
    	}
    	if (strpos($nama, ' ') === false) {
    		$this->error[] = "Nama Lengkap harus minimal mengandung satu spasi antara dua karakter (ada nama depan dan nama belakang)";
    		$valid = false;
    	}
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (strpos($email, '.') > (strlen($email)-3))) {
    		$this->error[] = "Email harus memiliki format XX@XX.YY (XX adalah satu karakter atau lebih, YY adalah dua karakter atau lebih)";
    		$valid = false;
    	}
    	if (!Account::isUsernameUnik($username)) {
    		$this->error[] = "Username tersebut sudah dipakai";
    		$valid = false;	
    	}
    	if (!Account::isEmailUnik($email)) {
    		$this->error[] = "Email tersebut sudah dipakai";
    		$valid = false;	
    	}
    	return $valid;
    }
}
