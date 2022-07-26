<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vidio extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_vidio');
		//cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Data Vidio';
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

		$this->db->like('post_titel', $data['keyword']);
		$this->db->from('vidio');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://192.168.64.2/masjid/vidio/index';
		// $config['total_rows'] = $this->Kategori_Artikel_model->countAllKategori();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 2;
		$config['num_links'] = 2;

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

		$data['start'] = $this->uri->segment(3);
		$data['vidio'] = $this->M_vidio->TampilVidio($config['per_page'], $data['start'], $data['keyword']);
		// $data['kategori'] = $this->db->get('kategori')->result_array();
		$this->form_validation->set_rules('judul', 'judul', 'required|trim',
		['required' => 'Judul Kegiatan Wajib Isi!']
		);
		$this->form_validation->set_rules('post_titel', 'post_titel', 'required|trim', ['required' => 'Judul Harus Di Isi!']);
		$this->form_validation->set_rules('link', 'link', 'required|trim',
		['required' => 'Alamat Kegiatan Wajib Isi!']
		);
		$this->form_validation->set_rules('tgl_post', 'tgl_post', 'required|trim',
		['required' => 'Tanggal Kegiatan Wajib Isi!']
		);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tamplate/home');
		$this->load->view('kegiatan/vidio', $data);
		$this->load->view('tamplate/footer');
		} 
	}


}
