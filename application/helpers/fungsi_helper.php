<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

function get_jns_lembaga($id){
	switch($id){
		case 1: $ret = 'Ponpes'; break;		
		case 2: $ret = 'MDTA'; break;		
		case 3: $ret = 'TPQ'; break;		
		default: $ret = NULL; break;
	}
	return $ret;
}
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
function get_jns_pengajuan($id){
	switch($id){
		case 1: $ret = 'Ijop Baru'; break;		
		case 2: $ret = 'Perpanjangan Ijop'; break;		
		default: $ret = NULL; break;
	}
	return $ret;
}

function del_folder2($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::del_folder2($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function del_folder($target) {
    if(is_dir($target)){
        $files = glob($target . '*', GLOB_MARK);
        foreach($files as $file){
            del_folder( $file );      
        }
        rmdir($target);
    }elseif(is_file($target)){
        unlink($target);  
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

