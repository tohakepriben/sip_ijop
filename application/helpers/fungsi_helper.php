<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

function get_status($id_status){
	switch($id_status){
		case 1: $ret = 'Belum Diajukan'; break;		
		case 2: $ret = 'Menunggu Validasi'; break;		
		case 3: $ret = 'Ditolak'; break;		
		case 4: $ret = 'Diterima'; break;		
		default: $ret = NULL; break;
	}
	return $ret;
}

function get_jns_lembaga($id){
	switch($id){
		case 1: $ret = 'Ponpes'; break;		
		case 2: $ret = 'MDTA'; break;		
		case 3: $ret = 'TPQ'; break;		
		default: $ret = NULL; break;
	}
	return $ret;
}

function get_jns_pengajuan($id){
	switch($id){
		case 1: $ret = 'Ijop Baru'; break;		
		case 2: $ret = 'Perpanjangan Ijop'; break;		
		default: $ret = NULL; break;
	}
	return $ret;
}

function rrmdir($dir) { 
	if (is_dir($dir)) { 
		$objects = scandir($dir);
		foreach ($objects as $object) { 
			if ($object != "." && $object != "..") { 
				if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) rrmdir($dir. DIRECTORY_SEPARATOR .$object);
				else unlink($dir. DIRECTORY_SEPARATOR .$object); 
			} 
		}
		rmdir($dir); 
	} 
}
 
function geturi($segmen){
	return($this->uri->segment($segmen));
}

function show_alert($msg) {
	echo '<script type="text/javascript">';
	echo 'alert("' . $msg . '");';
	echo '</script>';
}

function back() {
	echo '<script type="text/javascript">';
	echo 'javascript:history.back();';
	echo '</script>';
}

function format_rp($angka){
//	$ret = "Rp " . number_format($angka,2,',','.');
	$ret = number_format($angka,0,',','.');
	return $ret;
}

function is_localhost() {
	$whitelist = array('127.0.0.1', "::1");
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function get_nama_bulan($id, $disingkat=FALSE){
	switch($id){
		case 1: $ret = 'Januari'; break;		
		case 2: $ret = 'Februari'; break;		
		case 3: $ret = 'Maret'; break;		
		case 4: $ret = 'April'; break;		
		case 5: $ret = 'Mei'; break;		
		case 6: $ret = 'Juni'; break;		
		case 7: $ret = 'Juli'; break;		
		case 8: $ret = 'Agustus'; break;		
		case 9: $ret = 'September'; break;		
		case 10: $ret = 'Oktoben'; break;		
		case 11: $ret = 'November'; break;		
		case 12: $ret = 'Desember'; break;		
		default: $ret = 'Januari'; break;
	}
	if($disingkat) $ret=$ret.substr(0,2);
	return $ret;
}
function fix_file_name($file_name) {
	$ret = str_replace('/','',$file_name);
	$ret = str_replace(' ','_',$ret);
	$ret = str_replace('__','_',$ret);
	$ret = strtolower($ret);
    return $ret;
}

function config_email(){
	$config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'pdpontrenbbs@gmail.com',  // Email gmail
        'smtp_pass'   => 'pdpontren2020',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];
    return $config;
}
