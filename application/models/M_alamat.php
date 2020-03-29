<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alamat extends CI_Model {

	function get_all_kecamatan(){
		return $this->db->get('tbl_kecamatan')->result_array();
	}
	function get_kecamatan($id){
		return $this->db->get_where('tbl_kecamatan', 'id='.$id)->row('kecamatan');
	}

	function get_all_kelurahan($id_kecamatan){
		return $this->db->get_where('tbl_kelurahan', 'id_kecamatan='.$id_kecamatan)->result_array();
	}
	function get_kelurahan($id){
		$ret1 = $this->db->get_where('tbl_kelurahan', 'id='.$id)->row('kelurahan');
		$ret2 = $this->db->get_where('tbl_kelurahan', 'id='.$id)->row('kd_pos');
		return $ret1.' ('.$ret2.')';
	}
}
