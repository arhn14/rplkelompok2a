<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Model
{

	public function getLogin($u,$p)
	{
		//$pwd = md5($p);
		$this->db->where('username',$u);
		$this->db->where('password',$p);


		return $this->db->get('user');

		//adeganteng

				
		// 	$query = $this->db->get('admin');
		// if($query)
		// {
		// 	if ($query->num_rows()>0)
		// 	{
		// 		foreach ($query->result() as $row)
		// 		{
		// 			$sess = array(
		// 					'username'	=> $row->username,
		// 					'password'	=> $row->password
		// 				);
		// 			$this->session->userdata($sess);
		// 			redirect('admin');
		// 		}
		// 	}
		// 	else
		// 	{
		// 		$query2 = $this->db->get('kajur');
		// 		if ($query2->num_rows()>0)
		// 		{
		// 			foreach ($query2->result() as $row)
		// 			{
		// 				$sess2 = array(
		// 						'username'	=> $row->username,
		// 						'password'	=> $row->password
		// 					);
		// 				$this->session->userdata($sess2);
		// 				redirect('kajur');
		// 			}
		// 		}
		// 		else
		// 		{
		// 			$query3 = $this->db->get('dosen');
		// 			if ($query3->num_rows()>0)
		// 			{
		// 				foreach ($query3->result() as $row)
		// 				{
		// 					$sess3 = array(
		// 							'username'	=> $row->username,
		// 							'password'	=> $row->password
		// 						);
		// 					$this->session->userdata($sess3);
		// 					redirect('dosen');
		// 				}
		// 			}
		// 			else
		// 			{
		// 				$this->session->set_flashdata('info','Maaf Username Atau Password Salah');
		// 				redirect('login');
		// 			}
		// 		}
		// 	}
		// }
		// else
		// {
		// 	$this->session->set_flashdata('info','Maaf Username Atau Password Salah');
		// 	redirect('login');
		// }

	}

}
 ?>