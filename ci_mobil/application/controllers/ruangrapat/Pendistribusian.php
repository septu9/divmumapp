<?php

//Controller Divisi Pendistribusian dan Pendayagunaan Peminjaman Ruang Rapat

defined('BASEPATH') OR exit('No direct script access allowed');
class Pendistribusian extends CI_Controller{
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Login_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('ruangrapat/Pendistribusian_model2');

	}

	//tampilan index
	public function index()
	{
		$data['judul'] = 'Halaman Index';
		$data['jumlahuser'] = $this->Pendistribusian_model2->get_username();
		$data['jumlahbooking'] = $this->Pendistribusian_model2->get_booking();
		$this->load->view('template/v_header4',$data);
		$this->load->view('ruangrapat/Home/beranda_pendistribusian',$data);  
		$this->load->view('template/v_footer');
	}

	//form peminjaman
	public function pendistribusian()
	{
		$data['judul'] = 'Halaman Ruang Rapat';
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['all_booking'] = $this->Pendistribusian_model2->getAllbooking($this->session->userdata('id_divisi'));
		$data['divisi'] = $this->Pendistribusian_model2->get_member_by_id($this->session->userdata('id_divisi'));
		$data['id_divisi'] = $this->session->userdata('id_divisi');
		$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
		$data['status'] = ['Disetujui','Ditolak'];
		$this->form_validation->set_rules('agenda_meeting','agenda meeting','required');
		$this->form_validation->set_rules('tanggal_booking','tanggal','required');
		$this->form_validation->set_rules('waktu_booking','waktu','required');
		$this->form_validation->set_rules('tanggal_selesai','tanggal','required');
		$this->form_validation->set_rules('waktu_selesai','waktu','required');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/v_header4',$data);
			$this->load->view('ruangrapat/pendistribusian/form',$data);
			$this->load->view('template/v_footer');
		}
		else{
			$this->Pendistribusian_model2->tambahDataBooking();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('ruangrapat/pendistribusian/confirmasi');
		}
		
	}

	//tampil data sesuai divisi
	public function table()
	{
		$data['judul'] = 'Halaman Ruang Rapat';
		$data['user'] = $this->Pendistribusian_model2->get_user();
		$data['all_booking'] = $this->Pendistribusian_model2->getAllbooking($this->session->userdata('id_divisi'));
		$data['divisi'] = $this->Pendistribusian_model2->get_divisi();
		$this->load->view('template/v_header4',$data);
		$this->load->view('ruangrapat/pendistribusian/table',$data);
		$this->load->view('template/v_footer');
	}

	//detail data
	public function detail($id)
	{
		$data['judul'] = 'Detail Data Booking';
		$data['detail'] = $this->Pendistribusian_model2->getBookingById($id);
		$this->load->view('template/v_header4',$data);
		$this->load->view('ruangrapat/pendistribusian/detail',$data);
		$this->load->view('template/v_footer');
	}

	//tampil data semua divisi
	public function pendistribusiansemua()
	{
		$data['judul'] = 'Halaman Ruang Rapat';
		$data['user'] = $this->Pendistribusian_model2->get_user();
		$data['all_booking'] = $this->Pendistribusian_model2->getAllSemuaBooking();
		$data['divisi'] = $this->Pendistribusian_model2->get_divisi();
		$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
		$data['status'] = ['Disetujui','Ditolak'];
		$this->load->view('template/v_header4',$data);
		$this->load->view('ruangrapat/pendistribusian/semua',$data);
		$this->load->view('template/v_footer');
	}

	//send email
	public function confirmasi()
	{
		
		if($this->sendemail())  
		{  
       // successfully sent mail to user email  
			$this->session->set_flashdata('flash','Ditambahkan'); 
			redirect(base_url('ruangrapat/pendistribusian/table'));  
		}  
		else  
		{  
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">gagal</div>');  
			echo "gagal";  
		} }

		public function sendemail(){

			$config = Array(  
				'protocol' => 'smtp',  
				'smtp_host' => 'ssl://smtp.googlemail.com',  
				'smtp_port' => 465,  
				'smtp_user' => 'ybmpln@gmail.com',   
				'smtp_pass' => 'ybmpln2017',   
				'mailtype' => 'html',   
				'charset' => 'iso-8859-1'  
			);  
			$this->load->library('email', $config);  
			$this->email->set_newline("\r\n");  
			$this->email->from('ybmpln@gmail.com', 'YBM PLN Gandaria');   
			$this->email->to('admin@ybmpln.org');   
			$this->email->subject('Notifikasi Booking');   
			$this->email->message("<html><head><head></head><body><p><b>Hai Admin!</b></p>Divisi Pendistribusian dan Pendayagunaan baru saja membooking ruang rapat YBM PLN Gandaria.</p><p> Klik <strong><a href='http://192.168.2.110/ci_mobil/admin/databooking' target='_blank' rel='noopener' class='btn btn-danger'>disini</a></strong> untuk melihat detailnya.</p><br/>Terima Kasih </p></body></html>");  
			if (!$this->email->send()) {  
				show_error($this->email->print_debugger());   
			}
			else{  
				$this->session->set_flashdata('flash','Ditambahkan');  
				redirect('ruangrapat/pendistribusian/table');   
			}  
		}  

		//ubah data
		public function edit($id){
			$query = $this->db->get_where('tbl_booking_ruangrapat', array('id_booking' => $id));
			$data['edit'] = $query->row();
			$this->load->view('template/v_header4',$data);
			$this->load->view('ruangrapat/pendistribusian/form_ubah',$data);
			$this->load->view('template/v_footer');
		}
		public function ubah($id)
		{
			$data['judul'] = 'Halaman Form Ubah Data';
			$data['divisi'] = $this->Pendistribusian_model2->get_member_by_id($this->session->userdata('id_divisi'));
			$data['id_divisi'] = $this->session->userdata('id_divisi');
			$data['user'] = $this->session->userdata('nama_lengkap');
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
			$data['booking'] = $this->Pendistribusian_model2->getBookingById($id);
			
			$this->load->view('template/v_header4',$data);
			$this->load->view('ruangrapat/pendistribusian/form_ubah',$data);
			$this->load->view('template/v_footer');
			
		}

		//save
		public function update()
		{
			$id = $this->input->post('id');
			$id_divisi = $this->input->post('id_divisi');
			$agenda_meeting =$this->input->post('agenda_meeting');
			$tanggal_booking  = $this->input->post('tanggal_booking');
			$waktu_booking = $this->input->post('waktu_booking');
			$tanggal_selesai = $this->input->post('tanggal_selesai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$data = array(
				
				"id_divisi" => $id_divisi,
				"agenda_meeting" =>$agenda_meeting,
				"tanggal_booking" =>$tanggal_booking,
				"waktu_booking" =>$waktu_booking,
				"tanggal_selesai"=>$tanggal_selesai,
				"waktu_selesai"=>$waktu_selesai,
				"nama_lengkap"=>$nama_lengkap
			);
			$this->db->where('id_booking',$id);
			if ($this->db->update('tbl_booking_ruangrapat', $data)) {
				$this->session->set_flashdata('flash','Diubah');
				redirect('ruangrapat/pendistribusian/table');
			}
			else{
				echo "gagal";
			}
		}
		
		
	}
