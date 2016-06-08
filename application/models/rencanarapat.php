<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencanarapat extends CI_Model
{
	
	public function semuadata()
	{
		return $this->db->get_where('rapat',array('status'=>"belum"))->result_object();
	}

	public function insert($data)
	{
		return $this->db->insert('rapat',$data);
	}

	public function hapus($param)
	{
		return $this->db->delete('rapat',array('id_rapat'=>$param));
	}

	public function hapusdatarapat($param)
	{
		return $this->db->delete('datarapat',array('id_rapat'=>$param));
	}

}
 ?>