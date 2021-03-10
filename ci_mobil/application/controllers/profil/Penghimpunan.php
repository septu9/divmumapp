<?php

//Controller Divisi Penghimpunan dan Pendayagunaan Peminjaman Mobil

defined('BASEPATH') OR exit('No direct script access allowed');
class Penghimpunan extends CI_Controller{
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('profil/Profil_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['judul'] = 'Profil';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['email'] = $this->session->userdata('email');
		$data['telepon'] = $this->session->userdata('telepon');
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['alamat'] = $this->session->userdata('alamat');
		$data['password'] = $this->session->userdata('password');
		$data['divisi'] = $this->Profil_model->getuserbyid();

		$this->load->view('template/v_header2',$data);
		$this->load->view('profil/penghimpunan/index',$data);
		$this->load->view('template/v_footer');

	}

	public function ubah()
	{
		$data['judul'] = 'Ubah Profil';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['email'] = $this->session->userdata('email');
		$data['telepon'] = $this->session->userdata('telepon');
		$data['user'] = $this->session->userdata('nama_lengkap');
		$data['alamat'] = $this->session->userdata('alamat');
		$data['divisi'] = $this->Profil_model->get_divisi(); 

		$this->load->view('template/v_header2',$data);
		$this->load->view('profil/penghimpunan/ubah',$data);
		$this->load->view('template/v_footer');
	}

	 public function update()
      { 
        $id           = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $telepon      = $this->input->post('telepon');
        $id_divisi        = $this->input->post('id_divisi');
        $alamat       = $this->input->post('alamat');
        $email        = $this->input->post('email');
        $password     = $this->input->post('password');             

        $data = array(

        'nama_lengkap' => $nama_lengkap,
        'telepon'      => $telepon,
        'id_divisi'     => $id_divisi,
        'alamat'       => $alamat,
        'email'        => $email,
        'password'     => $password
        );
        $this->db->where('id',$id);
        if ($this->db->update('tb_user', $data)) {
          $this->session->set_flashdata('flash','Berhasil Diubah');
          redirect('login/index');
        }
        else
        {
          echo "gagal";
        }
      }
}