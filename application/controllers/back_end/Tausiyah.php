<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tausiyah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tausiyah');
		//cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Data Tausiyah';
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

		$this->db->like('narasumber', $data['keyword']);
		$this->db->like('judul_kegiatan', $data['keyword']);
		$this->db->from('tb_kegiatan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://192.168.64.2/masjid/back_end/tausiyah/index';
		// $config['total_rows'] = $this->Kategori_Artikel_model->countAllKategori();
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
		$data['tb_kegiatan'] = $this->M_tausiyah->tampiltausiyah($config['per_page'], $data['start'], $data['keyword']);

		$data['tb_jenis_kegiatan'] = $this->db->get('tb_jenis_kegiatan')->result_array();

				$this->form_validation->set_rules('judul_kegiatan', 'judul_kegiatan', 'required|trim',
		 ['required' => 'Judul_kegiatan Harus Di Isi!']);
		 $this->form_validation->set_rules('jenis_kegiatan', 'jenis_kegiatan', 'required|trim',
		 ['required' => 'Jenis Kegiatan Harus Di Isi!']);
		 $this->form_validation->set_rules('seo_title', 'seo_title', 'required|trim',
		 ['required' => 'Slug Harus Di Isi!']);
		 $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim',
		 ['required' => 'tanggal Harus Di Isi!']);
		 $this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required|trim',
		 ['required' => 'Jam mulai Harus Di Isi!']);
		 $this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required|trim',
		 ['required' => 'Jam Selesai Harus Di Isi!']);
		 $this->form_validation->set_rules('narasumber', 'narasumber', 'required|trim',
		 ['required' => 'Narasumber Harus Di Isi!']);
		 $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim',
		 ['required' => 'Keterangan Harus Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('back_end/head');
			//$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('back_end/tausiyah', $data);
			$this->load->view('back_end/footer');
		} else {
			$this->M_tausiyah->tambahArtikel();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Kategori Berhasil Ditambahkan.</div>');
			redirect('back_end/tausiyah');
		}
	}

	// menampilkan berdasarkan id berita
	public function getubah() 
	{
		// echo $_POST['id'];
		echo json_encode($this->M_tausiyah->getArtikelUbah($_POST['id']));
	}

	// aksi ubah data artikel
	public function ubahartikel()
	{
		$this->M_tausiyah->ubahDataArtikel($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Ubah.</div>');
		redirect('back_end/tausiyah');
	}

	public function hapus($id)
	{
		$this->db->where('id_kegiatan', $id);
		$row = $this->db->get('tb_kegiatan')->row_array();
		unlink('./assets/kegiatan/' . $row['foto_berita']);
		$this->db->delete('tb_kegiatan', ['id_kegiatan' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Hapus.</div>');
		redirect('back_end/tausiyah');
	}





}
