<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('masuk');
	}

	public function index()
	{
		$data['data'] = $this->db->query("SELECT a.tanggal, a.id_rapat FROM rapat as a")->result_array();
		if($data)
		{
			for($i=0;$i<count($data['data']);$i++)
			{
				$sekarang = date('Y-m-d');
				$tanggal=$data['data'][$i]['tanggal'];
				$kurang=$sekarang-$tanggal;
				if($kurang > 0)
				{
					$status = array(
						'status' => "selesai"
						);
					$this->db->where('id_rapat',$data['data'][$i]['id_rapat']);
					$this->db->update('rapat',$status);
				}
			}
			
				$this->load->view('login');
		}
		else
		{

			$this->load->view('login');
		}
	}

	public function getMasuk()
	{
		
		if($this->input->post('submit'))
		{
			$u = $this->input->post('username');
			$pwd = $this->input->post('password');
			$query = $this->masuk->getLogin($u,$pwd);

			if($query->num_rows()>0)
			{
				foreach ($query->result() as $row)
				{
					$sess['username'] = $row->username;
					$sess['password'] = $row->password;
					$sess['nip'] = $row->nip;
					$sess['nama'] = $row->nama;
					$sess['role'] = $row->role;
					$this->session->set_userdata($sess);
				}

				if($this->session->userdata('role')=='admin')
				{
					redirect('admin');
				}
				else if($this->session->userdata('role')=='kajur')
				{
					redirect('kajur');
				}
				else if($this->session->userdata('role')=='dosen')
				{
					redirect('dosen');
				}
				else
				{
					$this->session->set_flashdata('info','Maaf Username Atau Password Salah');
					redirect('login');
				}
			}
			else
			{
				$this->session->set_flashdata('info','Maaf Username Atau Password Salah');
				redirect('login');
			}

		}
		else
		{
			$this->load->view('login');

		}
	}

}
?>