<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profil extends CI_Model {

	
	//tausiyah

	public function gelAllprofil($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama', $keyword);
		}
		$this->db->select('*');
		$this->db->from('profil');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function tambahArtikel()
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_sizes'] = '16048';
			$config['upload_path'] = 'assets/profil/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
				'nama'  => $this->input->post('nama'),
				'seo_title'  => $this->input->post('seo_title'),
				'alamat'		=> $this->input->post('alamat'),
				'tempat_lhr'   => $this->input->post('tempat_lhr'),
				'tgl_lhr'	    => date('Y-m-d'),
				'aktifitas'   => $this->input->post('aktifitas'),
				'fb' 		=>  $this->input->post('fb'),
				//'updateby' 		=> $this->session->userdata('id_customer'),
				'ig'	    => $this->input->post('ig'),
				'motto'	    => $this->input->post('motto'),
				'jabatan'	    => $this->input->post('jabatan'),
				'pendidikan'	    => $this->input->post('pendidikan'),
				'foto'   => $fotoBerita

		];
		

	

		$this->db->insert('profil', $data);
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

	
	public function joinArtikelKategori()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('berita.id_kegiatan', 'kategori.id_kategori');
		return $this->db->get()->result_array();
	}

	public function joinBeritaKategoriById($id)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('berita.id_kategori', $id);
		return $this->db->get()->result_array();
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

	
    //kategori kas

	public function aksiTambahKategori()
	{
		$data = [
			'kategori' => $this->input->post('kategori', true)
		];

		$this->db->insert('tb_kategori_kas', $data);
	}

	public function aksiUbahKategori($data)
	{
		$id_kategori = $data['id_kategori'];
		$data = [
			'kategori' => $data['kategori']
		];

		$this->db->where('id_kategori', $id_kategori);
		$this->db->set($data);
		$this->db->update('tb_kategori_kas');
	}

	public function getUbahKategori($id)
	{
		return $this->db->get_where('tb_kategori_kas', ['id_kategori' => $id])->row_array();
	}

	public function getAllKategori($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('kategori', $keyword);
		}
		$this->db->order_by('id_kategori', 'DESC');
		return $this->db->get('tb_kategori_kas', $limit, $start)->result_array();
	}

	public function countAllKategori()
	{
		return $this->db->get('tb_kategori_kas')->num_rows();
	}
	//lhat profil

	public function lihatprofil($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama', $keyword);
		}
		$this->db->select('*');
		$this->db->from('profil');
		$this->db->order_by('id_profil', 'DESC');
		$this->db->limit(1);
		return $this->db->get('', $limit, $start)->result_array();
	}
	public function bacaprofil($id)
	{
		$this->db->select('*');
		$this->db->from('profil');
		//$this->db->join('customer', 'customer.id_customer = berita.updateby');
		//$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('profil.seo_title', $id);
		return $this->db->get()->row_array();
	}


}
