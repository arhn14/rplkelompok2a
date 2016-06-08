<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('rencanarapat');
		$this->load->model('datarapat');
		$this->load->model('infodosen');
		$this->load->model('pengaturan');
	}

	public function index()
	{
		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="today">'
		);
		$this->load->library('calendar', $prefs);
		$data['kalender'] = $this->calendar->generate();
		$this->load->view('admin/beranda',$data);
	}

	public function profil()
	{
		$user = $this->session->userdata('username');
		$data['editdata'] = $this->pengaturan->profiladmin($user);
		$this->load->view('admin/profil',$data);
	}

	public function ubahdata()
	{
		$admin = $this->session->userdata('username');
		if ($this->input->post('submit')) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$hp = $this->input->post('hp');


			$object = array(
				'username' => $username,
				'password'	=> $password,
				'nip'	=> $nip,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'email' => $email,
				'alamat' => $alamat,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $tanggal,
				'no_hp' => $hp
			);

			$this->db->where('username',$admin);

			$this->db->update('user',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Biodata Telah Di Edit');
				redirect('admin/profil');
			}
			else
			{
				$this->session->set_flashdata('info','Biodata Belum Di Update');
				redirect('admin/ubahdata');
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('user',array('username'=>$admin))->row();
			$this->load->view('admin/editprofil',$data);
		}
	}

	public function rencanarapat()
	{
		$semuadata = $this->rencanarapat->semuadata();

		if ($semuadata) 
		{
			$data['tabel'] = $semuadata;			
			$this->load->view('admin/rencanarapat',$data);
		}
		else
		{
			$data['tabel'] = $semuadata;
			$this->load->view('admin/rencanarapat',$data);
		}
	}

	public function editrencana($id)
	{
		if ($this->input->post('submit')) 
		{
			$perihal = $this->input->post('perihal');
			$tanggal = $this->input->post('tanggal');
			$jam = $this->input->post('time');
			$keterangan = $this->input->post('keterangan');

			$object = array(
				'perihal' => $perihal,
				'tanggal' => $tanggal,
				'shift'	=> $jam,
				'keterangan' => $keterangan
			);

			$this->db->where('id_rapat',$id);

			$this->db->update('rapat',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Data Telah Di Update');
				redirect('admin/rencanarapat');
			}
			else
			{
				$this->session->set_flashdata('info','Data Gagal Di Update');
				redirect('admin/editrencana/'.$id);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('rapat',array('id_rapat'=>$id))->row();
			$this->load->view('admin/editrencana',$data);
		}
		
	}

	public function batalrencana($id)
	{
		$this->rencanarapat->hapusdatarapat($id);
		$this->rencanarapat->hapus($id);
		if ($this->db->affected_rows())
		{				
			$this->session->set_flashdata('info','Data Telah Di Hapus');
			redirect('admin/rencanarapat');
		}
		else
		{
			$this->session->set_flashdata('info','Data Gagal Di Hapus');
			redirect('admin/rencanarapat');
		}
	}

	public function undanganrencana($id)
	{
		if ($this->input->post('submit')) 
		{
			$perihal= $this->input->post('perihal');
			$undangan= $this->input->post('undangan');

			$object = array(
				'undangan' => $undangan
			);

			$this->db->where('id_rapat',$id);

			$this->db->update('rapat',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Undangan Rapat Telah Dikirim');
				redirect('admin/rencanarapat');
			}
			else
			{
				$this->session->set_flashdata('info','Undangan Rapat Perihal Belum Diubah');
				redirect('admin/undanganrencana/'.$id);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('rapat',array('id_rapat'=>$id))->row();
			$this->load->view('admin/undangan',$data);
		}
	}

	public function tambahrencana()
	{
		if($this->input->post('submit'))
		{
				$this->form_validation->set_rules('perihal','Perihal','trim|required');
				$this->form_validation->set_rules('tanggal','Tanggal','trim|required');
				$this->form_validation->set_rules('time','Jam','trim|required');
				$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
			
			if ($this->form_validation->run() === FALSE) 
			{
				$this->load->view('admin/inputrencana');
			}
			else
			{
				$perihal = $this->input->post('perihal');
				$tanggal = $this->input->post('tanggal');
				$jam = $this->input->post('time');
				$status = "belum";
				$keterangan = $this->input->post('keterangan');

				$object = array(
						'perihal' => $perihal,
						'tanggal' => $tanggal,
						'shift'	=> $jam,
						'status' => $status,
						'keterangan' => $keterangan
					);

				$query = $this->rencanarapat->insert($object);
				$query2 = $this->db->query("SELECT max(id_rapat) as id_rapat FROM rapat")->row();
				$idrapat=$query2->id_rapat;
				$data['user'] = $this->db->get('user')->result_array();
				for ($i=0;$i<count($data['user']);$i++){
					if($this->input->post('cek'.$data['user'][$i]['nip'])!=null){
						$object2 = array(
							'id_rapat' => $idrapat,
							'id_user' => $data['user'][$i]['nip']
						);
						$query3 = $this->db->insert('datarapat',$object2);

						$query4 = $this->db->get_where('user',array('nip'=>$data['user'][$i]['nip']))->result_array();

						$url = $_SERVER['HTTP_REFERER'];

						$config = array(
								'protocol'	=> 'smtp',
								'smtp_host' => 'ssl://smtp.googlemail.com',
							    'smtp_port' => 465,
							    'smtp_user' => 'arhnrahman14@gmail.com', //isi dengan gmailmu!
							    'smtp_pass' => 'arifaja140595', //isi dengan password gmailmu!
							    'mailtype' => 'html',
							    'charset' => 'iso-8859-1',
							    'wordwrap' => TRUE
							);

						$this->load->library('email', $config);
					    $this->email->set_newline("\r\n");
					    $this->email->from($config['smtp_user']);
					    $this->email->to($query4['email']); //email tujuan. Isikan dengan emailmu!
					    $this->email->message($keterangan);
					}
				}
				if($query)
				{					
					$this->session->set_flashdata('info','Data Berhasil Ditambahkan');
					redirect('admin/rencanarapat',$data);					
				}
				else
				{
					$this->session->set_flashdata('info','Data Gagal Ditambahkan');
					redirect('admin/tambahrencana');
				}
			}		
		}		
		else
		{
			$data['kajur'] = $this->db->get_where('user',array('role'=>"kajur"))->result_object();
			$data['data'] = $this->pengaturan->datadosen();
			$this->load->view('admin/inputrencana',$data);
		}

	}

	public function datarapat()
	{
		$semuadata = $this->datarapat->semuadata();

		if ($semuadata) 
		{
			$data['tabel'] = $semuadata;			
			$this->load->view('admin/datarapat',$data);
		}
		else
		{
			$data['tabel'] = $semuadata;
			$this->load->view('admin/datarapat',$data);
		}
	}

	public function hapusrapat($id)
	{
		$this->datarapat->hapusdatarapat($id);
		$this->datarapat->hapusdata($id);
		if ($this->db->affected_rows())
		{			
			$this->session->set_flashdata('info','Data Telah Di Hapus');
			redirect('admin/datarapat');
		}
		else
		{
			$this->session->set_flashdata('info','Data Gagal Di Hapus');
			redirect('admin/datarapat');
		}
	}

	public function hasilrapat($id)
	{
		if ($this->input->post('submit')) 
		{
			$hasil = $this->input->post('hasil');

			$object = array(
				'hasil'	 => $hasil
			);

			$this->db->where('id_rapat',$id);

			$this->db->update('rapat',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Hasil Rapat dengan ID '.$id.' Telah Dibuat');
				redirect('admin/datarapat');
			}
			else
			{
				$this->session->set_flashdata('info','Hasil Rapat Belum Terkirim');
				redirect('admin/hasilrapat/'.$id);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('rapat',array('id_rapat'=>$id))->row();
			$this->load->view('admin/hasilrapat',$data);
		}
	}

	public function detilrapat($id)
	{
		$data['editdata'] = $this->db->get_where('rapat',array('id_rapat'=>$id))->row();
		$this->load->view('admin/lihathasilrapat',$data);		
	}

	public function infodosen()
	{
		$data['dosen'] = $this->infodosen->semuadata();
		$data['kajur'] = $this->infodosen->semuadata2();
		$sekarang = date('Y-m-d');
		$cari = $this->input->post('tanggal');
		$semuadata3 = $this->infodosen->jadwalkosong($sekarang);
		$data['tabel'] = $semuadata3;

		if ($this->input->post('submit')) 
		{
			$cari = $this->input->post('tanggal');
			$semuadata4 = $this->infodosen->jadwalkosong($cari);
			$data['tabel'] = $semuadata4;
			if ($semuadata4) 
			{		
				$this->load->view('admin/infodosen',$data);
			}
			else
			{
				$this->load->view('admin/infodosen',$data);
			}
		}
		else
		{
			$this->load->view('admin/infodosen',$data);
		}
	}

	public function detildosen($id)
	{
		$data['editdata'] = $this->db->get_where('user',array('nip'=>$id))->row();
		$this->load->view('admin/diridosen',$data);		
	}

	public function jadwaldosen($id)
	{
		$datadosen = $this->infodosen->datadosen($id);

		if ($datadosen) 
		{
			$tabel = $this->infodosen->tabeldosen($datadosen);
			$data['tabel'] = $tabel;			
			$this->load->view('admin/jadwaldosen',$data);
		}
		else
		{
			$tabel = "Tidak Ada Data";
			$data['tabel'] = $tabel;
			$this->load->view('admin/jadwaldosen',$data);
		}
	}

	public function pengaturan()
	{
		$data['admin'] = $this->pengaturan->dataadmin();
		$data['kajur'] = $this->pengaturan->datakajur();
		$data['dosen'] = $this->pengaturan->datadosen();
		$this->load->view('admin/pengaturan',$data);
	}

	public function editadmin($admin)
	{
		if ($this->input->post('submit')) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$hp = $this->input->post('hp');

			$object = array(
				'username' => $username,
				'password'	=> $password,
				'nip'	=> $nip,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'email' => $email,
				'alamat' => $alamat,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $tanggal,
				'no_hp' => $hp
			);

			$this->db->where('username',$admin);

			$this->db->update('user',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Akun Admin Di Update');
				redirect('admin/pengaturan');
			}
			else
			{
				$this->session->set_flashdata('info','Akun Belum Di Update');
				redirect('admin/editadmin/'.$admin);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('user',array('username'=>$admin))->row();
			$this->load->view('admin/aturadmin',$data);
		}
	}

	public function editkajur($kajur)
	{
		if ($this->input->post('submit')) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$hp = $this->input->post('hp');

			$object = array(
				'username' => $username,
				'password'	=> $password,
				'nip'	=> $nip,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'email' => $email,
				'alamat' => $alamat,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $tanggal,
				'no_hp' => $hp
			);

			$this->db->where('username',$kajur);

			$this->db->update('user',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Akun Kajur Di Update');
				redirect('admin/pengaturan');
			}
			else
			{
				$this->session->set_flashdata('info','Akun Belum Di Update');
				redirect('admin/editkajur/'.$kajur);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('user',array('username'=>$kajur))->row();
			$this->load->view('admin/aturkajur',$data);
		}
	}

	public function editdosen($dosen)
	{
		if ($this->input->post('submit')) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$hp = $this->input->post('hp');

			$object = array(
				'username' => $username,
				'password'	=> $password,
				'nip'	=> $nip,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'email' => $email,
				'alamat' => $alamat,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $tanggal,
				'no_hp' => $hp
			);

			$this->db->where('username',$dosen);

			$this->db->update('user',$object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info','Akun Dosen Di Update');
				redirect('admin/pengaturan');
			}
			else
			{
				$this->session->set_flashdata('info','Akun Belum Di Update');
				redirect('admin/editdosen/'.$dosen);
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('user',array('username'=>$dosen))->row();
			$this->load->view('admin/aturdosen',$data);
		}
	}

	public function hapusdosen($id)
	{
		$this->pengaturan->hapusdatadosen($id);
		if ($this->db->affected_rows())
		{				
		$this->pengaturan->hapusrapatdosen($id);
			$this->session->set_flashdata('info','Data Dosen Telah Di Hapus');
			redirect('admin/pengaturan');
		}
		else
		{
			$this->session->set_flashdata('info','Data Gagal Di Hapus');
			redirect('admin/pengaturan');
		}
	}

	public function dosenbaru()
	{
		if($this->input->post('submit'))
		{
				$this->form_validation->set_rules('username','Username','trim|required');
				$this->form_validation->set_rules('password','Password','trim|required');
				$this->form_validation->set_rules('nip','NIP','trim|required');
				$this->form_validation->set_rules('nama','Nama','trim|required');
			
			if ($this->form_validation->run() === FALSE) 
			{
				$this->load->view('admin/dosenbaru');
			}
			else
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');

				$object = array(
						'username' => $username,
						'password' => $password,
						'nip'	=> $nip,
						'nama' => $nama,
						'role' =>"dosen"
					);

				$query = $this->pengaturan->tambahdosen($object);

				if($query)
				{					
					$this->session->set_flashdata('info','Akun Berhasil Dibuat');
					redirect('admin/pengaturan');					
				}
				else
				{
					$this->session->set_flashdata('info','Akun Belum Dibuat');
					redirect('admin/dosenbaru');
				}
			}		
		}		
		else
		{
			$this->load->view('admin/dosenbaru');
		}
	}

}

?>