<?php

//Controller Divisi Keuangan dan Umum Peminjaman Mobil

defined('BASEPATH') OR exit('No direct script access allowed');
class Keuangan extends CI_Controller{
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('mobil/Keuangan_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');

		if ($this->session->userdata('id_divisi')!="3") 
		{
			redirect('login/index');
		}
	}

	//tampilan index
	public function index()
	{
		$data['judul'] = 'Halaman Index';
		$data['count']=$this->Keuangan_model->get_count_booking();
		$data['count_m']=$this->Keuangan_model->get_count_mobil();
		$data['jumlahuser'] = $this->Keuangan_model->get_username();
		$data['jumlahbooking'] = $this->Keuangan_model->get_booking();
		$this->load->view('template/v_header3',$data);
		$this->load->view('v_index',$data);  
		$this->load->view('template/v_footer');
	}

	//form peminjaman
	public function keuangan()
	{
		$data['judul'] = 'Halaman Menu Mobil';
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['mobil']= $this->Keuangan_model->get_mobil();
		$data['booking'] = $this->Keuangan_model->getAllBooking($this->session->userdata('id_divisi'));
		$data['divisi'] = $this->Keuangan_model->get_member_by_id($this->session->userdata('id_divisi'));
		$data['id_divisi'] = $this->session->userdata('id_divisi');

		$this->form_validation->set_rules('tujuan','Tujuan','required');
		$this->form_validation->set_rules('mobil','Nama Mobil','required');
		$this->form_validation->set_rules('tglawal','Tanggal','required');
		$this->form_validation->set_rules('waktuawal','Waktu','required');
		$this->form_validation->set_rules('tglakhir','Tanggal','required');
		$this->form_validation->set_rules('waktuakhir','Waktu','required');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/keuangan/v_form',$data);
			$this->load->view('template/v_footer');
		}
		else{
			$this->Keuangan_model->tambahDataBooking();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('mobil/keuangan/confirmasi');
		}
		
	}

	//send email
	public function confirmasi()
	{
		
		if($this->sendemail())  
		{  
       // successfully sent mail to user email  
			$this->session->set_flashdata('flash','Ditambahkan'); 
			redirect(base_url('mobil/keuangan/keuangan'));  
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
			$this->email->message("<html><head><head></head><body><p><b>Hai Admin!</b></p>Divisi Keuangan dan Umum baru saja membooking mobil YBM PLN Gandaria.</p><p> Klik <strong><a href='http://192.168.2.110/ci_mobil/admin/databooking' target='_blank' rel='noopener' class='btn btn-danger'>disini</a></strong> untuk melihat detailnya.</p><br/>Terima Kasih </p></body></html>");  
			if (!$this->email->send()) {  
				show_error($this->email->print_debugger());   
			}
			else{  
				$this->session->set_flashdata('flash','Ditambahkan');  
				redirect('mobil/keuangan/table');   
			}  
		}  

		//detail data
		public function detail($id)
		{
			$data['judul'] = 'Detail Data Booking';
			$data['detail'] = $this->Keuangan_model->getBookingById($id);
			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/keuangan/v_detail',$data);
			$this->load->view('template/v_footer');
		}

		//edit data
		public function edit($id){
			$query = $this->db->get_where('tb_booking_mobil', array('id_booking' => $id));
			$data['edit'] = $query->row();
			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/keuangan/v_ubah',$data);
			$this->load->view('template/v_footer');
		}

		public function ubah($id)
		{
			$data['judul'] = 'Halaman Form Ubah Data';
			$data['mobil']= $this->Keuangan_model->get_mobil();
			$data['divisi'] = $this->Keuangan_model->get_member_by_id($this->session->userdata('id_divisi'));
			$data['id_divisi'] = $this->session->userdata('id_divisi');
			$data['user'] = $this->session->userdata('nama_lengkap');
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
			$data['booking'] = $this->Keuangan_model->getBookingById($id);
			
			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/keuangan/v_ubah',$data);
			$this->load->view('template/v_footer');
			
		}

		//save
		public function update()
		{
			$id = $this->input->post('id');
			$id_divisi = $this->input->post('id_divisi');
			$tujuan =$this->input->post('tujuan');
			$mobil =$this->input->post('mobil');
			$tanggal_booking  = $this->input->post('tglawal');
			$waktu_booking = $this->input->post('waktuawal');
			$tanggal_selesai = $this->input->post('tglakhir');
			$waktu_selesai = $this->input->post('waktuakhir');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$status = $this->input->post('status');
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
				redirect('mobil/Keuangan/table');
			}
			else{
				echo "gagal";
			}
		}

		//tampil data sesuai divisi
		public function table()
		{
			$data['judul'] = 'Halaman Mobil';
			$data['user'] = $this->Keuangan_model->get_user();
			$data['booking'] = $this->Keuangan_model->getAllbooking($this->session->userdata('id_divisi'));
			if ( $this->input->post('keyword')){
				$data['booking']= $this->Keuangan_model->cariDataPeminjaman();
			}
			$data['divisi'] = $this->Keuangan_model->get_divisi();
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/Keuangan/table',$data);
			$this->load->view('template/v_footer');
			
		}	

		//tampil data semua divisi
		public function keuangansemua()
		{
			$data['judul'] = 'Halaman Mobil';
			$data['user'] = $this->Keuangan_model->get_user();
			$data['booking'] = $this->Keuangan_model->getAllSemuaBooking();
			if ( $this->input->post('keyword')){
				$data['booking']= $this->Keuangan_model->cariDataPeminjaman();
			}
			$data['divisi'] = $this->Keuangan_model->get_divisi();
			$data['hari'] = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

			$this->load->view('template/v_header3',$data);
			$this->load->view('mobil/keuangan/semua',$data);
			$this->load->view('template/v_footer');	
		}
		

	}