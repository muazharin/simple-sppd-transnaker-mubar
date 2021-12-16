<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perjalanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_perjalanan");
		$this->load->model("M_pegawai");
		$this->load->library('form_validation');
		$this->load->library('nourut');
        $this->load->library('romawi');
	}

	public function index()
	{
		$data['title'] = "Perjalanan";
		$this->template->load('template', 'perjalanan/list', $data);
	}

	public function list_perjalanan()
	{
		$data = $this->M_perjalanan->list_perjalanan();
		echo json_encode($data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nomor', 'Nomor SPT', 'required|trim|xss_clean');
		$this->form_validation->set_rules('pegawai', 'Pegawai', 'required|trim|xss_clean', ['required' => 'Pegawai cannot be empty!']);
		$this->form_validation->set_rules('dari', 'Dari', 'required|trim|xss_clean',['required' => 'Dari cannot be empty!']);
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim|xss_clean',['required' => 'Tujuan cannot be empty!']);
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required|trim|xss_clean', ['required' => 'Keperluan cannot be empty!']);
		$this->form_validation->set_rules('angkutan', 'Angkutan', 'required|trim|xss_clean', ['required' => 'Angkutan cannot be empty!']);
		$this->form_validation->set_rules('tgl_berangkat', 'Tgl Berangkat', 'required|trim|xss_clean', ['required' => 'Tgl Berangkat cannot be empty!']);
		$this->form_validation->set_rules('tgl_kembali', 'Tgl Kembali', 'required|trim|xss_clean', ['required' => 'Tgl Kembali cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Perjalanan";
			$data['pegawai'] = $this->M_pegawai->getAllData();
			$data['no_urut'] = $this->M_perjalanan->get_nu();
            if ($data['no_urut'] == NULL) {
                $data['no_urut'] = 0;
            }
			$bulan = $this->romawi->bulan(date('m'));
            $data['no_stp'] = $this->nourut->no_urut_quo($data['no_urut']->no_urut + 1) . '/' . $bulan . "/" . date('Y');
			$this->template->load('template', 'perjalanan/tambah', $data);
		} else {
			if($this->M_perjalanan->cek_nomor() > 0){
				$this->session->set_flashdata('danger', 'Nomor SPT sudah ada!');
				redirect('perjalanan');
			}else{
				if ($this->M_perjalanan->tambah()) {
					$this->session->set_flashdata('info', 'Perjalanan berhasil ditambahkan!');
					redirect('perjalanan');
				} else {
					$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
					redirect('perjalanan');
				}
				
			}
		}
	}

	public function tampil($id = null)
	{
		$data['title'] = "Perjalanan";
		$data['pengikut'] = $this->M_perjalanan->getDetailPengikut($id);
		$data['detail'] = $this->M_perjalanan->getDetail($id);
		$this->template->load('template', 'perjalanan/tampil', $data);
	}

	public function laporan($id = null){
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => false,
			'orientation' => 'P'
		]);
		$data['laporan'] = $this->M_perjalanan->getDetail($id);
		$data['pengikut'] = $this->M_perjalanan->getDetailPengikut($id);
		$html = $this->load->view('perjalanan/laporan', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
	
	public function laporan_pengikut($id = null, $idp=null){
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => false,
			'orientation' => 'L'
		]);
		$data['laporan'] = $this->M_perjalanan->getDetail($id);
		$data['pengikut'] = $this->M_pegawai->getDetail($idp);
		$html = $this->load->view('perjalanan/laporan_pengikut', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function hapus($id = null)
	{
		if ($this->M_perjalanan->hapus($id)) {
			$this->session->set_flashdata('info', 'Perjalanan berhasil dihapus!');
			redirect('perjalanan');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('perjalanan');
		}
	}
}
