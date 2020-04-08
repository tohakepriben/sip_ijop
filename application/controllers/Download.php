<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Download extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper('download');
	}

	public function index() {
		$kind = $this->input->get('kind');
		if(is_null($kind)) redirect(base_url());
		$file='files/';
		if($kind=='berkas_pengajuan'){
			$id_user = $this->input->get('id_user');
	    	$id_pengajuan = $this->input->get('id_pengajuan');
			$file = $file.'persyaratan/'.$id_user.'/'.$id_pengajuan;
			$file = $file.'/'.$this->input->get('file');
		}elseif($kind=='instrumen'){
			$lembaga = $this->input->get('id_jenis_lembaga');
			$file = $file.'instrumen/'.$lembaga.'/'.$this->input->get('file');			
		}
		
		if(file_exists($file)){
			force_download($file, NULL);			
		}else{
			show_alert('Error: File tidak ditemukan'.$file);
		}
	}
}
?>