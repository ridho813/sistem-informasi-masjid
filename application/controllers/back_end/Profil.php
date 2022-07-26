<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profil');
		//cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Data Profil';
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

		$this->db->like('nama', $data['keyword']);
		//$this->db->like('judul_kegiatan', $data['keyword']);
		$this->db->from('profil');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://192.168.64.2/masjid/back_end/profil/index';
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
		$data['profil'] = $this->M_profil->gelAllprofil($config['per_page'], $data['start'], $data['keyword']);
		$this->form_validation->set_rules('nama', 'nama', 'required|trim', ['required' => 'Nama Harus Di Isi!']);
		$this->form_validation->set_rules('seo_title', 'seo_title', 'required|trim', ['required' => 'Slug  Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('tempat_lhr', 'tempat_lhr', 'required|trim', ['required' => 'Tempat Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('tgl_lhr', 'tgl_lhr', 'required|trim', ['required' => 'Tanggal Lahir Harus Di Isi!']);
		$this->form_validation->set_rules('aktifitas', 'aktifitas', 'required|trim', ['required' => 'Aktifitas Harus Di Isi!']);
		$this->form_validation->set_rules('fb', 'fb');
		$this->form_validation->set_rules('ig', 'ig');
		$this->form_validation->set_rules('motto', 'motto', 'required|trim', ['required' => 'Motto Harus Di Isi!']);
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', ['required' => 'Jabatan Harus Di Isi!']);
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim', ['required' => 'Pendidikan Harus Di Isi!']);

		
		
		
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('back_end/head');
			//$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('back_end/profil', $data);
			$this->load->view('back_end/footer');
		} else {
			$this->M_profil->tambahArtikel();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Kategori Berhasil Ditambahkan.</div>');
			redirect('back_end/profil');
		}
	}

	// menampilkan berdasarkan id berita
	public function getubah() 
	{
		// echo $_POST['id'];
		echo json_encode($this->M_profil->getArtikelUbah($_POST['id']));
	}

	// aksi ubah data artikel
	public function ubahartikel()
	{
		$this->M_profil->ubahDataArtikel($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Ubah.</div>');
		redirect('back_end/profil');
	}

	public function hapus($id)
	{
		$this->db->where('id_profil', $id);
		$row = $this->db->get('profil')->row_array();
		unlink('./assets/profil/' . $row['foto']);
		$this->db->delete('profil', ['id_kegiatan' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Hapus.</div>');
		redirect('back_end/profil');
	}





}
