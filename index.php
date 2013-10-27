<?php 

// Menentukan direktori utama
$direktori_utama = realpath(dirname(__FILE__));
define('__DIREKTORI_UTAMA', $direktori_utama);

// Memasukkan file mulai.php
include 'inc/mulai.php';

// membuat objek brankas router
$brankas->router = new Router($brankas);

// atur alamat path
$brankas->router->setPath(__DIREKTORI_UTAMA . '/c');

// load template
$brankas->template = new Template($brankas);

//mengecek cookie untuk login
Login::cekCookie();

// load controller
$brankas->router->loader();

