<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {

	function ref_tambah_berkas($berkas, $file_ext){
		if($this->ref_nama_berkas_exists($berkas)) return('nama_berkas_exists');
		$arr_data = array(
			'berkas'	=> $berkas,
			'file_ext'	=> $file_ext
		);
		$this->db->insert('tbl_ref_berkas', $arr_data);
		
		$last_id = $this->db->insert_id();
		for($il=1;$il<=3;$il++){
			for($ip=1;$ip<=2;$ip++){
				$arr_data = array(
								'id_berkas' => $last_id, 
								'id_jenis_lembaga' => $il, 
								'id_jenis_pengajuan' => $ip
							);
				if($this->db->get_where('tbl_syarat_berkas', $arr_data)->num_rows()==0){
					$this->db->insert('tbl_syarat_berkas', $arr_data);
				}
			}			
		}
	}
	
	function ref_edit_berkas($id, $berkas, $file_ext){
		$old_berkas=$this->ref_get_detil_berkas($id,'berkas');
		if($berkas!=$old_berkas){
			if($this->ref_nama_berkas_exists($berkas)) return('nama_berkas_exists');			
		}
		$arr_data = array(
			'berkas'	=> $berkas,
			'file_ext'	=> $file_ext
		);
		$arr_where = array(
			'id'	=> $id
		);
		if($this->db->update('tbl_ref_berkas', $arr_data, $arr_where)) return(1);
		else return(0);
	}
	
	function ref_update_file_berkas($id, $field, $val){
		$arr_data=array(
			$field	=> $val
		);
		$arr_where=array(
			'id'	=> $id
		);
		return $this->db->update('tbl_ref_berkas', $arr_data, $arr_where);
	}

	function ref_nama_berkas_exists($nama){
		$arr_where=array('berkas' => $nama);
		return $this->db->get_where('tbl_ref_berkas', $arr_where)->num_rows() > 0;
	}

	function ref_get_detil_berkas($id, $filed){
		return $this->db->get_where('tbl_ref_berkas', 'id='.$id)->row($filed);
	}

	function simpan_syarat($id, $disyaratkan){
		$arr_data = array(
			'disyaratkan'	=> $disyaratkan
		);
		$arr_where = array(
			'id'	=> $id
		);
		return $this->db->update('tbl_syarat_berkas', $arr_data, $arr_where);
	}
	
	function get_istrumen(){
		$sql='SELECT r.*, s.disyaratkan, COUNT(s.disyaratkan) AS cnt_disyaratkan, s.id_jenis_lembaga
			FROM tbl_ref_berkas AS r
			INNER JOIN tbl_syarat_berkas AS s ON r.id = s.id_berkas
			WHERE s.disyaratkan = 1
			GROUP BY r.berkas
			ORDER BY r.id ASC';
		return $this->db->query($sql)->result_array();
	}

	function get_syarat_berkas($id_lembaga, $id_pengajuan){
		$sql = 'SELECT sy.*, ref.berkas, ref.file_ext, ref.file_1, ref.file_2, ref.file_3
				FROM tbl_ref_berkas AS ref
				INNER JOIN tbl_syarat_berkas AS sy ON ref.id = sy.id_berkas
				WHERE sy.id_jenis_lembaga = '.$id_lembaga.' AND
				sy.id_jenis_pengajuan = '.$id_pengajuan;
		return $this->db->query($sql)->result_array();
	}
		
	function berkas_exists($id_pengajuan, $id_berkas){
		$arr_where=array(
			'id_pengajuan'	=> $id_pengajuan,
			'id_berkas'		=> $id_berkas
		);
		return $this->db->get_where('tbl_upload_berkas', $arr_where)->row('file');
	}
	function pengajuan_add_berkas($id_pengajuan, $id_berkas, $file){
		$arr_data=array(
			'id_pengajuan'	=> $id_pengajuan,
			'id_berkas'		=> $id_berkas,
			'file'			=> $file
		);
		return $this->db->insert('tbl_upload_berkas', $arr_data);
	}
	function pengajuan_del_berkas($id_pengajuan, $id_berkas){
		$arr_where=array(
			'id_pengajuan'	=> $id_pengajuan,
			'id_berkas'		=> $id_berkas
		);
		return $this->db->delete('tbl_upload_berkas', $arr_where);
	}

}
