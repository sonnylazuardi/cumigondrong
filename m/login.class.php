<?php

class Login extends FormRecord {
    protected $_fields = array(
        'username'=>'',
        'password'=>'',
    );
    public function login($rememberme = true) {
        $model = new Account();
        $res = $model->cari('username=:u AND password=:p', array(
            ':u'=>$this->username,
            ':p'=>$this->password
        ));
        if ($res != null) {
            $_SESSION['account_id'] = $res->username;
            if ($rememberme) {
                $cookie_auth = uniqid(rand(), true) . $res->username;
                $auth_key = md5('kavedansalvian'.$cookie_auth);
                $res->auth_key = $auth_key;
                $res->simpan();
                setcookie('auth_key', $auth_key, time() + 60 * 60 * 24 * 30, '/');
            }
        }
        return $res;
    }
    public static function cekCookie() {
        if(isset($_COOKIE['auth_key'])) {
            $auth_key = $_COOKIE['auth_key'];
            if(!isset($_SESSION['account_id'])) {
                // cari user dari database yang auth_key nya cocok (auth_key unik)
                $model = new Account();
                $res = $model->cari('auth_key = :a', array(':a'=>$auth_key));
                if ($res == null) {
                    setcookie("auth_key", "", time() - 3600, '/');
                } else {
                    $data = new Login();
                    $data->username = $res->username;
                    $data->password = $res->password;
                    $account = $data->login(false);
                }
            }
        }
    }
}
