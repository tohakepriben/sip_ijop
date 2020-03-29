<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengajuan extends CI_Model {

	function get_all($where_status = 'p.status>0'){
		$sql = 'SELECT p.*, u.nama AS nama_user, u.email AS email_user, u.hp AS hp_user
			FROM tbl_pengajuan AS p
			INNER JOIN tbl_user AS u ON p.id_user = u.id
			WHERE '.$where_status.' ORDER BY p.tgl_pengajuan ASC';
		return $this->db->query($sql)->result_array();
	}
	function get_jumlah($id_lembaga, $id_pengajuan = 0, $where_status = 'status>1'){
		$sql='select id from tbl_pengajuan where id_jenis_lembaga='.$id_lembaga.' and '.$where_status;
		if($id_pengajuan!=0){
			$sql=$sql.' and id_jenis_pengajuan='.$id_pengajuan;
		}
		return $this->db->query($sql)->num_rows();		
	}
	
	function get_by_id($id){
		return $this->db->get_where('tbl_pengajuan', 'id='.$id)->result_array();
	}
	
	function get_by_user($id_user){
		return $this->db->get_where('tbl_pengajuan', 'id_user='.$id_user)->result_array();
	}

	function tambah($id_jenis_lembaga, $id_jenis_pengajuan){
		$array=array(
			'id_user'				=> $this->session->userdata('id_user'),
			'id_jenis_lembaga'		=> $id_jenis_lembaga,
			'id_jenis_pengajuan'	=> $id_jenis_pengajuan,
			'keterangan'			=> '-'
		);
		return $this->db->insert('tbl_pengajuan', $array);
	}

	function hapus_pengajuan($id){
		$arr_where=array('id' => $id);
		return $this->db->delete('tbl_pengajuan', $arr_where);
	}

	function tolak_terima($id, $tolak_terima, $keterangan){
		$arr_data=array(
			'status' 		=> ($tolak_terima=='tolak' ? 3 : 4),
			'tgl_respon'	=> date('Y-m-d H:i:s'),
			'keterangan' 	=> $keterangan
		);
		$arr_where=array('id' => $id);
		return $this->db->update('tbl_pengajuan', $arr_data, $arr_where);
	}
	
	function update_data_lembaga($data, $where){
		return $this->db->update('tbl_pengajuan', $data, $where);
	}
	
	function ajukan_permohonan($id){
		$arr_data=array(
			'status' 		=> 2,
			'tgl_pengajuan'	=> date('Y-m-d H:i:s'),
			'keterangan' 	=> '-'
		);
		$arr_where=array('id' => $id);
		return $this->db->update('tbl_pengajuan', $arr_data, $arr_where);
	}

	function get_persyaratan($id_jenis_lembaga, $id_jenis_pengajuan){
		$sql = 'SELECT sy.*, ref.berkas, ref.file_ext 
			FROM tbl_ref_berkas AS ref
			INNER JOIN tbl_syarat_berkas AS sy ON ref.id = sy.id_berkas
			WHERE
			sy.id_jenis_lembaga = '.$id_jenis_lembaga.' AND 
			sy.id_jenis_pengajuan = '.$id_jenis_pengajuan.' AND 
			sy.disyaratkan = 1';
		return $this->db->query($sql)->result_array();
	}

	function hitung_prosen($id){
		$data_pengajuan = $this->get_by_id($id);
		$kelengkapan_lembaga=0;
		$kelengkapan_berkas=0;
		$pros1; $pros2;
		$cnt1; $cnt2;
		
		foreach($data_pengajuan as $r):
			$cnt1 = count($r);
			foreach($r as $r2){
				if($r2!='')$kelengkapan_lembaga++;
			}
			$pros1 = ($kelengkapan_lembaga / $cnt1) * 100;
			
            $get_persyaratan = $this->get_persyaratan($r['id_jenis_lembaga'], $r['id_jenis_pengajuan']);
			$cnt2 = count($get_persyaratan);
            foreach($get_persyaratan as $p): 
                $file=$this->m_berkas->berkas_exists($r['id'],$p['id_berkas']);
				if($file!='')$kelengkapan_berkas++;				
            endforeach;
			$pros2 = ($kelengkapan_berkas / $cnt2) * 100;
		endforeach;
		//return $kelengkapan_berkas.' / '.$cnt2;
		return round(($pros1+$pros2)/2);
	}

    function get_bln_pengajuan(){
    	$sql='select bln_pengajuan, nm_bulan(bln_pengajuan) as bulan from tbl_pengajuan group by bln_pengajuan';
		return $this->db->query($sql)->result_array();
	}
	function get_jumlah_by_bulan($id_lembaga, $bulan, $where_status = 'status>1'){
		$sql='select id from tbl_pengajuan where id_jenis_lembaga='.$id_lembaga.' and bln_pengajuan='.$bulan.' and '.$where_status;
		return $this->db->query($sql)->num_rows();		
	}

}
