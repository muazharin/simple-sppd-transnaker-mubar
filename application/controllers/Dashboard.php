<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model('M_dashboard');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['jml_perjalanan'] = $this->db->count_all_results('perjalanan');
		$this->db->where('tgl_kembali >=', date('Y-m-d'));
		$this->db->where('tgl_berangkat <=', date('Y-m-d'));
		$data['jml_berlangsung'] = $this->db->count_all_results('perjalanan');
		$this->db->where('tgl_kembali <', date('Y-m-d'));
		$data['jml_selesai'] = $this->db->count_all_results('perjalanan');
		$this->db->where('nip !=', '');
		$data['jml_pegawai'] = $this->db->count_all_results('pegawai');
		$this->db->where('nip !=', '');
		$data['jml_pegawai_asn'] = $this->db->count_all_results('pegawai');
		$this->db->where('nip', '');
		$data['jml_pegawai_honorer'] = $this->db->count_all_results('pegawai');
		$data['jml_jabatan'] = $this->db->count_all_results('jabatan');
		
		$this->template->load('template', 'dashboard', $data);
	}

	
}