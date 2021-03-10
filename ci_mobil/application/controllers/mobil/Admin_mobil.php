<?php 

//Controller Admin Mobil

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_mobil extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_mobil');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	//memanggil template dan meload model
	public function mobil(){
		$data['judul']="Halaman Menu Mobil";
		$data['mobil']= $this->M_mobil->getAllmobil();
		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/mobil/v_form',$data);
		$this->load->view('template/v_footer');
	}

	//membuat method input
	public function tambah(){
		$data['judul']="Halaman Menu Mobil";
		$data['mobil']=$this->M_mobil->getAllmobil();
		$this->form_validation->set_rules('namamobil','Nama Mobil','required');
		if($this->form_validation->run()== FALSE){
			$this->load->view('template/v_header',$data);
			$this->load->view('mobil/v_form');
			$this->load->view('template/v_footer');
		}else{
			$this->M_mobil->inputmobil();
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('mobil/Admin_mobil/mobil');
		}
	}
	
	//membuat function hapus
	public function hapus($id_m){
		$this->M_mobil->hapusdatamasuk($id_m);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('mobil/Admin_mobil/mobil');
	}
	
	//detail data
	public function detail($id_m){
		$query = $this->db->get_where('tb_mobil', array('id_mobil' => $id_m));
		$data['judul']="Halaman Detail Mobil";
		$data['mobil']= $query->row();
		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/mobil/v_detail',$data);
		$this->load->view('template/v_footer');
	} 

	//edit data
	public function edit($id_m){
		$query = $this->db->get_where('tb_mobil', array('id_mobil' => $id_m));
		$data['mobil']= $query->row();
		$data['judul']="Halaman Ubah Mobil";
		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/mobil/v_ubah',$data);
		$this->load->view('template/v_footer');
	}

	public function ubah($id_m){
		$query = $this->db->get_where('tb_mobil', array('id_mobil' => $id_m));
		$data['judul']="Ubah data mobil";
		$data['mobil']= $query->row();
		$this->load->view('template/v_header',$data);
		$this->load->view('mobil/mobil/v_ubah',$data);
		$this->load->view('template/v_footer');
	}
	
	//save
	public function update(){
		$id_m = $this->input->post('id');
		$namamobil = $this->input->post('namamobil');

		$data = array(
			'nama_mobil' => $namamobil,
		);
		$this->db->where('id_mobil',$id_m);
		if($this->db->update('tb_mobil',$data)){
			$this->session->set_flashdata('flash','Diubah');
			redirect('mobil/Admin_mobil/mobil');
		}
	}
}