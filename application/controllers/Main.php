<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$param['title'] = 'Beranda';
		$this->load->view('main', $param);
	}
	function alur_pengajuan() {
		$param['title'] = 'Alur Pengajuan';
		$this->load->view('main', $param);
	}

}
?>