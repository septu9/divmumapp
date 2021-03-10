<?php

//Controller Pemberian Status Peminjaman Mobil

defined('BASEPATH') OR exit('No direct script access allowed');
class Status extends CI_Controller{
  public function __construct()
  {
    parent ::__construct();
    $this->load->model('Login_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('mobil/Admin_model');
    $this->load->library('email');
  }

  public function edit($id){
    $query = $this->db->get_where('tbl_booking_ruangrapat', array('id_booking' => $id));
    $data['mahasiswa'] = $query->row();
    $this->load->view('template/v_header',$data);
    $this->load->view('mobil/admin/v_status',$data);
    $this->load->view('template/v_footer');
  }
  public function ubah($id)
  {
    $data['judul'] = 'Halaman Form Ubah Data';
    $data['ubahbooking'] = $this->Admin_model->getBookingById($id);
    $data['status'] = ['Disetujui','Ditolak'];
    
    $this->load->view('template/v_header',$data);
    $this->load->view('mobil/admin/v_status',$data);
    $this->load->view('template/v_footer');
    
  }

  //save
  public function update()
  {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];  
    $status = $_POST['status'];  
    $email = $_POST['email'];
    $data = array(
     
      "status" =>$status,
    );

    $this->db->where('id_booking',$id);
    if ($this->db->update('tb_booking_mobil', $data)) {
      
      if($this->ubahstatusemail($email))  
      {  
       // successfully sent mail to user email  
        $this->session->set_flashdata('flash','diubah status'); 
        redirect(base_url('mobil/admin/databooking'));  
      }  
      else  
      {  
       $this->session->set_flashdata('flash','Gagal');  
       redirect(base_url('mobil/status/ubah'));  
     } 
   }}

   //send email
   public function ubahstatusemail($email){
        // configure the email setting  
    $config['protocol'] = 'smtp';  
          $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
          $config['smtp_port'] = '465'; //smtp port number  
          $config['smtp_user'] = 'ybmpln@gmail.com';  
          $config['smtp_pass'] = 'ybmpln2017'; //$from_email password  
          $config['mailtype'] = 'html';  
          $config['charset'] = 'iso-8859-1';  
          $config['wordwrap'] = TRUE;  
          $config['newline'] = "\r\n"; //use double quotes  
          $this->email->initialize($config);    
          $this->email->from('ybmpln@gmail.com', 'YBM PLN Gandaria');  
          $this->email->to($email);   
          $this->email->subject('Notifikasi Booking');  
          $message1 = "<html><head><head></head><body><p><b>Welcome</b>,</p><p> Admin baru saja memberikan tindakan, silahkan lihat aplikasi booking ruang rapat untuk mengetahui status booking mobil anda.</p><br/>Terima Kasih <br/><p>Hormat Kami,</p><p>YBM PLN Gandaria</p></body></html>";  
          $this->email->message($message1);  
          return $this->email->send();
          
        }
      }
