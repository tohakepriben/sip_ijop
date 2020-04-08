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
		redirect('admin/approval');
	}

	function syarat_berkas() {
		$id_jenis_lembaga=$this->input->post('id_jenis_lembaga') ? $this->input->post('id_jenis_lembaga') : 1;
		$id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan') ? $this->input->post('id_jenis_pengajuan') : 1;
		$param['id_jenis_lembaga'] = $id_jenis_lembaga;
		$param['id_jenis_pengajuan'] = $id_jenis_pengajuan;
		
		$param['syarat_berkas'] = $this->m_berkas->get_syarat_berkas($id_jenis_lembaga,$id_jenis_pengajuan);
		$param['title'] = 'Pengaturan';
		$param['sub_title'] = 'Syarat-syarat Berkas';
		
		$this->load->view('main', $param);
	}

	function approval() {
		$param['arr_pengajuan'] = $this->m_pengajuan->get_all('p.status=2');
		$param['title'] = 'Approval Pengajuan';
		$param['sub_title'] = 'Data Pengajuan Ijop';
		$this->load->view('main', $param);
	}

	function pengajuan_diterima() {
		$param['arr_pengajuan'] = $this->m_pengajuan->get_all('p.status=4');
		$param['title'] = 'Pengajuan Diterima';
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