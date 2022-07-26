<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model {



	public function tampilankegiatan($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('judul_kegiatan', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->where_in('id_jenis','8');
		//$this->db->limit(1);
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function bacakegiatan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		//$this->db->join('customer', 'customer.id_customer = berita.updateby');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('tb_kegiatan.seo_title', $id);
		return $this->db->get()->row_array();
	}

}
