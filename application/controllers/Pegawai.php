<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_pegawai");
		$this->load->model("M_jabatan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Pegawai";
		$this->template->load('template', 'pegawai/list', $data);
	}

	public function list_pegawai()
	{
		$data = $this->M_pegawai->list_pegawai();
		echo json_encode($data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|xss_clean');
		$this->form_validation->set_rules('name', 'Nama', 'required|trim|xss_clean', ['required' => 'Nama cannot be empty!']);
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|xss_clean');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|xss_clean', ['required' => 'Jabatan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Pegawai";
			$data['pangkat'] = $this->M_pegawai->getAllDataPangkat();
			$data['jabatan'] = $this->M_jabatan->getAllData();
			$this->template->load('template', 'pegawai/tambah', $data);
		} else {
			if ($this->M_pegawai->tambah()) {
				$this->session->set_flashdata('info', 'Pegawai berhasil ditambahkan!');
				redirect('pegawai');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('pegawai');
			}
		}
	}
	
	public function tampil($id = null)
	{
		$data['title'] = "Pegawai";
		$data['detail'] = $this->M_pegawai->getDetail($id);
		$this->template->load('template', 'pegawai/tampil', $data);
	}
	public function ubah($id=null)
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|xss_clean');
		$this->form_validation->set_rules('name', 'Nama', 'required|trim|xss_clean', ['required' => 'Nama cannot be empty!']);
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|xss_clean');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|xss_clean', ['required' => 'Jabatan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Pegawai";
			$data['pangkat'] = $this->M_pegawai->getAllDataPangkat();
			$data['jabatan'] = $this->M_jabatan->getAllData();
			$data['detail'] = $this->M_pegawai->getDetail($id);
			$this->template->load('template', 'pegawai/ubah', $data);
		} else {
			if ($this->M_pegawai->ubah($id)) {
				$this->session->set_flashdata('info', 'Pegawai berhasil diubah!');
				redirect('pegawai');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('pegawai');
			}
		}
	}
	public function hapus($id = null)
	{
		if ($this->M_pegawai->hapus($id)) {
			$this->session->set_flashdata('info', 'Pegawai berhasil dihapus!');
			redirect('pegawai');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('pegawai');
		}
	}
}
