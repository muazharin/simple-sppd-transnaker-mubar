<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
	public function list_jabatan()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM jabatan 
				WHERE nama_jabatan LIKE '%$keyword%'
				ORDER BY id_jabatan DESC";
		} else {
			$query = "SELECT * FROM jabatan ORDER BY id_jabatan DESC";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->nama_jabatan;
			$row[] = '<center><a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'jabatan/ubah/' . $hasil->id_jabatan . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_jabatan . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
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

	public function tambah()
	{
		$nama_jabatan = $this->input->post("nama_jabatan", true);
		$data = [
			'nama_jabatan' => $nama_jabatan,
		];
		return $this->db->insert('jabatan', $data);
	}

	public function getAllData()
	{
		return $this->db->get('jabatan')->result();
	}
	public function getDetail($id)
	{
		$this->db->where('id_jabatan', $id);
		return $this->db->get('jabatan')->row();
	}

	public function ubah($id)
	{
		$nama_jabatan = $this->input->post("nama_jabatan", true);
		$data = [
			'nama_jabatan' => $nama_jabatan,
		];
		$this->db->where('id_jabatan', $id);
		return $this->db->update('jabatan', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_jabatan', $id);
		return $this->db->delete('jabatan');
	}
}