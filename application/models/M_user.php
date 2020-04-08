<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function get_user($email){
		return $this->db->get_where('tbl_user', 'email="'.$email.'"')->result_array();
	}

	function get_detil($email, $field){
		return $this->db->get_where('tbl_user', 'email="'.$email.'"')->row($field);
	}

	function get_detil_by_id($id, $field){
		return $this->db->get_where('tbl_user', 'id='.$id)->row($field);
	}

	function get_all(){
		return $this->db->get_where('tbl_user', 'level=2')->result_array();
	}

	function login($email, $hp){
		$arr_where=array(
			'email'		=> $email,
			'hp'		=> $hp
		);
		return $this->db->get_where('tbl_user', $arr_where)->num_rows() == 1;
	}

	function is_locked($email){
		return $this->db->get_where('tbl_user', 'email="'.$email.'"')->row('locked');
	}

	function lock($id, $val){
		$arr_data=array('locked' => $val);
		$arr_where=array('id' => $id);		
		return $this->db->update('tbl_user', $arr_data, $arr_where);
	}

	function update_log($email){
		$arr_data=array('last_login' => date('Y-m-d H:i:s'));
		$arr_where=array('email' => $email);		
		return $this->db->update('tbl_user', $arr_data, $arr_where);
	}
	
	function email_exists($email){
		$cnt = $this->db->get_where('tbl_user', 'email="'.$email.'"')->num_rows();
		return $cnt>0;
	}

	function hp_exists($hp){
		$cnt = $this->db->get_where('tbl_user', 'hp="'.$hp.'"')->num_rows();
		return $cnt>0;
	}

	function tambah(){
		if($this->email_exists($this->input->post('email'))) return 'email exists';
		if($this->hp_exists($this->input->post('hp'))) return 'hp exists';
		$array=array(
			'nama'				=> $this->input->post('nama'),
			'email'				=> $this->input->post('email'),
			'hp'				=> $this->input->post('hp')
		);
		if($this->db->insert('tbl_user', $array)){return 1;}else{return 0;
		}
	}	

	function ubah($email){
		$new_email=$this->input->post('email');
		$new_hp=$this->input->post('hp');
		$arr_data=array('nama' => $this->input->post('nama'));
		
		if($new_email!=''){
			if($new_email!=$email){
				if($this->email_exists($new_email)) return 'email exists';
				$arr_new=array('email' => $new_email);
				$arr_data = array_merge($arr_data, $arr_new);
			}
		}

		if($new_hp!=''){
			if($new_hp!=$this->get_detil($email, 'hp')){
				if($this->hp_exists($new_hp)) return 'hp exists';
				$arr_new=array('hp'	=> $new_hp);
				$arr_data = array_merge($arr_data, $arr_new);
			}
		}
		$arr_where=array('email' => $email);
		if($this->db->update('tbl_user', $arr_data, $arr_where)){return 'sukses';}else{return 'gagal';}				
	}
}
