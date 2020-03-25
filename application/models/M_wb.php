<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wb extends CI_Model {

	function get_last_niwb(){
		$query=$this->db->query('select max(niwb) as lastniwb from tbl_wb');
		$ret = $query->row('lastniwb');
		if($ret<30001){
			$ret=30001;
		}
		$ret++;
		return($ret);
	}


	function hp_exists($niwb){
		$cnt = $this->db->get_where('tbl_wb', 'niwb='.$niwb)->num_rows();
		return $cnt>0;
	}
	

	function tambah(){
		if($this->niwb_exists($this->input->post('niwb'))){
			return FALSE;
		}
		$array=array(
			'niwb'				=> $this->input->post('niwb'),
			'nisn'				=> $this->input->post('nisn'),
			'nama'				=> $this->input->post('nama'),
			'jk'				=> $this->input->post('jk'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
			'nik'				=> $this->input->post('nik'),
			'no_akta_lahir'		=> $this->input->post('no_akta_lahir'),
			'agama'				=> $this->input->post('agama'),
			'telepon'			=> $this->input->post('telepon'),
			'hp'				=> $this->input->post('hp'),
			'email'				=> $this->input->post('email'),
			'keterangan'		=> $this->input->post('keterangan'),

			'alamat'			=> $this->input->post('alamat'),
			'rt'				=> $this->input->post('rt'),
			'rw'				=> $this->input->post('rw'),
			'kelurahan'			=> $this->input->post('kelurahan'),
			'kecamatan'			=> $this->input->post('kecamatan'),
			'kabupaten'			=> $this->input->post('kabupaten'),
			'provinsi'			=> $this->input->post('provinsi'),
			'kode_pos'			=> $this->input->post('kode_pos'),
			'bujur'				=> $this->input->post('bujur'),
			'lintang'			=> $this->input->post('lintang'),

			'guid'				=> $this->input->post('guid'),
			'penanggung_jawab'	=> $this->input->post('penanggung_jawab'),

			'ayah_nama'			=> $this->input->post('ayah_nama'),
			'ayah_nik'			=> $this->input->post('ayah_nik'),
			'ayah_tahun_lahir'	=> $this->input->post('ayah_tahun_lahir'),
			'ayah_pendidikan'	=> $this->input->post('ayah_pendidikan'),
			'ayah_pekerjaan'	=> $this->input->post('ayah_pekerjaan'),
			'ayah_penghasilan'	=> $this->input->post('ayah_penghasilan'),

			'ibu_nama'			=> $this->input->post('ibu_nama'),
			'ibu_nik'			=> $this->input->post('ibu_nik'),
			'ibu_tahun_lahir'	=> $this->input->post('ibu_tahun_lahir'),
			'ibu_pendidikan'	=> $this->input->post('ibu_pendidikan'),
			'ibu_pekerjaan'		=> $this->input->post('ibu_pekerjaan'),
			'ibu_penghasilan'	=> $this->input->post('ibu_penghasilan')
		);
		$ret1 = $this->db->insert('tbl_wb', $array);
						
		$array=array(
			'niwb'			=> $this->input->post('niwb'),
			'id_kelas'		=> $this->input->post('kelas')
		);
		$ret2 = $this->db->insert('tbl_kelas_anggota', $array);
		
		$array=array(
			'niwb'			=> $this->input->post('niwb'),
			'id_kelas'		=> $this->input->post('kelas'),
			'tahun_masuk'	=> $this->session->userdata('tp'),
			'tgl_masuk'		=> date('Y-m-d')
		);
		$ret3 = $this->db->insert('tbl_wb_registrasi', $array);
		
		
		return($ret1 AND $ret2 AND $ret3);
	}	

	function edit($niwb){
		$wbedit=array(
			'nisn'				=> $this->input->post('nisn'),
			'nama'				=> $this->input->post('nama'),
			'jk'				=> $this->input->post('jk'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
			'nik'				=> $this->input->post('nik'),
			'no_akta_lahir'		=> $this->input->post('no_akta_lahir'),
			'agama'				=> $this->input->post('agama'),
			'telepon'			=> $this->input->post('telepon'),
			'hp'				=> $this->input->post('hp'),
			'email'				=> $this->input->post('email'),
			'keterangan'		=> $this->input->post('keterangan'),

			'alamat'			=> $this->input->post('alamat'),
			'rt'				=> $this->input->post('rt'),
			'rw'				=> $this->input->post('rw'),
			'kelurahan'			=> $this->input->post('kelurahan'),
			'kecamatan'			=> $this->input->post('kecamatan'),
			'kabupaten'			=> $this->input->post('kabupaten'),
			'provinsi'			=> $this->input->post('provinsi'),
			'kode_pos'			=> $this->input->post('kode_pos'),
			'bujur'				=> $this->input->post('bujur'),
			'lintang'			=> $this->input->post('lintang'),

			'guid'				=> $this->input->post('guid'),
			'penanggung_jawab'	=> $this->input->post('penanggung_jawab'),

			'ayah_nama'			=> $this->input->post('ayah_nama'),
			'ayah_nik'			=> $this->input->post('ayah_nik'),
			'ayah_tahun_lahir'	=> $this->input->post('ayah_tahun_lahir'),
			'ayah_pendidikan'	=> $this->input->post('ayah_pendidikan'),
			'ayah_pekerjaan'	=> $this->input->post('ayah_pekerjaan'),
			'ayah_penghasilan'	=> $this->input->post('ayah_penghasilan'),

			'ibu_nama'			=> $this->input->post('ibu_nama'),
			'ibu_nik'			=> $this->input->post('ibu_nik'),
			'ibu_tahun_lahir'	=> $this->input->post('ibu_tahun_lahir'),
			'ibu_pendidikan'	=> $this->input->post('ibu_pendidikan'),
			'ibu_pekerjaan'		=> $this->input->post('ibu_pekerjaan'),
			'ibu_penghasilan'	=> $this->input->post('ibu_penghasilan')
		);
		
		$arr_where=array(
			'niwb'	=> $niwb
		);
		
		$query = $this->db->update('tbl_wb', $wbedit, $arr_where);
		return $query;
		
	}

	function get_wb($niwb, $field='all'){
		$this->db->where('niwb', $niwb);
		$query = $this->db->get('tbl_wb');
		if($field=='all'){
			return $query->result_array();	
		}else{
			return $query->row($field);
		}
	}


    function profil_saya(){
		$query = $this->db->query('
				select 
					W.niwb, 
					W.nisn,
					W.nik,
					ucase(W.nama) as nama, 
					W.jk, 
					tcase(W.tempat_lahir) as tempat_lahir, 
					W.tanggal_lahir, 
					concat(W.alamat, " RT ", W.rt, " RW ", W.rw) as alamat, 
					tcase(W.kelurahan) as kelurahan, 
					tcase(W.kecamatan) as kecamatan, 
					tcase(W.kabupaten) as kabupaten, 
					tcase(W.provinsi) as provinsi, 
					W.kode_pos,
					W.telepon,
					W.hp, 
					tcase(W.ayah_nama) as ayah_nama, 
					tcase(W.ibu_nama) as ibu_nama,
					wbr.tahun_masuk,
					wbr.tahun_keluar,
					wbr.ambil_ijazah, 
					adm.id,
					j.jenjang, 
					k.kelas 
				from tbl_wb W
				join tbl_kelas_anggota ka on W.niwb = ka.niwb
				join tbl_kelas k on ka.id_kelas = k.id
				join tbl_jenjang j on k.id_jenjang = j.id
				join tbl_wb_registrasi wbr on W.niwb = wbr.niwb
				join tbl_adm adm on j.id = adm.id_jenjang
				where adm.tahun='.$this->session->userdata('tp'). '
				and W.niwb='.$this->session->userdata('id')
			);
 		
		return $query->result_array(); 
    }


}

?>