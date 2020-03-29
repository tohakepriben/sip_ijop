<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$param['title'] = 'Beranda';
		$param['sub_title'] = 'Sambutan Kasi PD Pontren Brebes';
		$param['jp_ponpes'] = $this->m_pengajuan->get_jumlah(1);
		$param['jp_mdta'] = $this->m_pengajuan->get_jumlah(2);
		$param['jp_tpq'] = $this->m_pengajuan->get_jumlah(3);
		$this->load->view('main', $param);
	}
	function info() {
		$param['title'] = 'Info dan Panduan';
		$param['sub_title'] = 'Tentang SIP Ijop';
		$this->load->view('main', $param);
	}

	function download_instrumen() {
		$param['instrumen'] = $this->m_berkas->get_istrumen();
		$param['title'] = 'Download';
		$param['sub_title'] = 'Download Instrumen Persyaratan';
		$this->load->view('main', $param);
	}
	
	function daftar() {
		if($this->session->has_userdata('level')) redirect(base_url());
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
				if($ret==1){
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
		$param['sub_title'] = 'Form Pengguna Baru';
		$this->load->view('main', $param);
	}

	function profil_saya() {
		$param['email_exists'] = '';
		$param['hp_exists'] = '';
		$param['email_hp_lama_invalid'] = FALSE;
		if($this->input->post('secret')==1){
			if($this->input->post('email_lama')=='' || $this->input->post('hp_lama')==''){
				$param['email_hp_lama_invalid'] = TRUE;
			}elseif($this->input->post('email_lama')<>$this->session->userdata('email') ||
				$this->input->post('hp_lama')<>$this->session->userdata('hp')){
				$param['email_hp_lama_invalid'] = TRUE;
			}else{
				$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]', array(
					'required'		=> 'Tidak boleh kosong',
					'min_length' 	=> 'Minimal 5 karakter'
					));
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email', array(
					'valid_email' 	=> 'Format email tidak valid'
					));
				$this->form_validation->set_rules('hp', 'hp', 'trim|numeric|min_length[10]|max_length[13]', array(
					'numeric' 		=> 'Harus angka',
					'min_length' 	=> 'Minimal 10 digit',
					'max_length' 	=> 'Maksimal 13 digit'
					));

		        if ($this->form_validation->run()){
		        	$ret=$this->m_user->ubah($this->session->userdata('email'));
					if($ret=='sukses'){
						$this->session->set_userdata('nama', $this->input->post('nama'));
						if($this->input->post('email')!='') $this->session->set_userdata('email', $this->input->post('email'));
						if($this->input->post('hp')!='') $this->session->set_userdata('hp', $this->input->post('hp'));
						$this->session->set_flashdata('update_profil_sukses', TRUE);
						redirect(base_url());
					}elseif($ret=='email exists'){
						$param['email_exists'] = 'Email sudah digunakan oleh pengguna lain';
					}elseif($ret=='hp exists'){
						$param['hp_exists'] = 'No. HP sudah digunakan oleh pengguna lain';
					}else{
						show_alert('Error: Gagal menyimpan perubahan');
					}
				}
					
			}
		}		
		$param['title'] = 'Profil Saya';
		$param['sub_title'] = 'Edit Profil';
		$param['nama'] = $this->session->userdata('nama');
		$param['last_login'] = $this->m_user->get_detil($this->session->userdata('email'),'last_login');
		$this->load->view('main', $param);
	}
}
?>