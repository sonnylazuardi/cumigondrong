<?php 

class Template {
    private $brankas;
    private static $_baseUrl;
    private $vars = array();
    function __construct($brankas) {
        $this->brankas = $brankas;
    }
    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }
    //menampilkan view
    function show($name) {
        $path = __DIREKTORI_UTAMA . '/v/' . $name . '.php';
        // jika template tidak ditemukan
        if (file_exists($path) == false) {
            echo ("Template tidak ditemukan di ".$path);
            return false;
        }

        foreach ($this->vars as $key => $value) {
            $$key = $value;
        }

        include ($path);
    }
    //mengembalikan url relatif
    function makeUrl($path) {
        $path = trim($path, '/');
        return self::getBaseUrl().'/'.$path;
    }
    //mendapatkan baseurl
    static function getBaseUrl()
    {
        if(self::$_baseUrl===null) {
            $scriptName=basename($_SERVER['SCRIPT_FILENAME']);
            if(basename($_SERVER['SCRIPT_NAME'])===$scriptName)
                self::$_baseUrl=$_SERVER['SCRIPT_NAME'];
            elseif(basename($_SERVER['PHP_SELF'])===$scriptName)
                self::$_baseUrl=$_SERVER['PHP_SELF'];
            elseif(isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME'])===$scriptName)
                self::$_baseUrl=$_SERVER['ORIG_SCRIPT_NAME'];
            elseif(($pos=strpos($_SERVER['PHP_SELF'],'/'.$scriptName))!==false)
                self::$_baseUrl=substr($_SERVER['SCRIPT_NAME'],0,$pos).'/'.$scriptName;
            elseif(isset($_SERVER['DOCUMENT_ROOT']) && strpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['DOCUMENT_ROOT'])===0)
                self::$_baseUrl=str_replace('\\','/',str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
            else
                die("tidak bisa menentukan entry script url");
            self::$_baseUrl = rtrim(dirname(self::$_baseUrl),'\\/');
        }
        return self::$_baseUrl;
    }
    //apakah user sudah loggin?
    public function userLogged() {
        if (isset($_SESSION['account_id'])) {
            return $_SESSION['account_id'];
        } else {
            return null;
        }
    }

    public function paginasi($total, $hal, $count) {
        $jumHalaman = ceil($total / $count);
        $str = "<ul class='paginasi'>";
        $query = "";
        if (isset($_GET['q'])) {
            $query .= "&q=".$_GET['q'];
        }
        if (isset($_GET['sort'])) {
            $query .= "&sort=".$_GET['sort'];
        }
        for ($i=1; $i <= $jumHalaman; $i++) { 
            $str .= '<li>';
            if ($i == $hal)
                $str .= $i;
            else 
                $str .= '<a href="?hal=' .$i . $query . '">' . $i . '</a>';
            $str .= '</li>';
        }
        $str .= "<ul>";
        return $str;
    }
}
