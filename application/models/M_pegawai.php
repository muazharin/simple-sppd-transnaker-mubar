<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	public function list_pegawai()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM pegawai 
				LEFT JOIN pangkat ON pangkat.id_pangkat = pegawai.pangkat
				LEFT JOIN jabatan ON jabatan.id_jabatan = pegawai.jabatan
				WHERE pegawai.nama_pegawai LIKE '%$keyword%' 
				OR pegawai.nip LIKE '%$keyword%' 
				OR pangkat.nama_pangkat LIKE '%$keyword%' 
				OR jabatan.nama_jabatan LIKE '%$keyword%'
				ORDER BY pegawai.id_pegawai DESC";
		} else {
			$query = "SELECT * FROM pegawai 
			LEFT JOIN pangkat ON pangkat.id_pangkat = pegawai.pangkat
			LEFT JOIN jabatan ON jabatan.id_jabatan = pegawai.jabatan";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->nip;
			$row[] = $hasil->nama_pegawai;
			$row[] = $hasil->nama_pangkat==''?'': $hasil->nama_pangkat.', '.$hasil->golongan.'/'.$hasil->ruang;
			$row[] = strlen($hasil->nama_jabatan) >= 20 ? substr($hasil->nama_jabatan, 0, 20) . "..." : $hasil->nama_jabatan;
			$row[] = '<center>
			<a class="btn waves-effect waves-light btn-success btn-icon" href="' . base_url() . 'pegawai/tampil/' . $hasil->id_pegawai . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a>
			<a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'pegawai/ubah/' . $hasil->id_pegawai . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_pegawai . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
			$row[] = $hasil->id_pegawai;
			$data[] = $row;
		}
		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $count_all,
			"recordsFiltered"   => $count_all,
			"data"              => $data,
		);
		return $output;
	}
	public function getAllData()
	{
		return $this->db->get('pegawai')->result();
	}
	public function getAllDataPangkat()
	{
		return $this->db->get('pangkat')->result();
	}
	public function getDetail($id)
	{
		$this->db->join('jabatan', 'pegawai.jabatan = jabatan.id_jabatan', 'left');
		$this->db->join('pangkat', 'pegawai.pangkat = pangkat.id_pangkat', 'left');
		$this->db->where('id_pegawai', $id);
		return $this->db->get('pegawai')->row();
	}

	public function tambah()
	{
		$nip = $this->input->post("nip", true);
		$name = $this->input->post("name", true);
		$pangkat = $this->input->post("pangkat", true);
		$jabatan = $this->input->post("jabatan", true);
		$data = [
			'nip' => $nip,
			'nama_pegawai' => $name,
			'pangkat' => $pangkat,
			'jabatan' => $jabatan,
		];
		return $this->db->insert('pegawai', $data);
	}
	
	public function ubah($id)
	{
		$nip = $this->input->post("nip", true);
		$name = $this->input->post("name", true);
		$pangkat = $this->input->post("pangkat", true);
		$jabatan = $this->input->post("jabatan", true);
		$data = [
			'nip' => $nip,
			'nama_pegawai' => $name,
			'pangkat' => $pangkat,
			'jabatan' => $jabatan,
		];
		$this->db->where('id_pegawai', $id);
		return $this->db->update('pegawai', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->delete('pegawai');
	}
}
