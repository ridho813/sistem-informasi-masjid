<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//cek_login();
		$this->load->model('M_berita');
	}

	public function index()
	{
		$data['judul'] = 'Data Artikel';
	//	$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();

		// Jika tombol cari di tekan
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if($this->input->post('submit')) {
			$data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('judul_berita', $data['keyword']);
		$this->db->from('berita');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://192.168.64.2/masjid/back_end/artikel/index/';
		// $config['total_rows'] = $this->Type_model->countAllType();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 4;
		$config['num_links'] = 4;

		// STYLE
		$config['full_tag_open'] = '<nav><ul class="pagination ok">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['artikel'] = $this->M_berita->getBeritaKategori($config['per_page'], $data['start'], $data['keyword']);
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->aturanForm();
		if($this->form_validation->run() == FALSE) {
			$this->load->view('back_end/head');
			//$this->load->view('themeplates_admin/side', $data);
			$this->load->view('back_end/artikel', $data);
			$this->load->view('back_end/footer');
		} else {
			$this->M_berita->tambahArtikel();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Tambahkan.</div>');
			redirect('back_end/artikel');
		}
	}

	// menampilkan berdasarkan id berita
	public function getubah() 
	{
		// echo $_POST['id'];
		echo json_encode($this->M_berita->getArtikelUbah($_POST['id']));
	}

	// aksi ubah data artikel
	public function ubahartikel()
	{
		$this->M_berita->ubahDataArtikel($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Ubah.</div>');
		redirect('back_end/artikel');
	}

	public function hapus($id)
	{
		$this->db->where('id_berita', $id);
		$row = $this->db->get('berita')->row_array();
		unlink('./assets/berita/' . $row['foto_berita']);
		$this->db->delete('berita', ['id_berita' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Hapus.</div>');
		redirect('back_end/artikel');
	}


	public function aturanForm()
	{
		$this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim',
		['required' => 'Judul Berita Wajib Isi!']
		);
		$this->form_validation->set_rules('seo_title', 'seo Berita', 'required|trim',
		['required' => 'Slug Berita Wajib Isi!']
		);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim',
		['required' => 'Kategori Wajib Isi!']
		);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',
		['required' => 'Deskripsi Wajib Isi!']
		);
	}

	public function review($seo_title)
	{
		$data['judul'] = 'Review Artikel';
		$data['review'] = $this->db->get_where('berita', ['id_berita' => $seo_title])->row_array();

		$this->form_validation->set_rules('terbit', 'Terbit', 'required|trim', ['required' => 'Terbit Wajib Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('back_end/head', $data);
			$this->load->view('back_end/review', $data);
			$this->load->view('back_end/footer', $data);
		} else {
			$this->terbit($id);
		}
	}

	public function terbit($id)
	{
		$this->db->set('terbit', '1');
		$this->db->where('id_berita', $id);
		$this->db->update('berita');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Artikel Berhasil Di Publikasikan.</div>');
		redirect('back_end/artikel');
	}

	public function ubahdeskripsi()
	{
		$deskripsi = $this->input->post('deskripsi', true);
		$id_berita = $this->input->post('id_berita', true);
		$this->db->set('deskripsi', $deskripsi);
		$this->db->where('id_berita', $id_berita);
		$this->db->update('berita');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Deskripsi Artikel Berhasil Di Ubah.</div>');
		redirect('back_end/artikel');
	}

}
