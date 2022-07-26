<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_infaq extends CI_Model {

	
	//tausiyah

	public function gelAllprofil($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('date', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tb_kas_masjid');
		$this->db->join('tb_kategori_kas', 'tb_kategori_kas.id_kategori = tb_kas_masjid.id_kategori');
		$this->db->order_by('tb_kas_masjid.id_transaksi', 'DESC ');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function tambah()
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_sizes'] = '16048';
			$config['upload_path'] = 'assets/infaq/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}
		$data = [
			 'id_kategori'  => $this->input->post('id_kategori'),
			 'pemasukan'		=> $this->input->post('pemasukan'),
				'pengeluaran'  => $this->input->post('pengeluaran'),
				'date'	    => $this->input->post('date'),
				'keterangan'   => $this->input->post('keterangan'),
				//'updateby' 		=> $this->session->userdata('id_customer'),
				'foto'   => $fotoBerita

		];
		$this->db->insert('tb_kas_masjid', $data);
	}

	public function getArtikelUbah($id)
	{
		return $this->db->get_where('tb_kas_masjid', ['id_transaksi' => $id])->row_array();
	}

	public function ubahDataArtikel($pos)
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_sizes'] = '5048';
			$config['upload_path'] = './assets/infaq/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('dokumentasi')) {
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
				$this->db->set('foto', $fotoBaru);
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

	
    //kategori kas



}
