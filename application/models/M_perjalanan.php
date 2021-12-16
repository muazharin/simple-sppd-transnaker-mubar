<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perjalanan extends CI_Model
{
	public function list_perjalanan()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM perjalanan 
				LEFT JOIN pegawai ON pegawai.id_pegawai = perjalanan.pegawai
				WHERE perjalanan.nomor LIKE '%$keyword%' 
				OR perjalanan.tujuan LIKE '%$keyword%' 
				OR perjalanan.tgl_berangkat LIKE '%$keyword%' 
				OR perjalanan.tgl_kembali LIKE '%$keyword%' 
				OR pegawai.nama_pegawai LIKE '%$keyword%'
				ORDER BY perjalanan.id_perjalanan DESC";
		} else {
			$query = "SELECT * FROM perjalanan 
				LEFT JOIN pegawai ON pegawai.id_pegawai = perjalanan.pegawai";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->nomor;
			$row[] = $hasil->nama_pegawai;
			$row[] = $hasil->dari;
			$row[] = $hasil->tujuan;
			$row[] = date_format(date_create($hasil->tgl_berangkat), 'd-M-Y');
			$row[] = date_format(date_create($hasil->tgl_kembali), 'd-M-Y');
			$row[] = '<center>
			<a class="btn waves-effect waves-light btn-success btn-icon" href="' . base_url() . 'perjalanan/tampil/' . $hasil->id_perjalanan . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_perjalanan . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
			$data[] = $row;
			// <a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'perjalanan/ubah/' . $hasil->id_perjalanan . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
		}
		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $count_all,
			"recordsFiltered"   => $count_all,
			"data"              => $data,
		);
		return $output;
	}

	public function get_nu()
    {
        $this->db->select_max('no_urut', 'no_urut');
        return $this->db->get('perjalanan')->row();
    }

	public function cek_nomor(){
		$nomor = $this->input->post('nomor');
		$this->db->where('nomor', $nomor);
		return $this->db->get('perjalanan')->num_rows();
	}

	public function tambah(){
		$nomor = $this->input->post('nomor');
		$no_urut = explode("/",$nomor)[1];
		$pegawai = $this->input->post('pegawai');
		$dari = $this->input->post('dari');
		$tujuan = $this->input->post('tujuan');
		$keperluan = $this->input->post('keperluan');
		$angkutan = $this->input->post('angkutan');
		$tgl_berangkat = $this->input->post('tgl_berangkat');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$data = [
			'no_urut' => $no_urut,
			'nomor' => $nomor,
			'pegawai' => $pegawai,
			'keperluan' => $keperluan,
			'dari' => $dari,
			'tujuan' => $tujuan,
			'angkutan' => $angkutan,
			'tgl_berangkat' => $tgl_berangkat,
			'tgl_kembali' => $tgl_kembali,
		];
		$this->db->insert('perjalanan', $data);
        $id_ = $this->db->insert_id();
		$pengikut = $this->input->post('pengikut');
		$id_pengikut = $this->input->post('id_pengikut');
		for ($i = 0; $i < count($pengikut); $i++) {
            if ($pengikut[$i]) {
                $data = [
                    'id_perjalanan' => $id_,
                    'pengikut' => $id_pengikut[$i],
                ];
                $this->db->insert('pengikut', $data);
            }
        }

		return true;
	}

	public function getDetail($id)
	{
		$this->db->join('pegawai', 'perjalanan.pegawai = pegawai.id_pegawai', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan = jabatan.id_jabatan', 'left');
		$this->db->join('pangkat', 'pegawai.pangkat = pangkat.id_pangkat', 'left');
		$this->db->where('id_perjalanan', $id);
		return $this->db->get('perjalanan')->row();
	}
	public function getDetailPengikut($id)
	{
		$this->db->join('pegawai', 'pengikut.pengikut = pegawai.id_pegawai', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan = jabatan.id_jabatan', 'left');
		$this->db->where('id_perjalanan', $id);
		return $this->db->get('pengikut')->result();
	}

	public function hapus($id)
	{

		$this->db->where('id_perjalanan', $id);
		$this->db->delete('pengikut');
		$this->db->where('id_perjalanan', $id);
		return $this->db->delete('perjalanan');
	}
}