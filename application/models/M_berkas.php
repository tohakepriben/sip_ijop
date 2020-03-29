<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {

	function get_istrumen(){
		return $this->db->get('tbl_ref_berkas')->result_array();
	}

	function get_syarat_berkas($id_lembaga, $id_pengajuan){
		$sql = 'SELECT sy.*, ref.berkas
				FROM tbl_ref_berkas AS ref
				INNER JOIN tbl_syarat_berkas AS sy ON ref.id = sy.id_berkas
				WHERE sy.id_jenis_lembaga = '.$id_lembaga.' AND
				sy.id_jenis_pengajuan = '.$id_pengajuan;
		return $this->db->query($sql)->result_array();
	}
	
	
	function simpan_persyaratan($arr_data){
		$data = explode('|', $arr_data);
		foreach($data as $data2){
			if(is_null($data2)) return TRUE;
			$data3 = explode('-', $data2);
			foreach($data3 as $d){
				$arr1 = array('disyaratkan' => $data3[1]);
				$arr2 = array('id' => $data3[0]);
				if(!$this->db->update('tbl_syarat_berkas', $arr1, $arr2)){
					return FALSE;
				}
			}
		}
		return TRUE;
	}
	function get_nama_berkas($id){
		return $this->db->get_where('tbl_ref_berkas', 'id='.$id)->row('berkas');
	}

	function berkas_exists($id_pengajuan, $id_berkas){
		$arr_where=array(
			'id_pengajuan'		=> $id_pengajuan,
			'id_berkas'		=> $id_berkas
		);
		return $this->db->get_where('tbl_upload_berkas', $arr_where)->row('file');
	}
	function add_berkas($id_pengajuan, $id_berkas, $file){
		$arr_data=array(
			'id_pengajuan'	=> $id_pengajuan,
			'id_berkas'		=> $id_berkas,
			'file'			=> $file
		);
		return $this->db->insert('tbl_upload_berkas', $arr_data);
	}
	function del_berkas($id_pengajuan, $id_berkas){
		$arr_where=array(
			'id_pengajuan'	=> $id_pengajuan,
			'id_berkas'		=> $id_berkas
		);
		return $this->db->delete('tbl_upload_berkas', $arr_where);
	}
}
