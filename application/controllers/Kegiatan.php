<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Type_model');
		//$this->load->model('Kategori_model');
		$this->load->model('M_kegiatan');
	}
	public function index()
	{
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else if(!$this->input->post('submit')) {
			$data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('judul_kegiatan', $data['keyword']);
		$this->db->from('tb_kegiatan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
				// Konfigurasi Pagination

				$config['base_url'] = 'http://192.168.64.2/masjid/foto_kegiatan/index/';
				// $config['total_rows'] = $this->Customer_model->countCustomer();
				// var_dump($config['total_rows']); die;
				$config['per_page'] = 6;
				$config['num_links'] = 6;
		
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
		$data['judul'] = 'Semua Foto Kegiatan';
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_jenis_kegiatan'] = $this->db->get('tb_jenis_kegiatan')->result_array();
		$data['tb_kegiatan'] = $this->M_kegiatan->tampilankegiatan($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view('tamplate/home',$data);
		$this->load->view('kegiatan/kegiatan', $data);
		$this->load->view('tamplate/footer');
	}
	public function baca_kegiatan($seo_title)
	{
		$data['judul'] = 'Detail Kegiatan';
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_jenis_kegiatan'] = $this->db->get('tb_jenis_kegiatan')->result_array();
		$data['tb_kegiatan'] = $this->M_kegiatan->GetBacaKegiatan($seo_title);
		//$data['notif'] = $this->db->get_where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$this->load->view('tamplate/home', $data);
		$this->load->view('kegiatan/baca_kegiatan', $data);
		$this->load->view('tamplate/footer');
	}
	

}
