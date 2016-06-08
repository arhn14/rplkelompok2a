<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('masuk');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('datarapat');
		$this->load->model('pengaturan');
		$this->load->model('jadwalkosong');
		$this->load->model('evencal_model', 'evencal');
		$this->load->library('calendar', $this->_setting());

	}

	public function index($year = null, $month = null, $day = null)
	{
		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="today">'
		);
		$this->load->library('calendar', $prefs);
		// $data['data']=$this->session->userdata('nama');		
		$user = $this->session->userdata('nip');
		$year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
		$month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
		$day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
		
		$date      = $this->evencal->getDateEvent($year, $month, $user);
		$cur_event = $this->evencal->getEvent($year, $month, $day, $user);
		$data      = array(
						'notes' => $this->calendar->generate($year, $month, $date),
						'year'  => $year, 
						'mon'   => $month,
						'month' => $this->_month($month),
						'day'   => $day,
						'events'=> $cur_event
					);
		$this->load->view('dosen/beranda',$data);
	}

	public function profil()
	{
		$user = $this->session->userdata('username');
		$data['editdata'] = $this->pengaturan->profildosen($user);
		$this->load->view('dosen/profil',$data);
	}

	public function ubahdata()
	{
		$dosen = $this->session->userdata('username');
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
				$this->session->set_flashdata('info','Biodata Telah Di Edit');
				redirect('dosen/profil');
			}
			else
			{
				$this->session->set_flashdata('info','Biodata Belum Di Update');
				redirect('dosen/ubahdata');
			}
		}
		else
		{
			$data['editdata'] = $this->db->get_where('user',array('username'=>$dosen))->row();
			$this->load->view('dosen/editprofil',$data);
		}
	}

	public function datarapat()
	{
		$user = $this->session->userdata('nip');

		$year = null; $month = null; $day = null;
		$year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
		$month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
		$day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
		
		$date      = $this->evencal->getDateEvent($year, $month, $user);
		$cur_event = $this->evencal->getEvent($year, $month, $day, $user);
		$data      = array(
						'notes' => $this->calendar->generate($year, $month, $date),
						'year'  => $year, 
						'mon'   => $month,
						'month' => $this->_month($month),
						'day'   => $day,
						'events'=> $cur_event
					);	
		$data['tabel'] = $this->datarapat->rapatdosen($user);	

		if ($data) 
		{			
			$this->load->view('dosen/datarapat',$data);
		}
		else
		{
			$this->load->view('dosen/datarapat',$data);
		}
	}

	public function detilrapat($id)
	{
		$data['editdata'] = $this->db->get_where('rapat',array('id_rapat'=>$id))->row();
		$this->load->view('dosen/lihathasilrapat',$data);
		
	}

	public function jadwal()
	{
		$user = $this->session->userdata('nip');

		$year = null; $month = null; $day = null;
		$year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
		$month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
		$day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
		
		$date      = $this->evencal->getDateEvent($year, $month, $user);
		$cur_event = $this->evencal->getEvent($year, $month, $day, $user);
		$data      = array(
						'notes' => $this->calendar->generate($year, $month, $date),
						'year'  => $year, 
						'mon'   => $month,
						'month' => $this->_month($month),
						'day'   => $day,
						'events'=> $cur_event
					);

		if($this->input->post('submit'))
		{
				$this->form_validation->set_rules('tanggal','Tanggal','trim|required');
				$this->form_validation->set_rules('jam','Jam','trim|required');
			
			if ($this->form_validation->run() === FALSE) 
			{
				$this->load->view('dosen/jadwaldosen');
			}
			else
			{
				$tanggal = $this->input->post('tanggal');
				$jam = $this->input->post('jam');
				$user = $this->session->userdata('nip');

				$object = array(
						'tanggal' => $tanggal,
						'shift'	=> $jam,
						'id_user' => $user
					);

				$query = $this->jadwalkosong->tambahjadwal($object);

				if($query)
				{					
					$this->session->set_flashdata('info','Data Berhasil Ditambahkan');
					redirect('dosen/jadwal', $data);					
				}
				else
				{
					$this->session->set_flashdata('info','Data Gagal Ditambahkan');
					redirect('dosen/jadwal', $data);
				}
			}		
		}		
		else
		{			
			$user = $this->session->userdata('nip');
			$semuadata = $this->jadwalkosong->semuadata($user);			

			if ($semuadata) 
			{
				$tabel = $this->jadwalkosong->buattabel($semuadata);
				$data['tabel'] = $tabel;			
				$this->load->view('dosen/jadwaldosen',$data);
			}
			else
			{
				$tabel = "Tidak Ada Data";
				$data['tabel'] = $tabel;
				$this->load->view('dosen/jadwaldosen',$data);
			}
			
		}		
	}

	// for convert (int) month to (string) month in Indonesian
	function _month($month){
		$month = (int) $month;
		switch($month){
			case 1 : $month = 'Januari'; Break;
			case 2 : $month = 'Februari'; Break;
			case 3 : $month = 'Maret'; Break;
			case 4 : $month = 'April'; Break;
			case 5 : $month = 'Mei'; Break;
			case 6 : $month = 'Juni'; Break;
			case 7 : $month = 'Juli'; Break;
			case 8 : $month = 'Agustus'; Break;
			case 9 : $month = 'September'; Break;
			case 10 : $month = 'Oktober'; Break;
			case 11 : $month = 'November'; Break;
			case 12 : $month = 'Desember'; Break;
		}
		return $month;
	}
	
	// get detail event for selected date
	function detail_event(){		
		$this->form_validation->set_rules('year', 'Year', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('mon', 'Month', 'trim|required|is_natural_no_zero|less_than[13]');
		$this->form_validation->set_rules('day', 'Day', 'trim|required|is_natural_no_zero|less_than[32]');
		
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('status' => false, 'title_msg' => 'Error', 'msg' => 'Please insert valid value'));
		}else{
			$data = $this->evencal->getEvent($this->input->post('year', true), $this->input->post('mon', true), $this->input->post('day', true), $this->session->userdata('nip'));
			if($data == null){
				echo json_encode(array('status' => false, 'title_msg' => 'Tidak Ada Rapat'));
			}else{			
				echo json_encode(array('status' => true, 'data' => $data));
			}
		}
	}
	
	// setting for calendar
	function _setting(){
		return array(
			'start_day' 		=> 'monday',
			'show_next_prev' 	=> true,
			'next_prev_url' 	=> site_url('dosen/index'),
			'month_type'   		=> 'long',
            'day_type'     		=> 'short',
			'template' 			=> '{table_open}<table class="date">{/table_open}
								   {heading_row_start}&nbsp;{/heading_row_start}
								   {heading_previous_cell}<caption><a href="{previous_url}" class="prev_date" title="Previous Month">&lt;&lt;Prev</a>{/heading_previous_cell}
								   {heading_title_cell}{heading}{/heading_title_cell}
								   {heading_next_cell}<a href="{next_url}" class="next_date"  title="Next Month">Next&gt;&gt;</a></caption>{/heading_next_cell}
								   {heading_row_end}<col class="weekday" span="5"><col class="weekend_sat"><col class="weekend_sun">{/heading_row_end}
								   {week_row_start}<thead><tr>{/week_row_start}
								   {week_day_cell}<th>{week_day}</th>{/week_day_cell}
								   {week_row_end}</tr></thead><tbody>{/week_row_end}
								   {cal_row_start}<tr>{/cal_row_start}
								   {cal_cell_start}<td>{/cal_cell_start}
								   {cal_cell_content}<div class="date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content}
								   {cal_cell_content_today}<div class="active_date_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content_today}
								   {cal_cell_no_content}<div class="no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content}
								   {cal_cell_no_content_today}<div class="active_no_event detail" val="{day}"><span class="date">{day}</span><span class="event d{day}">&nbsp;</span></div>{/cal_cell_no_content_today}
								   {cal_cell_blank}&nbsp;{/cal_cell_blank}
								   {cal_cell_end}</td>{/cal_cell_end}
								   {cal_row_end}</tr>{/cal_row_end}
								   {table_close}</tbody></table>{/table_close}');
	}

	public function bataljadwal($id)
	{
		$this->jadwalkosong->hapusjadwal($id);
		if ($this->db->affected_rows())
		{				
			$this->session->set_flashdata('info','Jadwal Telah Di Hapus');
			redirect('dosen/jadwal');
		}
		else
		{
			$this->session->set_flashdata('info','Jadwal Gagal Di Hapus');
			redirect('dosen/jadwal');
		}
	}

}

?>