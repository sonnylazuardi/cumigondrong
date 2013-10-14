<?php
// Kelas kontroller utama
include __DIREKTORI_UTAMA . '/app/' . 'dasarController.class.php';

// Tempat variabel global
include __DIREKTORI_UTAMA . '/app/' . 'brankas.class.php';

// Tempat router untuk menentukan kontroller yang dipanggil
include __DIREKTORI_UTAMA . '/app/' . 'router.class.php';

// Untuk template
include __DIREKTORI_UTAMA . '/app/' . 'template.class.php';

// autoload untuk model agar langsung bisa dipakai
function __autoload($class_name) {
	$namaFile = strtolower($class_name) . '.class.php';
	$file = __DIREKTORI_UTAMA . '/m/' . $namaFile;

	// Jika tidak ditemukan modelnya
	if (file_exists($file) == false) {
		return false;
	}

	require_once ($file);
}

// membuat sebuah objek brankas baru
$brankas = new Brankas;

// config brankas
$brankas->config = include(__DIREKTORI_UTAMA . '/inc/config.php');

// membuat objek brankas db 
$brankas->db = Db::getInstance($brankas);

ActiveRecord::setDefaultDBConnection(Db::getInstance($brankas));

session_start();