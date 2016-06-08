<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Datarapat extends CI_Model
{
	
	public function semuadata()
	{
		return $this->db->get('rapat')->result_object();
	}

	public function rapatdosen($nip)
	{
		$this->db->select('*');
		$this->db->from('datarapat');
		$this->db->join('rapat','rapat.id_rapat=datarapat.id_rapat','left');
		$this->db->like("id_user",$nip);
		return $this->db->get()->result_object();
	}

	public function hapusdata($param)
	{
		return $this->db->delete('rapat',array('id_rapat'=>$param));
	}

	public function hapusdatarapat($param)
	{
		return $this->db->delete('datarapat',array('id_rapat'=>$param));
	}

}
 ?>