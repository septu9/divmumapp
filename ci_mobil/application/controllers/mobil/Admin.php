<?php

//Controller Admin Peminjaman Mobil
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Login_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session','email');
		$this->load->helper('url');
		$this->load->model('mobil/Admin_model');
		$this->load->library('excel');

		if ($this->session->userdata('id_divisi')!="5") 
		{
			redirect('login/index');
		}
	}

	//tampilan index
	public function index()
	{
		$data['judul']="Halaman Dashboard";
		$data['count']=$this->Admin_model->get_count_booking();
		$data['count_m']=$this->Admin_model->get_count_mobil();
		$data['count_d']=$this->Admin_model->get_count_divisi();
		$data['jumlahuser'] = $this->Admin_model->get_username();
		$data['jumlahbooking'] = $this->Admin_model->get_booking();
		$data['datauser'] = $this->Admin_model->getAlldatauser();
		$data['divisi'] = $this->Admin_model->get_member_by_id($this->session->userdata('id_divisi'));
		$this->load->view('template/v_header',$data);
		$this->load->view('v_index',$data);
		$this->load->view('template/v_footer');
	} 

	//form peminjaman
	public function admin()
	{
		$data['judul']="Halaman Form User";
		$data['divisi'] = $this->Admin_model->get_member_by_id($this->session->userdata('id_divisi'));
		$data['id_divisi'] = $this->session->userdata('id_divisi');
		$data['mobil']=$this->Admin_model->get_mobil();
		$data['user'] = $this->session->userdata('nama_lengkap');

		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/admin/v_form',$data);
		$this->load->view('template/v_footer');
	}

	public function masukuser()
	{
		$id_divisi = $this->input->post('id_divisi');
		$tujuan =$this->input->post('tujuan');
		$mobil =$this->input->post('mobil');
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
		if ($this->db->insert('tb_booking_mobil', $data)) {
			$this->session->set_flashdata('message','Data telah disimpan');
			redirect('mobil/admin/databooking');
		}
		else{
			echo "gagal";
		}
	}
	
	//tampil data
	public function databooking(){
		$data['judul']="Halaman Data Booking User";
		$data['booking']=$this->Admin_model->getAlldatauser();
		if ( $this->input->post('keyword')){
			$data['booking']= $this->Admin_model->cariDataPeminjaman();
		}
		$data['status'] = ['Disetujui','Ditolak'];


		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/admin/v_data',$data);
		$this->load->view('template/v_footer');

	}

	//hapus
	public function hapus($id)
	{
		$this->Admin_model->hapusDatabooking($id);
		$this->session->set_flashdata('flash','dihapus');
		redirect('mobil/admin/confirmasi');
	}

	//send email
	public function confirmasi()
	{

		if($this->sendemail())  
		{  
       // successfully sent mail to user email  
			$this->session->set_flashdata('flash','Ditambahkan'); 
			redirect(base_url('mobil/admin/databooking'));  
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
			$this->email->message("<html><head><head></head><body><p><b>Hai Admin!</b></p>User baru saja membooking mobil YBM PLN Gandaria.</p><p> Klik <strong><a href='http://192.168.2.110/ci_mobil/admin/databooking' target='_blank' rel='noopener' class='btn btn-danger'>disini</a></strong> untuk melihat detailnya.</p><br/>Terima Kasih </p></body></html>");  
			if (!$this->email->send()) {  
				show_error($this->email->print_debugger());   
			}
			else{  
				$this->session->set_flashdata('flash','Ditambahkan');  
				redirect('mobil/admin/databooking');   
			}  
		}  

		//detail data
		public function detail($id)
		{
			$data['judul'] = 'Detail Data Booking';
			$data['detail'] = $this->Admin_model->getBookingById($id);
			$this->load->view('template/v_header',$data);
			$this->load->view('mobil/admin/v_detail',$data);
			$this->load->view('template/v_footer');
		}

		//edit data
		public function edit($id){
			$query = $this->db->get_where('mahasiswa', array('id_booking' => $id));
			$data['mahasiswa'] = $query->row();
			$this->load->view('template/v_header',$data);
			$this->load->view('admin/v_ubah',$data);
			$this->load->view('template/v_footer');
		}
		public function ubah($id)
		{
			$data['judul'] = 'Halaman Menu Mobil';
			$data['divisi'] = $this->Admin_model->get_member_by_id($this->session->userdata('id_divisi'));
			$data['id_divisi'] = $this->session->userdata('id_divisi');
			$data['user'] = $this->Admin_model->get_user();
			$data['mobil']=$this->Admin_model->get_mobil();
			$data['booking'] = $this->Admin_model->getBookingById($id);
			
			$this->load->view('template/v_header',$data);
			$this->load->view('mobil/admin/v_update',$data);
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
				redirect('mobil/admin/databooking');
			}
			else{
				echo "gagal";
			}
		}

		
	}