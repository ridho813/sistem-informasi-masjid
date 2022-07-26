<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berita');
		$this->load->model('Kategori_model');
		//$this->load->model('M_vidio');
		
	}

	public function index()
		{

			$data['judul'] = 'Semua Artikel';
			$data['tb_kas_masjid'] = $this->M_berita->kas_masjid();
			$data['kegiatan'] = $this->M_berita->view();
			$data['berita'] = $this->M_berita->getAllBeritaKategori();
			$data['vidio'] = $this->M_berita->Gett();
			$data['tb_kegiatan'] = $this->M_berita->getAllT('tb_kegiatan');
			//$data['tb_jenis_kegiatan'] = $this->M_berita->kegiatan();
			//$data['tb_kategori_kas'] = $this->M_berita->Kas();
			$this->load->view('tamplate/home', $data);
			$this->load->view('tamplate/side', $data);
			$this->load->view('tamplate/footer');
			
		
		}
		public function baca_kegiatan($seo_title)
		{
			$data['judul'] = 'Detail Kegiatan';
			//$data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
			$data['tb_jenis_kegiatan'] = $this->db->get('tb_jenis_kegiatan')->result_array();
			$data['tb_kegiatan'] = $this->M_berita->GetBacaKegiatan($seo_title);
			//$data['notif'] = $this->db->get_where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
			$this->load->view('tamplate/home', $data);
			$this->load->view('kegiatan/baca_kegiatan', $data);
			$this->load->view('tamplate/footer');
		}
	}

