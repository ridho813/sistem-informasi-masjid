<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
	}

	public function index()
	{
		$data['judul'] = 'Semua Artikel';
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
		//$data['kategori'] = $this->db->get('type')->result_array();
		//$data['notif'] = $this->db->get_where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$data['berita'] = $this->M_berita->getAllBeritaKategori();
		$this->load->view('tamplate/home', $data);
		$this->load->view('berita/artikel', $data);
		$this->load->view('tamplate/footer');
		
	
	}

	public function baca($seo_title)
	{
		$data['judul'] = 'Detail Artikel';
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
		//$data['kategori'] = $this->db->get('')->result_array();
		$data['berita'] = $this->M_berita->joinBeritaCustomer($seo_title);
		//$data['notif'] = $this->db->get_where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$this->load->view('tamplate/home', $data);
		$this->load->view('berita/baca_artikel', $data);
		$this->load->view('tamplate/footer');
	}

	public function kategori($id)
	{
		$data['judul'] = 'Kategori Artikel';
		//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['berita'] = $this->M_berita->joinBeritaKategoriById($id);
		//$data['notif'] = $this->db->get_where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$this->load->view('tamplate/home', $data);
		$this->load->view('customer/kategori_artikel', $data);
		$this->load->view('tamplate/footer');
	}


	public function search()
	{
		$data['keyword'] = $this->input->get('keyword');
		$this->load->model('M_berita');

		$data['search_result'] = $this->M_berita->search($data['keyword']);
		
		$this->load->view('customer/dashboard.php', $data);
	}
 

}
