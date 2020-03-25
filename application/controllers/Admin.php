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
		$param['title'] = 'Dashboard';
		$this->load->view('admin/main', $param);
	}

	function lembaga() {
		$uri3=$this->uri->segment(3);
		if($uri3=='profil'){
			$param['title'] = 'Profil PKBM';
			$this->load->view('admin/main', $param);			

		}elseif($uri3=='layanan'){
			if($this->input->post('secret')=='tambah'){
				$this->m_layanan->insert();
			}elseif($this->input->post('secret')=='edit'){
				$this->m_layanan->update($this->input->post('id'));
			}
			$param['title'] = 'Program dan Layanan';
			$this->load->view('admin/main', $param);			
			
		}else{
			redirect('lembaga/profil');
		}
	}

	function tutor() {
		$uri3=$this->uri->segment(3);
		if($uri3=='aktif'){
			$str='Tutor Aktif';
			
		}elseif($uri3=='nonaktif'){
			$str='Tutor Nonaktif';
			
		}elseif($uri3=='tambah'){
			if($this->input->post('secret')==1){
				if($this->m_tutor->tambah()){
					redirect('admin/tutor/aktif');
				}
			}		
			$str='Tambah Tutor';
		
		}elseif($uri3=='edit'){
			if($this->input->post('secret')==1){
				if($this->m_tutor->edit($this->uri->segment(4))){
					redirect('admin/tutor/aktif');
				}
			}		
			$str='Edit Tutor';

		}elseif($uri3=='update_pengangkatan'){
			show_alert($this->input->post('secret'));
			if($this->input->post('secret')==1){
				$this->m_tutor->update_pengangkatan();
			}		
			redirect('admin/tutor/aktif');

		}else{
			redirect('admin/tutor/aktif');			
		}
		
		$param['title'] = $str;
		$this->load->view('admin/main', $param);
	}

	function wb() {
		$uri3=$this->uri->segment(3);
		$str='';
		if($uri3=='aktif'){
			$str='Warga Belajar Aktif';
		}elseif($uri3=='nonaktif'){
			$str='Warga Belajar Nonaktif';
		}elseif($uri3=='tambah'){
			if($this->input->post('secret')==1){
				/*Cek Validasi*/
				$this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|exact_length[10]', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('nik', 'nik', 'required|trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('hp', 'hp', 'trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));

                if ($this->form_validation->run()){
					if($this->m_wb->tambah()){
						redirect('admin/wb/aktif');
					}else{
						show_alert('error insert');
					}
                }else{
					show_alert('eror validasi');
				}
			}
			$str='Tambah Warga Belajar';

		}elseif($uri3=='edit'){			
			if($this->input->post('secret')==1){
				/*Cek Validasi*/
				$this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|exact_length[10]', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('nik', 'nik', 'required|trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('hp', 'hp', 'trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));
				$this->form_validation->set_rules('nama', 'Nama', 'trim|numeric', array(
					'numeric' => 'Harus angka',
					'exact_length' => 'harus 10 digit'
					));

                if ($this->form_validation->run()){
					if($this->m_wb->edit($this->uri->segment(4))){
						redirect('admin/wb/aktif');						
					}
                }				
			}
			$str='Edit Warga Belajar';
		}else{
			redirect('admin/wb/aktif');
		}
		$param['title'] = $str;
		$this->load->view('admin/main', $param);
	}

	function kelas() {
		$id_kelas=$this->uri->segment(3);
		if($this->input->post('secret')=='nilai'){
			//edit nilai
			$this->m_nilai->edit_nilai_kelas($id_kelas);
			redirect('admin/kelas/'.$id_kelas);
		}else{
			$param['title'] = 'Kelas';
			$this->load->view('admin/main', $param);			
		}
	}

	function pengaturan() {
		$uri3=$this->uri->segment(3);
		$uri4=$this->uri->segment(4);
		if($uri3=='pengumuman'){
			if($uri4=='tambah'){
				if($this->input->post('secret')==1){
					$this->m_pengumuman->insert();
//					show_alert('sukses');
					redirect('admin/pengaturan/pengumuman');
				}
				$param['title'] = 'Tambah Pengumuman';
				
			}elseif($uri4=='edit'){			
				if($this->input->post('secret')==1){
					$this->m_pengumuman->update($this->uri->segment(5));
					redirect('admin/pengaturan/pengumuman');
				}
				$param['title'] = 'Edit Pengumuman';
				
			}else{
				$param['title'] = 'Pengaturan Pengumuman';
			}	
		}elseif($uri3=='kelas'){			
			$param['title'] = 'Pengaturan Kelas';
			
		}elseif($uri3=='user'){
			$param['title'] = 'Pengaturan User';
			
		}elseif($uri3=='pembayaran'){
			$param['title'] = 'Pengaturan Pembayaran';
		}
		$this->load->view('admin/main', $param);
	}

	function chat() {
		$param['title'] = 'Chat User';
		$this->load->view('admin/main', $param);			
	}

}
?>