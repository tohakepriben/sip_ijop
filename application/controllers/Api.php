<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function get_user($uname){
		$response= array();
		$row = $this->m_user->get_user($uname);

		foreach($row as $r){
		    array_push($response,
				array(
		    		'id'		=> $r['id'],
		    		'nama'		=> $r['nama'],
		    		'uname'		=> $r['uname']
		    	)
		    );   
		}
		echo json_encode($response);		
	}
	
	function update_user(){
		if($this->m_user->update_user($this->session->userdata('uname'))){
			echo TRUE;
		}else{
			echo FALSE;
		}
	}
	
	function get_layanan() {
		$response= array();
		$row = $this->m_layanan->get_all();

		foreach($row as $r){
		    array_push($response,
				array(
		    		'id'		=> $r['id'],
		    		'layanan'	=> $r['layanan']
		    	)
		    );   
		}
		echo json_encode($response);
	}

	function get_tutor() {
		$response= array();
		$row = $this->m_tutor->get_aktif();

		foreach($row as $r){
		    array_push($response,
				array(
		    		'nipy'		=> $r['nipy'],
		    		'nama'	=> $r['nama']
		    	)
		    );   
		}
		echo json_encode($response);
	}
	function get_kelas() {
		$response= array();
		$row = $this->m_kelas->get_all($this->input->get('id_layanan'));

		foreach($row as $r){
		    array_push($response,
				array(
		    		'id'	=> $r['id'],
		    		'kelas'	=> $r['kelas']
		    	)
		    );   
		}
		echo json_encode($response);
	}
	function hapus_pengumuman($id_pengumuman){
		if($this->session->userdata('level')==1){
			echo json_encode(
					array(
						'return'	=> $this->m_pengumuman->hapus($id_pengumuman)
					)
				);
			
		}
	}

	function update_pengangkatan(){
		if($this->session->userdata('level')==1){
			 if($this->m_tutor->update_pengangkatan()){
			 	echo('sukses');
			 }
			
		}
	}
	
	function update_pembayaran(){
		if($this->session->userdata('level')==1){
			$hasil=$this->m_adm->update_pembayaran();
			echo $hasil;			
		}
	}

	function hapus_pembayaran(){
		if($this->session->userdata('level')==1){
			$hasil=$this->m_adm->hapus_pembayaran($this->uri->segment(3));
			echo $hasil;			
		}
	}
	
	function get_anggota_kelas($id_kelas){
		$response= array();
		$row = $this->m_kelas->get_anggota($id_kelas);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'niwb'			=> $r['niwb'],
		    		'nama'			=> $r['nama'],
		    		'jk'			=> $r['jk'],
		    		'tanggal_lahir'	=> $r['tanggal_lahir'],
		    		'alamat'		=> $r['alamat']
		    	)
		    );   
		}
		echo json_encode($response);
	}

	function get_pembelajaran_kelas($id_kelas){
		$response= array();
		$row = $this->m_kelas->get_pembelajaran($id_kelas);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'id'			=> $r['id'],
		    		'id_kelas'		=> $r['id_kelas'],
		    		'kelas'			=> $r['kelas'],
		    		'id_mapel'		=> $r['id_mapel'],
		    		'mapel'			=> $r['mapel'],
		    		'nipy'			=> $r['nipy'],
		    		'nama'			=> $r['nama'],
		    		'sk_tutor'		=> $r['sk_tutor']
		    	)
		    );   
		}
		echo json_encode($response);		
	}
	
	function get_wb_belum_masuk_kelas(){
		$response= array();
		$row = $this->m_wb->get_aktif(FALSE);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'niwb'			=> $r['niwb'],
		    		'nama'			=> $r['nama'],
		    		'jk'			=> $r['jk'],
		    		'ttl'			=> $r['ttl'],
		    		'alamat'		=> $r['alamat'],
		    		'ayah_nama'		=> $r['ayah_nama'],
		    		'ibu_nama'		=> $r['ibu_nama']
		    	)
		    );   
		}
		echo json_encode($response);
	}
	
	function tambah_anggota_kelas(){
		if($this->session->userdata('level')==1){
			$id_kelas=$this->input->get('id_kelas');
			$niwb=$this->input->get('niwb');
			$hasil = $this->m_kelas->tambah_anggota($id_kelas, $niwb);
			echo $hasil;
		}
	}

	function hapus_anggota_kelas(){
		if($this->session->userdata('level')==1){
			$id_kelas=$this->input->get('id_kelas');
			$niwb=$this->input->get('niwb');
			$hasil = $this->m_kelas->hapus_anggota($id_kelas, $niwb);
			echo $hasil;
		}
	}

	function tambah_kelas(){
		if($this->session->userdata('level')==1){
			$hasil = $this->m_kelas->insert();
			echo $hasil;
		}
	}
	function edit_kelas($id_kelas){
		if($this->session->userdata('level')==1){
			$hasil = $this->m_kelas->update($id_kelas);
			echo $hasil;
		}
	}
	function hapus_kelas($id_kelas){
		if($this->session->userdata('level')==1){
			$hasil = $this->m_kelas->delete($id_kelas);
			if($hasil){
				echo TRUE;
			}else{
				echo 'Gagal menghapus kelas';
			}
		}
	}
	function get_mapel_belum_masuk_kelas($id_kelas){
		$response= array();
		$row = $this->m_kelas->get_mapel_belum_masuk_kelas($id_kelas);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'id'			=> $r['id'],
		    		'mapel'			=> $r['mapel']
		    	)
		    );   
		}
		echo json_encode($response);
	}
	
	function tambah_pembelajaran_kelas(){
		if($this->m_kelas->tambah_pembelajaran()){
			echo TRUE;
		}else{
			echo FALSE;
		}
	}

	function edit_pembelajaran_kelas(){
		if($this->m_kelas->edit_pembelajaran()){
			echo TRUE;
		}else{
			echo FALSE;
		}
	}

	function hapus_pembelajaran_kelas(){
		if($this->m_kelas->hapus_pembelajaran()){
			echo TRUE;
		}else{
			echo FALSE;
		}
	}

	function get_adm_by_layanan($id_layanan){
		$response= array();
		$row = $this->m_adm->get_adm_by_layanan($id_layanan);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'id'			=> $r['id'],
		    		'pembayaran'	=> $r['pembayaran'],
		    		'nominal'		=> $r['nominal']
		    	)
		    );   
		}
		echo json_encode($response);
		
	}
	function get_riwayat_pembayaran($niwb){
		$response= array();
		$row = $this->m_adm->get_riwayat_pembayaran($niwb);
		$no=1;
		foreach($row as $r){
		    array_push($response,
				array(
		    		'no'			=> $no++,
		    		'id'			=> $r['id'],
		    		'niwb'			=> $r['niwb'],
		    		'tanggal'		=> $r['tanggal'],
		    		'bayar'			=> $r['bayar'],
		    		'ket'			=> $r['ket'],
		    		'id_adm'		=> $r['id_adm'],
		    		'pembayaran'	=> $r['pembayaran']
		    	)
		    );   
		}
		echo json_encode($response);
		
	}

	function get_adm_terbayar(){
		$id_adm = $this->input->get('id_adm');
		$niwb = $this->input->get('niwb');
		$ret=$this->m_adm->get_adm_terbayar($id_adm, $niwb);
		if($ret<0){
			$ret=0;
		}
		echo $ret;		
	}

	function simpan_pembayaran_wb(){
		$ret=$this->m_adm->simpan_pembayaran_wb();
		if($ret<0){
			$ret=0;
		}
		echo $ret;		
	}
	
    function upload_wb(){
    	$upload_path = $this->input->post('upload_path');
		if (!file_exists($upload_path)) {
		    mkdir($upload_path, 0777);
		}    	
    	$config = array(
    		'upload_path'		=> $upload_path,
    		'file_name'			=> $this->input->post('file_name'),
    		'allowed_types'		=> $this->input->post('file_type'),
    		'file_ext_tolower'	=> TRUE,
    		'max_size'			=> 500,
    		'overwrite'			=> TRUE
    	);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_data')){
            echo $this->upload->display_errors();
        }else{
            echo "sukses";
        }
    }	
    function hapus_berkas_wb(){
    	$niwb = $this->input->post('niwb');
    	$file_name = $this->input->post('file_name');
    	$file_name = 'uploads/wb/' . $niwb . '/' . $file_name;
        if(file_exists($file_name)){
            unlink($file_name);
            echo 'sukses';
        }else{
            echo $file_name;
        }
    }	
}
?>