<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tausiyah extends CI_Model {

	
	//tausiyah

	public function gelAlltausiyah($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('narasumber', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC ');
		return $this->db->get('', $limit, $start)->result_array();
	}


	public function tampiltausiyah($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('narasumber', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function tambahArtikel()
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_sizes'] = '16048';
			$config['upload_path'] = 'assets/kegiatan/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
				'narasumber'  => $this->input->post('narasumber'),
				'judul_kegiatan'		=> $this->input->post('judul_kegiatan'),
				'seo_title'   => $this->input->post('seo_title'),
				'id_jenis'   => $this->input->post('jenis_kegiatan'),
				'jam_mulai'	    => $this->input->post('jam_mulai'),
				'jam_selesai'   => $this->input->post('jam_selesai'),
				'tanggal' 		=> date('Y-m-d'),
				//'updateby' 		=> $this->session->userdata('id_customer'),
				'keterangan'	    => $this->input->post('keterangan'),
				'foto'   => $fotoBerita

		];


		$this->db->insert('tb_kegiatan', $data);
	}



	public function getArtikelUbah($id)
	{
		return $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();
	}

	public function ubahDataArtikel($pos)
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_sizes'] = '15048';
			$config['upload_path'] = './assets/berita/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$fotoLama = $pos['inputfoto'];
				// $pecahArr = explode('.', $fotoLama);
				// $stringArr = implode(".",$pecahArr);
				// var_dump($pos); die;
				// var_dump($ektensiFotoLama); die;
				// $ektensiFotoLama = strtolower(end($ektensiFotoLama));
				// if($fotoLama != 'default.jpg') {
				// 	unlink(FCPATH . 'assets/assets/berita/' . $fotoLama);
				// }

				$fotoBaru = $this->upload->data('file_name');
				$this->db->set('foto_berita', $fotoBaru);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$id_kegiatan = $pos['id_kegiatan'];
		$data = [
				'judul_berita' => $pos['judul'],
				'seo_title'	=> $post['seo_title'],
				'deskripsi' => $pos['deskripsi'],
				'id_kategori' => $pos['kategori']
		];
		

		// var_dump($pos['inputfoto']); die;

		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->set($data);
		$this->db->update('tb_kegiatan');
	}

	


	public function search($keyword)
	{
		if(!$keyword){
			return null;
		}
		$this->db->like('titel', $keyword);
		$this->db->or_like('content', $keyword);
		$query = $this->db->get($this->berita);
		return $query->result();
	}
    
	public function getAllKegiatan($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('tb_jenis_kegiatan', $keyword);
		}
		$this->db->order_by('id_jenis', 'DESC');
		return $this->db->get('tb_jenis_kegiatan', $limit, $start)->result_array();
	}

}
