<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->has_userdata('level')){
			redirect('home');
		}
	}




}