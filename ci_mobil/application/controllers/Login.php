<?php

//Controller Login

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Login_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
	}

	//tampilan index
	public function index()
	{
		$data['judul'] = 'YBM PLN Gandaria';
		$this->load->view('index',$data);
	}

	//cek username and password
	public function proses_login()
	{
		$data['judul'] = 'YBM PLN Gandaria';
		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$ceklogin = $this->Login_model->login($user,$pass);

		if ($ceklogin) {
			foreach ($ceklogin as $row);
			$this->session->set_userdata('email',$row->email);
			$this->session->set_userdata('id_divisi',$row->id_divisi);
			$this->session->set_userdata('alamat',$row->alamat);
			$this->session->set_userdata('telepon',$row->telepon);
			$this->session->set_userdata('id',$row->id_divisi);
			$this->session->set_userdata('id_user',$row->id);
			$this->session->set_userdata('nama_lengkap',$row->nama_lengkap);
			$this->session->set_userdata('password',$row->password);
			$this->session->set_userdata('nama_divisi',$this->Login_model->get_member_by_id('id'));

			if ($this->session->userdata('id_divisi')=="5") {
				redirect('mobil/admin/index');
			}
			elseif ($this->session->userdata('id_divisi')=="1") {
				redirect('mobil/penghimpunan/index');
			}
			elseif ($this->session->userdata('id_divisi')=="2") {
				redirect('mobil/pendistribusian/index');
			}
			elseif ($this->session->userdata('id_divisi')=="3") {
				redirect('mobil/keuangan/index');
			}
			elseif ($this->session->userdata('id_divisi')=="4") {
				redirect('mobil/kepatuhan/index');
			}
		}
		else{
			$data['pesan']="EMAIL DAN PASSWORD TIDAK SESUAI";
			$this->load->view('index',$data);
		}
	}
	
	//logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/index');
	}

	
}