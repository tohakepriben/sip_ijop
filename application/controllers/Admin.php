<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('level')<>1){
			redirect('auth/logout');
		}
	}

	function index() {
		redirect('admin/syarat_berkas');
	}

	function syarat_berkas() {
		$param['syarat_berkas'] = $this->m_berkas->get_syarat_berkas(1,1);
		$param['title'] = 'Pengaturan';
		$param['sub_title'] = 'Syarat-syarat Berkas';
		$this->load->view('main', $param);
	}

	function data_pengajuan() {
		$param['arr_pengajuan'] = $this->m_pengajuan->get_all('p.status=2 or p.status=4');
		$param['title'] = 'Data Pengajuan';
		$param['sub_title'] = 'Data Pengajuan Ijop';
		$this->load->view('main', $param);
	}

	function lihat_pengajuan($id) {
		$param['data_pengajuan'] = $this->m_pengajuan->get_by_id($id);
		$param['kecamatan'] = $this->m_alamat->get_all_kecamatan();
		$param['title'] = 'Lihat Pengajuan';
		$param['sub_title'] = 'Detil Pengajuan';
		$this->load->view('main', $param);
	}

	function pengguna() {
		$param['pengguna'] = $this->m_user->get_all();
		$param['title'] = 'Pengaturan';
		$param['sub_title'] = 'Data Pengguna';
		$this->load->view('main', $param);
	}

}
?>