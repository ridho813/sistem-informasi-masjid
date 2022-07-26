<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
	public function getBeritaKategori($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('judul_berita', $keyword);
		}
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->order_by('berita.id_berita', 'DESC');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function getAllBeritaKategori()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->order_by('berita.id_berita', 'DESC ');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}
	public function getAll($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('judul_berita', $keyword);
		}
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->order_by('berita.id_berita', 'DESC');
		$this->db->limit(1);
		return $this->db->get('',$limit, $start)->result_array();
	}

	public function tambahArtikel()
	{
		$fotoBerita = $_FILES['foto']['name'];

		if($fotoBerita) {
			$config['allowed_types'] = 'gif|png|jpg';
			//$config['max_sizes'] = '2048';
			$config['upload_path'] = 'assets/berita/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			//$title = trim(strtolower($this->input->post('title')));
				'judul_berita'  => $this->input->post('judul'),
				'seo_title'		=> $this->input->post('seo_title'),
			//	$out = explode(" ",'seo_title'),
				//$seo_title = implode("-",$out),
				'deskripsi'	    => $this->input->post('deskripsi'),
				'id_kategori'   => $this->input->post('kategori'),
				'tgl_post' 		=> date('Y-m-d'),
				//'updateby' 		=> $this->session->userdata('id_customer'),
				'terbit'	    => '0',
				'foto_berita'   => $fotoBerita
		];

		$this->db->insert('berita', $data);
	}

	public function getArtikelUbah($id)
	{
		return $this->db->get_where('berita', ['id_berita' => $id])->row_array();
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

		$id_berita = $pos['id_berita'];
		$data = [
				'judul_berita' => $pos['judul'],
				'seo_title'	=> $post['seo_title'],
				'deskripsi' => $pos['deskripsi'],
				'id_kategori' => $pos['kategori']
		];
		

		// var_dump($pos['inputfoto']); die;

		$this->db->where('id_berita', $id_berita);
		$this->db->set($data);
		$this->db->update('berita');
	}

	public function count_all_artikel()
	{
		return $this->db->get('berita',['seo_title'=> $seo_title])->num_rows();
	}

	public function joinBeritaCustomer($id)
	{
		$this->db->select('*');
		$this->db->from('berita');
		//$this->db->join('customer', 'customer.id_customer = berita.updateby');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->where('berita.seo_title', $id);
		return $this->db->get()->row_array();
	}

	public function joinArtikelKategori()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$this->db->where('berita.id_kategori', 'kategori.id_kategori');
		return $this->db->get()->result_array();
	}

	public function joinBeritaKategoriById($id)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori');
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
    


	//tausiyah

	public function ambiData()
	{
		$this->db->select('');
		$this->db->from('tb_kegiatan');
		$this->db->order_by('id_kegiatan', 'DESC');
		$this->db->limit(1);
		return $this->db->get('')->result_array();
	}
	public function getAllT()
	{
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->order_by('id_kegiatan', 'DESC');
		$this->db->limit(1);
        return $this->db->get('')->result();
		
    }
	public function Gett()
	{
	
		$this->db->select('*');
		$this->db->from('vidio');
		$this->db->order_by('id_vidio', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	//kegiatan

	public function view()
	{
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		$this->db->where_in('id_jenis','8');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	public function GetBacaKegiatan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kegiatan');
		//$this->db->join('customer', 'customer.id_customer = berita.updateby');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis = tb_kegiatan.id_jenis');
		$this->db->where('tb_kegiatan.seo_title', $id);
		return $this->db->get()->row_array();
	}
//kas masjid
public function kas_masjid()
{
	$this->db->select('*');
	$this->db->from('tb_kas_masjid');
	$this->db->join('tb_kategori_kas', 'tb_kategori_kas.id_kategori = tb_kas_masjid.id_kategori');
	$this->db->order_by('tb_kas_masjid.id_transaksi', 'DESC ');
	$this->db->limit(5);
	$query = $this->db->get();
	return $query->result();
}


}
