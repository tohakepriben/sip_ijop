<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Download extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if(!$this->session->has_userdata('level')){
			redirect('auth/logout');
		}
		$this->load->helper('download');
	}

	public function index() {
		$berkas = $this->input->get('berkas');
		$jenis = $this->input->get('jenis');
		$id = $this->input->get('id');
		
		$path = 'uploads/'.$berkas.'/'.$id.'/';
		
		if($jenis=='foto'){
			$fileName = $id.'.jpg';
			$file = $path.$fileName;
			
		}else{
			$fileName = $id.'_'.$jenis.'.pdf';
			$file = $path.$fileName;
		}
		
		if(file_exists($file)){
			force_download($file, NULL);			
		}else{
			show_alert('File tidak ditemukan');
		}
	}
}
?>