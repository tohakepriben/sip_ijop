<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
	}


	function index(){
		$level=$this->session->userdata('level');
		$param['title'] = 'Login';
		$this->load->view('login', $param);
	}

	function login(){
		$email 	= $this->input->post('email');
		$hp	= $this->input->post('hp');
		if($this->m_user->login($email, $hp)){
			if($this->m_user->is_locked($email)){
				echo 'locked';
			}else{
				$new_data = array(
					'nama'	=> $this->m_user->get_detil_user($email, 'nama'),
					'level'	=> $this->m_user->get_detil_user($email, 'level'),
					'email' => $email,
					'hp'	=> $hp
				);
				$this->session->set_userdata($new_data);
				$this->session->set_flashdata('login_sukses', TRUE);
				echo 1;
			}
		}else{
			echo FALSE;
		}
		
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}