<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Model
{
	public function dataadmin()
	{
		return $this->db->get_where('user',array('role'=>"admin"))->row();
	}

	public function datakajur()
	{
		return $this->db->get_where('user',array('role'=>"kajur"))->row();
	}

	public function datadosen()
	{
		return $this->db->get_where('user',array('role'=>"dosen"))->result_object();
	}

	public function hapusdatadosen($param)
	{
		return $this->db->delete('user',array('nip'=>$param));
	}

	public function hapusrapatdosen($param)
	{
		return $this->db->delete('datarapat',array('id_user'=>$param));
	}

	public function tambahdosen($data)
	{
		return $this->db->insert('user',$data);
	}

	public function profildosen($user)
	{
		return $this->db->get_where('user',array('username'=>$user))->row();
	}

	public function profiladmin($user)
	{
		return $this->db->get_where('user',array('username'=>$user))->row();
	}
}
 ?>