<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	function ref_tambah_berkas(){
		$berkas = $this->input->post('berkas');
		$file_ext = $this->input->post('file_ext');
		if(trim($berkas)=='' || trim($file_ext)==''){
			echo 'belum lengkap';
		}else{
			echo $this->m_berkas->ref_tambah_berkas($berkas, $file_ext);			
		}
	}
	
	function ref_edit_berkas(){
		$id = $this->input->post('id');
		$berkas = $this->input->post('berkas');
		$file_ext = $this->input->post('file_ext');
		if(trim($berkas)=='' || trim($file_ext)==''){
			echo 'belum lengkap';
		}else{
			echo $this->m_berkas->ref_edit_berkas($id, $berkas, $file_ext);
		}
	}

	function ref_hapus_file_berkas(){
		$id = $this->input->post('id');
		$id_lembaga = $this->input->post('id_lembaga');
    	if($this->m_berkas->ref_update_file_berkas($id, 'file_'.$id_lembaga, '')){
			$file = $this->input->post('file');
	    	$file_path = 'files/instrumen/'.$id_lembaga;
	        if(file_exists($file_path.'/'.$file)) unlink($file_path.'/'.$file);
			echo 1;
		}else{
			echo 'Error: Gagal menghapus berkas';
		}


	}

	function simpan_syarat(){
		if($this->m_berkas->simpan_syarat($this->input->post('id'), $this->input->post('disyaratkan'))) echo 1;
	}

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
    		rrmdir('./files/persyaratan/'.$id_user.'/'.$id_pengajuan.'/');
			echo 1;
		}
    }

    function tolak_terima_pengajuan(){
    	$id_pengajuan = $this->input->post('id_pengajuan');
    	$keterangan = $this->input->post('keterangan');
    	$tolak_terima = $this->input->post('tolak_terima');
		$id_user = $this->input->post('id_user');
		$email_user = $this->m_user->get_detil_by_id($id_user, 'email');


    	if($this->m_pengajuan->tolak_terima($id_pengajuan, $tolak_terima, $keterangan)){

			$subject = 'Pengajuan Ijop Diterima';
			if($tolak_terima=='tolak') $subject = 'Pengajuan Ijop Ditolak';
			
	        $nama_user = $this->m_user->get_detil_by_id(
	        			$this->m_pengajuan->get_detil($id_pengajuan, 'id_user'), 'nama');
			$jenis_lembaga = get_jns_lembaga($this->m_pengajuan->get_detil($id_pengajuan, 'id_jenis_lembaga'));
			$jenis_pengajuan = get_jns_pengajuan($this->m_pengajuan->get_detil($id_pengajuan, 'id_jenis_pengajuan'));
			$nama_lembaga = $this->m_pengajuan->get_detil($id_pengajuan, 'nama_lembaga');
			$tgl_pengajuan = $this->m_pengajuan->get_detil($id_pengajuan, 'tgl_pengajuan');
			
	        $pesan = '<div style="font-size: 14px">Assalamu&apos;alaikum Wr. Wb.<br /><br />';
	        $pesan = $pesan.'Yth. '.$nama_user.'. Pengajuan '.$jenis_pengajuan.' untuk '.$jenis_lembaga.' '.$nama_lembaga.' tertanggal '.$tgl_pengajuan;
	        $pesan = $pesan.' di'.$tolak_terima.' dengan keterangan sebagai berikut:<br /><br />';
	        $pesan = $pesan.'<code><strong>'.$keterangan.'</strong></code><br /><br />';
	        $pesan = $pesan.'Wassalamu&apos;alaikum Wr. Wb.<br /><br />';
	        $pesan = $pesan.'Admin Sip Ijop</div>';

	        $this->load->library('email', config_email());
	        
	        $this->email->from('pd.pontren.bbs@gmail.com', 'sipijop.com');
	        $this->email->to($email_user);
	        $this->email->subject($subject);
	        $this->email->message($pesan);

	        if($this->email->send()) echo 1; else echo 0;
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
		    		'file_ext'		=> $r['file_ext'],
		    		'disyaratkan'	=> $r['disyaratkan']
		    	)
		    );   
		}
		echo json_encode($response);		
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

    function upload_berkas_instrumen(){
    	$id_lembaga = $this->input->post('id_lembaga');
    	$id_berkas = $this->input->post('id_berkas');
    	
    	$uploaded_file = explode('.', $this->input->post('file_name'));
    	$uploaded_file_ext = end($uploaded_file);
		
		$file_name = get_jns_lembaga($id_lembaga)
			.'_'
			.fix_file_name($this->m_berkas->ref_get_detil_berkas($id_berkas, 'berkas'))
			.'.'
			.$uploaded_file_ext;
    	
    	$lokasi = './files/instrumen/'.$id_lembaga.'/';
		if (!file_exists($lokasi)) {
		    mkdir($lokasi, 0777, TRUE);
		}  
		
		$file_ext=$this->m_berkas->ref_get_detil_berkas($id_berkas, 'file_ext');
		if($file_ext=='pdf') $file_ext=$file_ext.'|doc|docx';
		
    	$config = array(
    		'upload_path'		=> $lokasi,
    		'file_name'			=> $file_name,
    		'allowed_types'		=> $file_ext,
    		'file_ext_tolower'	=> TRUE,
    		'max_size'			=> 1024,
    		'overwrite'			=> TRUE
    	);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_data')){
            echo $this->upload->display_errors('', '');
            //echo $id_berkas.'-'.$this->m_berkas->ref_get_detil_berkas($id_berkas, 'file_ext');
        }else{
        	if($this->m_berkas->ref_update_file_berkas($id_berkas, 'file_'.$id_lembaga, $file_name)){
				echo 1;
			}else{
				echo 'Error: Gagal menyimpan berkas';
			}
            
        }
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
    		'max_size'			=> 1024,
    		'overwrite'			=> TRUE
    	);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_data')){
            echo $this->upload->display_errors('', '');
        }else{
        	if($this->m_berkas->pengajuan_add_berkas($id_pengajuan, $id_berkas, $file_name)){
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
    	$this->m_berkas->pengajuan_del_berkas($arr[1],$arr[2]);
    	
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