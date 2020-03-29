<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function tambah_pengajuan(){
    	$jenis_lembaga = $this->input->post('jenis_lembaga');
    	$jenis_pengajuan = $this->input->post('jenis_pengajuan');
    	if($this->m_pengajuan->tambah($jenis_lembaga, $jenis_pengajuan)){
			echo 1;
		}
    }

    function hapus_pengajuan(){
    	$id_user = $this->input->post('id_user');
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	if($this->m_pengajuan->hapus_pengajuan($id_pengajuan)){
    		del_folder2('./files/persyaratan/'.$id_user.'/'.$id_pengajuan.'/');
			echo 1;
		}
    }

    function tolak_terima_pengajuan(){
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	$keterangan = $this->input->post('keterangan');
    	$tolak_terima = $this->input->post('tolak_terima');
    	if($this->m_pengajuan->tolak_terima($id_pengajuan, $tolak_terima, $keterangan)){
			echo 1;
		}
    }

    function ajukan_permohonan(){
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	if($this->m_pengajuan->ajukan_permohonan($id_pengajuan)){
			echo 1;
		}
    }

	function get_all_kelurahan($id_kecamatan){
		$row = $this->db->get_where('tbl_kelurahan', 'id_kecamatan='.$id_kecamatan)->result_array();
		$response = array();
		foreach($row as $r){
		    array_push($response,
				array(
		    		'id'			=> $r['id'],
		    		'kelurahan'		=> $r['kelurahan'],
		    		'kd_pos'		=> $r['kd_pos']
		    	)
		    );   
		}
		echo json_encode($response);
		
	}

	function get_persyaratan(){
    	$jenis_lembaga = $this->input->post('jenis_lembaga');
    	$jenis_pengajuan = $this->input->post('jenis_pengajuan');
		$row = $this->m_berkas->get_syarat_berkas($jenis_lembaga,$jenis_pengajuan);
		$response = array();
		foreach($row as $r){
		    array_push($response,
				array(
		    		'id'			=> $r['id'],
		    		'id_berkas'		=> $r['id_berkas'],
		    		'berkas'		=> $r['berkas'],
		    		'disyaratkan'	=> $r['disyaratkan']
		    	)
		    );   
		}
		echo json_encode($response);		
	}
	function simpan_persyaratan(){
    	$arr_data = $this->input->post('arr_data');
		if($this->m_berkas->simpan_persyaratan($arr_data)){echo 1;}else{echo 0;}
	}

	function lock_user(){
		if($this->m_user->lock($this->input->post('id'), $this->input->post('val'))){echo 1;}else{echo 0;}
	}

	function update_data_lembaga(){
    	$arr_data = array(
    		'nama_lembaga'	=> $this->input->post('nama_lembaga'),
			'tahun_berdiri'	=> $this->input->post('tahun_berdiri'),
			'nama_pimpinan'	=> $this->input->post('nama_pimpinan'),
			'hp'			=> $this->input->post('hp'),
			'nama_yayasan'	=> $this->input->post('nama_yayasan'),
			'id_kecamatan'	=> $this->input->post('id_kecamatan'),
			'id_kelurahan'	=> $this->input->post('id_kelurahan'),
			'jalan_gang'	=> $this->input->post('jalan_gang'),
			'dukuh'			=> $this->input->post('dukuh'),
			'rt'			=> $this->input->post('rt'),
			'rw'			=> $this->input->post('rw')
    	);
    	$arr_where = array(
			'id'			=> $this->input->post('id')
    	);
		if($this->m_pengajuan->update_data_lembaga($arr_data, $arr_where)) echo 1;
	}

    function upload_berkas_persyaratan(){
    	$id_user = $this->session->userdata('id_user');
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	$id_berkas = $this->input->post('id_berkas');
    	
    	$uploaded_file = explode('.', $this->input->post('file_name'));
    	$uploaded_file_ext = end($uploaded_file);
		
		$file_name = $id_user.'-'.$id_pengajuan.'-'.$id_berkas.'.'.$uploaded_file_ext;
    	
    	$lokasi = './files/persyaratan/'.$id_user.'/'.$id_pengajuan.'/';
		if (!file_exists($lokasi)) {
		    mkdir($lokasi, 0777, TRUE);
		}  
		  	
    	$config = array(
    		'upload_path'		=> $lokasi,
    		'file_name'			=> $file_name,
    		'allowed_types'		=> $this->input->post('file_type'),
    		'file_ext_tolower'	=> TRUE,
    		'max_size'			=> 1000,
    		'overwrite'			=> TRUE
    	);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_data')){
            echo $this->upload->display_errors('', '');
        }else{
        	if($this->m_berkas->add_berkas($id_pengajuan, $id_berkas, $file_name)){
				echo 1;
			}else{
				echo 'Error: Gagal menyimpan berkas';
			}
            
        }
    }	

    function hapus_berkas_persyaratan(){
    	$id_user = $this->input->post('id_user');
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	$file_name = $this->input->post('file_name');
    	$arr = explode('-',$file_name);
    	$this->m_berkas->del_berkas($arr[1],$arr[2]);
    	
    	$file_name = 'files/persyaratan/'.$id_user.'/'.$id_pengajuan.'/'.$file_name;
        if(file_exists($file_name)){
            unlink($file_name);
			echo 1;
        }
    }	
    
    function get_bln_pengajuan(){
		echo json_encode($this->m_pengajuan->get_bln_pengajuan());
	}
	
	function get_jumlah_pengajuan_by_bulan($id_lembaga, $bulan, $where_status){
		echo $this->m_pengajuan->get_jumlah_by_bulan($id_lembaga, $bulan, 'status='.$where_status);
	}
	
	function get_jumlah_pengajuan($id_lembaga, $id_pengajuan, $where_status){
		echo $this->m_pengajuan->get_jumlah($id_lembaga, $id_pengajuan, 'status='.$where_status);
	}
}
?>