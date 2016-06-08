<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Infodosen extends CI_Model
{
	public function semuadata()
	{
		return $this->db->get_where('user',array('role'=>"dosen"))->result_object();
	}

	public function semuadata2()
	{
		return $this->db->get_where('user',array('role'=>"kajur"))->result_object();
	}

	public function buattabel($datatabel)
	{
		$this->load->library('table');
		$template = array(
				'table_open' => '<table class = "table table-bordered">'
			);
		$this->table->set_template($template);

		$this->table->set_heading('No','NIP','Nama','Jabatan','Pilihan');

		$no = 0;
		foreach ($datatabel as $row) 
		{
			$this->table->add_row(
					++$no,
					$row->nip,
					$row->nama,
					$row->jabatan,
					anchor('admin/detildosen/'.$row->nip,'Detail',array('class'=>'btn btn-mini')).'||'.
					anchor('admin/jadwaldosen/'.$row->nip,'Jadwal',array('class'=>'btn btn-mini'))
				);
		}
		return $this->table->generate();
	}

	public function kbuattabel($datatabel)
	{
		$this->load->library('table');
		$template = array(
				'table_open' => '<table class = "table table-bordered">'
			);
		$this->table->set_template($template);

		$this->table->set_heading('No','NIP','Nama','Jabatan','Pilihan');

		$no = 0;
		foreach ($datatabel as $row) 
		{
			$this->table->add_row(
					++$no,
					$row->nip,
					$row->nama,
					$row->jabatan,
					anchor('kajur/detildosen/'.$row->nip,'Detail',array('class'=>'btn btn-mini')).'||'.
					anchor('kajur/jadwaldosen/'.$row->nip,'Jadwal',array('class'=>'btn btn-mini'))
				);
		}
		return $this->table->generate();
	}

	public function datadosen($param)
	{
		return $this->db->get_where('jadwalkosong',array('id_user'=>$param))->result_object();
	}

	public function tabeldosen($datatabel)
	{
		$this->load->library('table');
		$template = array(
				'table_open' => '<table class = "table table-bordered">'
			);
		$this->table->set_template($template);

		$this->table->set_heading('No','Tanggal','Waktu');

		$no = 0;
		foreach ($datatabel as $row) 
		{
			$this->table->add_row(
					++$no,
					$row->tanggal,
					$row->shift
				);
		}
		return $this->table->generate();
	}

	public function jadwalkosong($param)
	{
		$this->db->select('*');
		$this->db->from('jadwalkosong');
		$this->db->join('user','user.nip=jadwalkosong.id_user');
		$this->db->like("tanggal",$param);
		return $this->db->get()->result_object();
	}
}
 ?>