<?php

//Controller Divisi Pendistribusian dan Pendayagunaan Peminjaman Mobil

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
		$this->load->model('mobil/Pendistribusian_model');

		if ($this->session->userdata('id_divisi')!="2") 
		{
			redirect('login/index');
		}
	}

	//tampilan index
	public function index()
	{
		$data['judul'] = 'Halaman Index';
		$data['count']=$this->Pendistribusian_model->get_count_booking();
		$data['count_m']=$this->Pendistribusian_model->get_count_mobil();
		$data['jumlahuser'] = $this->Pendistribusian_model->get_username();
		$data['jumlahbooking'] = $this->Pendistribusian_model->get_booking();
		$data['divisi'] = $this->Pendistribusian_model->get_member_by_id($this->session->userdata('id_divisi'));
		$this->load->view('template/v_header4',$data);
		$this->load->view('v_index',$data);  
		$this->load->view('template/v_footer');
	}

	//form peminjaman
	public function pendistribusian()
	{
		$data['judul'] = 'Halaman Ruang Rapat';
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['mobil'] = $this->Pendistribusian_model->get_mobil();
		$data['booking'] = $this->Pendistribusian_model->getAllbooking($this->session->userdata('id_divisi'));
		$data['divisi'] = $this->Pendistribusian_model->get_member_by_id($this->session->userdata('id_divisi'));
		$data['id_divisi'] = $this->session->userdata('id_divisi');

		$this->form_validation->set_rules('tujuan','Tujuan','required');
		$this->form_validation->set_rules('mobil','Nama Mobil','required');
		$this->form_validation->set_rules('tglawal','Tanggal','required');
		$this->form_validation->set_rules('waktuawal','Waktu','required');
		$this->form_validation->set_rules('tglakhir','Tanggal','required');
		$this->form_validation->set_rules('waktuakhir','Waktu','required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/pendistribusian/v_form',$data);
			$this->load->view('template/v_footer');
		}
		else{
			$this->Pendistribusian_model->tambahDataBooking();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('mobil/pendistribusian/confirmasi');
		}
		
	}

	//send email
	public function confirmasi()
	{
		
		if($this->sendemail())  
		{  
       // successfully sent mail to user email  
			$this->session->set_flashdata('flash','Ditambahkan'); 
			redirect(base_url('mobil/pendistribusian/table'));  
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
			$this->email->message("<html><head><head></head><body><p><b>Hai Admin!</b></p>Divisi Pendistribusian dan Pendayagunaan baru saja membooking mobil YBM PLN Gandaria.</p><p> Klik <strong><a href='http://192.168.2.110/ci_mobil/admin/databooking' target='_blank' rel='noopener' class='btn btn-danger'>disini</a></strong> untuk melihat detailnya.</p><br/>Terima Kasih </p></body></html>");  
			if (!$this->email->send()) {  
				show_error($this->email->print_debugger());   
			}
			else{  
				$this->session->set_flashdata('flash','Ditambahkan');  
				redirect('mobil/pendistribusian/table');   
			}  
		}  

		//detail data
		public function detail($id)
		{
			$data['judul'] = 'Detail Data Booking';
			$data['detail'] = $this->Pendistribusian_model->getBookingById($id);
			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/pendistribusian/v_detail',$data);
			$this->load->view('template/v_footer');
		}

		//edit data
		public function edit($id){
			$query = $this->db->get_where('tb_booking_mobil', array('id_booking' => $id));
			$data['edit'] = $query->row();
			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/pendistribusian/v_ubah',$data);
			$this->load->view('template/v_footer');
		}
		public function ubah($id)
		{
			$data['judul'] = 'Halaman Form Ubah Data';
			$data['divisi'] = $this->Pendistribusian_model->get_member_by_id($this->session->userdata('id_divisi'));
			$data['id_divisi'] = $this->session->userdata('id_divisi');
			$data['user'] = $this->session->userdata('nama_lengkap');
			$data['mobil'] = $this->Pendistribusian_model->get_mobil();
			$data['booking'] = $this->Pendistribusian_model->getBookingById($id);
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
			
			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/pendistribusian/v_ubah',$data);
			$this->load->view('template/v_footer');
			
		}

		//save
		public function update()
		{
			$id = $this->input->post('id');
			$id_divisi = $this->input->post('id_divisi');
			$tujuan = $this->input->post('tujuan');
			$mobil = $this->input->post('mobil');
			$tanggal_booking  = $this->input->post('tglawal');
			$waktu_booking = $this->input->post('waktuawal');
			$tanggal_selesai = $this->input->post('tglakhir');
			$waktu_selesai = $this->input->post('waktuakhir');
			$nama_lengkap = $this->input->post('nama_lengkap');

			$data = array(
				
				'id_divisi' => $id_divisi,
				'tujuan' => $tujuan,
				'id_mobil' => $mobil,
				'tanggal_booking' => date('Y-m-d',strtotime($tanggal_booking)),
				'waktu_booking' => $waktu_booking,
				'tanggal_selesai' => date('Y-m-d',strtotime($tanggal_selesai)),
				'waktu_selesai' => $waktu_selesai,
				'nama_lengkap' =>$nama_lengkap,
			);
			$this->db->where('id_booking',$id);
			if ($this->db->update('tb_booking_mobil', $data)) {
				$this->session->set_flashdata('flash','Diubah');
				redirect('mobil/pendistribusian/table');
			}
			else{
				echo "gagal";
			}
		}

		//tampil data sesuai divisi
		public function table()
		{
			$data['judul'] = 'Halaman Mobil';
			$data['user'] = $this->Pendistribusian_model->get_user();
			$data['booking'] = $this->Pendistribusian_model->getAllbooking($this->session->userdata('id_divisi'));
			$data['divisi'] = $this->Pendistribusian_model->get_divisi();
			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/pendistribusian/table',$data);
			$this->load->view('template/v_footer');
			
		}	

		//tampil data semua divisi
		public function pendistribusiansemua()
		{
			$data['judul'] = 'Halaman Mobil';
			$data['user'] = $this->Pendistribusian_model->get_user();
			$data['booking'] = $this->Pendistribusian_model->getAllSemuaBooking();
			$data['divisi'] = $this->Pendistribusian_model->get_divisi();
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

			$this->load->view('template/v_header4',$data);
			$this->load->view('mobil/Pendistribusian/semua',$data);
			$this->load->view('template/v_footer');	
		}
		
	}
