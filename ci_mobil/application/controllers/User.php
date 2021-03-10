<?php

//Controller Registrasi

defined('BASEPATH') OR exit('No direct script access allowed');  
class User extends CI_Controller {  

    public function __Construct(){  
      parent::__Construct();  
      $this->load->helper(array('form', 'url'));  
      $this->load->library(array('session', 'form_validation', 'email'));   
      $this->load->database();  
      $this->load->model('user_model');  
    }

    //tampilan index
    public function index()  
    {  
      $data['judul'] = 'YBM PLN Gandaria';
      $data['divisi'] = $this->user_model->get_divisi(); 
      $this->load->view('registrasi',$data);  
    }

    //registrasi
    public function registration()  
    {  
        //validate input value with form validation class of codeigniter
      $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');  
      $this->form_validation->set_rules('telepon', 'telepon', 'required'); 
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');  
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');  
          //$this->form_validation->set_message('is_unique', 'This %s is already exits');  
      if ($this->form_validation->run() == FALSE)  
      {  
       $this->load->view('registrasi'); 
     }  
     else  
     {  
      $nama_lengkap = $_POST['nama_lengkap'];  
      $telepon = $_POST['telepon']; 
      $id_divisi = $_POST['id_divisi']; 
      $alamat = $_POST['alamat']; 
      $email = $_POST['email'];  
      $password = $_POST['password'];  
            //md5 hashing algorithm to decode and encode input password  
            //$salt    = uniqid(rand(10,10000000),true);   
      $status   = 0;  
      $data = array('nama_lengkap' => $nama_lengkap,  
       'telepon' => $telepon,
       'id_divisi' => $id_divisi,
       'alamat' => $alamat,    
       'email' => $email,  
       'password' => $password,  
       'status_s' => $status);  
      if($this->user_model->insertuser($data))  
      {  
        if($this->sendemail($email))  
        {  
           // successfully sent mail to user email  
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');  
          redirect(base_url());  
        }  
        else  
        {  
         $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');  
         redirect(base_url());  
       }  
     }  
     else  
     {  
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');  
      redirect(base_url());  
    }  
    }  
  }  

    //send email
    public function sendemail($email){  
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
          $nama = $fname;
          $this->email->from('ybmpln@gmail.com', '[YBM PLN Gandaria] Terima kasih telah memverifikasi alamat email Anda');  
          $this->email->to($email);   
          $this->email->subject('Please Verify Your Email Address');  
          $message = "<html><head><head></head><body><p><b>Welcome</b>".$fname.",</p><p>Anda berhasil registrasi di aplikasi booking ruang rapat dan mobil YBM PLN Gandaria.</p><p>Silahkan login.</p><br/><p>Hormat Kami,</p><p>YBM PLN Gandaria</p></body></html>";  
          $this->email->message($message);  
          return $this->email->send();  
        }  
      }  