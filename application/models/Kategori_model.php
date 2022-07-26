<?php


class Kategori_model extends CI_Model {

	public function s($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('narasumber', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->where('id_kegiatan');
		return $this->db->get('', $limit, $start)->result_array();
	}


	public function view($limit, $start, $keyword = null)
	{
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->where_in('id_jenis');
		//$this->db->limit(1);
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function joinBeritaCustomer($id)
	{
		if($keyword) {
			$this->db->like('judul_kegiatan', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		//$this->db->join('customer', 'customer.id_customer = berita.updateby');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('tb_kegiatan.judul_kegiatan',($id));
		return $this->db->get()->row_array();
	}


}

?>
