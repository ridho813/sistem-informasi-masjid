<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vidio extends CI_Model {
	public function aksiTambahKategori()
	{
		$data = [
			'judul' => $this->input->post('judul', true),
			'post_titel' => $this->input->post('post_titel', true),
			'link' => $this->input->post('link', true),
			'tgl_post' => $this->input->post('tgl_post', true)
		];

		$this->db->insert('vidio', $data);
	}

	public function aksiUbahKategori($data)
	{
		$id_kategori = $data['id_vidio'];
		$data = [
			'post_titel' => $data['post_titel'],
			'link' => $this->input->post['link']
		];

		$this->db->where('id_vidio', $id_kategori);
		$this->db->set($data);
		$this->db->update('vidio');
	}

	public function getUbahKategori($id)
	{
		return $this->db->get_where('vidio', ['id_vidio' => $id])->row_array();
	}

	public function getAllKategori($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('post_titel', $keyword);
		}
		$this->db->order_by('id_vidio', 'DESC');
		return $this->db->get('vidio', $limit, $start)->result_array();
	}

	public function countAllKategori()
	{
		return $this->db->get('vidio')->num_rows();
	}
	public function Gett()
	{
	
		$this->db->order_by('id_vidio', 'DESC');
		return $this->db->get('vidio')->result_array();
	}
//home
	public function TampilVidio($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('post_titel', $keyword);
		}
		$this->db->order_by('id_vidio', 'DESC');
		return $this->db->get('vidio', $limit, $start)->result_array();
	}

}
