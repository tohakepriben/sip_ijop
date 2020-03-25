<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->has_userdata('level')){
			redirect('home');
		}
	}

	function index() {
		if($this->input->post('secret')==1){
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]', array(
				'required'		=> 'Tidak boleh kosong',
				'min_length' 	=> 'Minimal 5 karakter'
				));
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', array(
				'required'		=> 'Tidak boleh kosong',
				'valid_email' 	=> 'Format email tidak valid',
				'is_unique'     => 'Email sudah digunakan oleh pengguna lain'
				));
			$this->form_validation->set_rules('hp', 'hp', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[tbl_user.hp]', array(
				'required'		=> 'Tidak boleh kosong',
				'numeric' 		=> 'Harus angka',
				'min_length' 	=> 'Minimal 10 digit',
				'max_length' 	=> 'Maksimal 13 digit',
				'is_unique'     => 'No. HP sudah digunakan oleh pengguna lain'
				));

	        if ($this->form_validation->run()){
	        	$ret=$this->m_user->tambah();
				if($ret==TRUE){
					$this->session->set_flashdata('registrasi_sukses', TRUE);
					redirect(base_url());
				}elseif($ret=='email exists'){
					show_alert('Error: Email sudah digunakan oleh pengguna lain');
				}elseif($ret=='hp exists'){
					show_alert('Error: No. HP sudah digunakan oleh pengguna lain');
				}else{
					show_alert('Error menambahkan pengguna baru');
				}
			}
		}		
		$param['title'] = 'Daftar Pengguna Baru';
		$this->load->view('main', $param);
	}



}