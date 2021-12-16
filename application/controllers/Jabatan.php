<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_jabatan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Jabatan";
		$this->template->load('template', 'jabatan/list', $data);
	}

	public function list_jabatan()
	{
		$data = $this->M_jabatan->list_jabatan();
		echo json_encode($data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim|xss_clean', ['required' => 'Nama jabatan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Jabatan";
			$this->template->load('template', 'jabatan/tambah', $data);
		} else {
			if ($this->M_jabatan->tambah()) {
				$this->session->set_flashdata('info', 'Jabatan berhasil ditambahkan!');
				redirect('jabatan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('jabatan');
			}
		}
	}

	public function ubah($id = null)
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama ruangan', 'required|trim|xss_clean', ['required' => 'Nama ruangan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Jabatan";
			$data['detail'] = $this->M_jabatan->getDetail($id);
			$this->template->load('template', 'jabatan/ubah', $data);
		} else {
			if ($this->M_jabatan->ubah($id)) {
				$this->session->set_flashdata('info', 'Jabatan berhasil diubah!');
				redirect('jabatan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('jabatan');
			}
		}
	}

	public function hapus($id = null)
	{
		if ($this->M_jabatan->hapus($id)) {
			$this->session->set_flashdata('info', 'Jabatan berhasil dihapus!');
			redirect('jabatan');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('jabatan');
		}
	}
}