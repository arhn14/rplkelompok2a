<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalkosong extends CI_Model
{

	public function semuadata($user)
		{
			return $this->db->get_where('jadwalkosong',array('id_user'=>$user))->result_object();
		}

	public function buattabel($datatabel)
	{
		$this->load->library('table');
		$template = array(
				'table_open' => '<table class = "table table-bordered">'
			);
		$this->table->set_template($template);

		$this->table->set_heading('No','Tanggal','Shift','Pengaturan');

		$no = 0;
		foreach ($datatabel as $row) 
		{
			$this->table->add_row(
					++$no,
					$row->tanggal,
					$row->shift,
					anchor('dosen/bataljadwal/'.$row->id_jadwal,'Batalkan',array('class'=>'btn btn-mini'))
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

		$this->table->set_heading('No','Tanggal','Shift','Pengaturan');

		$no = 0;
		foreach ($datatabel as $row) 
		{
			$this->table->add_row(
					++$no,
					$row->tanggal,
					$row->shift,
					anchor('kajur/bataljadwal/'.$row->id_jadwal,'Batalkan',array('class'=>'btn btn-mini'))
				);
		}
		return $this->table->generate();
	}

	public function tambahjadwal($data)
	{
		return $this->db->insert('jadwalkosong',$data);
	}

	public function hapusjadwal($param)
	{
		return $this->db->delete('jadwalkosong',array('id_jadwal'=>$param));
	}

}
 ?>