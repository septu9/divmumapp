<?php

//Controller User

defined('BASEPATH') OR exit('No direct script access allowed');
class AkunAdmin extends CI_Controller{
    	public function __construct()
      {
         parent ::__construct();
         $this->load->model('Akun_model');
         $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->library('email');
         $this->load->library('session');
         $this->load->helper('url');
     }
 
       //tampilan index
       public function index()
       {
          $data['judul']="Halaman User";
          $data['datauser'] = $this->Akun_model->getAlldatauser();
          $data['divisi'] = $this->Akun_model->get_divisi(); 
          $this->load->view('template/v_header',$data);
          $this->load->view('akun/akunadmin',$data);
          $this->load->view('template/v_footer');
      }

      //tambah user
      public function tambahdatauser()
      {
          $data['judul'] = 'Halaman Tambah Data User';
          $data['datauser'] = $this->Akun_model->getAlldatauser();
          $data['divisi'] = $this->Akun_model->get_divisi(); 
          $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');  
          $this->form_validation->set_rules('telepon', 'telepon', 'required'); 
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');  
          $this->form_validation->set_rules('password', 'Password', 'required');  
              //$this->form_validation->set_message('is_unique', 'This %s is already exits');  
          if ($this->form_validation->run() == FALSE)  
          {  
           $this->load->view('template/v_header',$data);
           $this->load->view('akun/tambahakunadmin',$data);
           $this->load->view('template/v_footer'); 
       }  
       else {  
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
          if($this->Akun_model->insertuser($data))  
          {  
            if($this->sendemail($email))  
            {  
               // successfully sent mail to user email  
              $this->session->set_flashdata('flash','Berhasil Ditambahkan');
              redirect('akunadmin/index');  
            }  
            else  
            {  
             $this->session->set_flashdata('flash','gagal');
             redirect('akunadmin/index'); 
           }  
         }  
         else  
         {  
           $this->session->set_flashdata('flash','gagal');
           redirect('akunadmin/index'); 
         }  
        }  
      }

      //send email  
      public function sendemail($email){  
        // configure the email setting  
        $config['protocol']  = 'smtp';  
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
        $config['smtp_port'] = '465'; //smtp port number  
        $config['smtp_user'] = 'ybmpln@gmail.com';  
        $config['smtp_pass'] = 'ybmpln2017'; //$from_email password  
        $config['mailtype']  = 'html';  
        $config['charset']   = 'iso-8859-1';  
        $config['wordwrap']  = TRUE;  
        $config['newline']   = "\r\n"; //use double quotes  
        $this->email->initialize($config);    
        $nama = $fname;
        $this->email->from('ybmpln@gmail.com', '[YBM PLN Gandaria] Terima kasih telah memverifikasi alamat email Anda');  
        $this->email->to($email);   
        $this->email->subject('Please Verify Your Email Address');  
        $message = "<html><head><head></head><body><p><b>Welcome</b>".$fname.",</p><p>Anda berhasil registrasi di aplikasi booking ruang rapat dan mobil YBM PLN Gandaria.</p><p>Silahkan login.</p><br/><p>Hormat Kami,</p><p>YBM PLN Gandaria</p></body></html>";  
        $this->email->message($message);  
        return $this->email->send();  
      }

      public function hapus($id)
      {
        $this->Akun_model->hapusDataUser($id);
        $this->session->set_flashdata('flash','Berhasil Dihapus');
        redirect('akunadmin/index');
      }

      public function edit($id){
        $query = $this->db->get_where('tb_user', array('id' => $id));
        $data['akun'] = $query->row();
        $this->load->view('template/v_header',$data);
        $this->load->view('akun/akunadminubah',$data);
        $this->load->view('template/v_footer');
      }

      public function ubah($id)
      {
        $data['judul'] = 'Halaman Ubah Data User';
        $query = $this->db->get_where('tb_user', array('id' => $id));
        $data['akun'] = $query->row();
        $data['divisi'] = $this->Akun_model->get_divisi(); 
        $this->load->view('template/v_header',$data);
        $this->load->view('akun/akunadminubah',$data);
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
          redirect('akunadmin/index');
        }
        else
        {
          echo "gagal";
        }
      }
      
      public function detail($id)
      {
        $data['judul'] = 'Detail Data User';
        $data['detail'] = $this->Akun_model->getuserbyid($id);
        $this->load->view('template/v_header',$data);
        $this->load->view('akun/detail',$data);
        $this->load->view('template/v_footer');
      }
}
