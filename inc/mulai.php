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
function __autoload($nama_c) {
	$namaFile = strtolower($nama_c) . '.class.php';
	$file = __DIREKTORI_UTAMA . '/m/' . $namaFile;

	// Jika tidak ditemukan modelnya
	if (file_exists($file) == false) {
		return false;
	}

	include ($file);
}

// membuat sebuah objek brankas baru
$brankas = new Brankas;

// membuat objek brankas db 
$brankas->db = Db::getInstance();

