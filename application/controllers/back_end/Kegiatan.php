<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kegiatan_model');
		//cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Kategori Artikel';
		//$data['type'] = $this->db->get('type')->result_array();
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();

		// Pencarian
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else if(!$this->input->post('submit')) {
			$data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('jenis_kegiatan', $data['keyword']);
		$this->db->from('tb_jenis_kegiatan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://192.168.64.2/masjid/back_end/kegiatan/index';
		// $config['total_rows'] = $this->Kategori_Artikel_model->countAllKategori();
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
		$data['tb_jenis_kegiatan'] = $this->Kegiatan_model->getAllKegiatan($config['per_page'], $data['start'], $data['keyword']);
		// $data['kategori'] = $this->db->get('kategori')->result_array();

		$this->form_validation->set_rules('jenis_kegiatan', 'jenis_kegiatan', 'required|trim', ['required' => 'Kegiatan Harus Di Isi!']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('back_end/head');
		$this->load->view('back_end/jeniskegiatan', $data);
		$this->load->view('back_end/footer');
		} else {
			$this->Kegiatan_model->aksiTambahKategori();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Kegiatan Berhasil Ditambahkan.</div>');
			redirect('back_end/kegiatan');
		}
	}

	public function getkategoriartikel()
	{
		echo json_encode($this->Kegiatan_model->getUbahKategori($_POST['id']));
		// echo $_POST['id'];
	}

	public function ubahkategori()
	{
		$this->Kegiatan_model->aksiUbahKategori($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Kegiatan Berhasil Diubah.</div>');
		redirect('back_end/kegiatan');
	}

	public function hapus($id)
	{
		$this->db->delete('tb_jenis_kegiatan', ['id_jenis' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Kategori Berhasil Dihapus.</div>');
		redirect('back_end/kegiatan');
	}

}
