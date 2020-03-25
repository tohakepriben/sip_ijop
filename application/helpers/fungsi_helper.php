<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

function login_admin($uname, $pwd){
	$ci		=&get_instance();
	$ret	=0;
	$user 	= $ci->m_auth->get_admin($uname);
	if($user['password'] == md5($pwd)){
		if($user['locked']==1){
			$ret=2;
		}else{
			$array = array(
				'tp' 		=> cur_tahun(),
				'nama' 		=> $user['nama'],
				'uname' 	=> $user['uname'],
				'level'		=> 1
			);
			$ci->session->set_userdata($array);
			$ret=1;				
		}
	}
	return($ret);
}

function login_ptk($uname, $pwd){
	$ci		=&get_instance();
	$ret	=0;
	$user 	= $ci->m_auth->get_ptk($uname);
	if($user['password'] == $pwd){
		if($user['locked']==1){
			$ret=2;
		}else{
			$array = array(
				'tp' 		=> cur_tahun(),
				'nama' 		=> $user['nama'],
				'uname' 	=> $user['nipy'],
				'level'		=> 2
			);
			$ci->session->set_userdata($array);
			$ret=1;				
		}
	}
	return($ret);
}

function upload_img($file, $dest){
	$ci=&get_instance();
    $config['upload_path']			= $dest;
    $config['encrypt_name']			= TRUE;
    $config['file_ext_tolower']		= TRUE;
	$config['max_size']				= 512;
	$config['max_width']			= 1024;
	$config['max_height']			= 768;
    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload($file)){
        return(FALSE);
    }else{
        return($ci->upload->data('file_name'));
    }
}

function upload_file($file, $dest){
	$ci=&get_instance();
    $config['upload_path']			= $dest;
    $config['encrypt_name']			= TRUE;
    $config['file_ext_tolower']		= TRUE;
	$config['max_size']				= 2048;
    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload($file)){
        return(FALSE);
    }else{
        return($ci->upload->data('file_name'));
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

