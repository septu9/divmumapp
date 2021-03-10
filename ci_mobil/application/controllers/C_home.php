<?php 

class C_home extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_home');
	}

	public function index()
	{
		$data['judul']="Halaman Dashboard";
		$data['count']=$this->M_home->get_count_booking();
		$data['count_m']=$this->M_home->get_count_mobil();
		$data['count_d']=$this->M_home->get_count_divisi();
		$this->load->view('template/v_header',$data);
		$this->load->view('v_index',$data);
		$this->load->view('template/v_footer');
	} 

}