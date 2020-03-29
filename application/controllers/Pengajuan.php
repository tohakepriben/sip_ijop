<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		redirect('alur_pengajuan');
	}

	function alur_pengajuan() {
		$param['title'] = 'Alur Pengajuan';
		$param['sub_title'] = 'Alur Pengajuan SK Ijop';
		$this->load->view('main', $param);
	}

	function pengajuan_saya() {
		if($this->session->userdata('level') <> 2){
			redirect(base_url());
		}
		$param['data_pengajuan'] = $this->m_pengajuan->get_by_user($this->session->userdata('id_user'));
		$param['title'] = 'Pengajuan Saya';
		$param['sub_title'] = 'Data Pengajuan Saya';
		$this->load->view('main', $param);
	}

	function edit_pengajuan($id) {
		if(!$this->session->has_userdata('level')){
			redirect(base_url());
		}
		$param['data_pengajuan'] = $this->m_pengajuan->get_by_id($id);
		$param['kecamatan'] = $this->m_alamat->get_all_kecamatan();
		$param['title'] = 'Edit Pengajuan';
		$param['sub_title'] = 'Detil Pengajuan';
		$this->load->view('main', $param);
	}

	function data_pengajuan() {
		if($this->session->userdata('level') <> 1){
			redirect(base_url());
		}
		$param['title'] = 'Data Pengajuan';
		$param['sub_title'] = 'Data Pengajuan SK Ijop';
		$this->load->view('main', $param);
	}
}
?>