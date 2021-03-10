<?php

//Controller Print

defined('BASEPATH') OR exit('No direct script access allowed');
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Laporan_model');
        $this->load->library('session');
    }
    
    //tampilan index
    public function mobil_index(){
      $data['judul'] = 'Data mobil';
      $data['mobil'] = $this->Laporan_model->get_all_mobil();
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/mobil_print',$data);
      $this->load->view('template/v_footer');
    }

    //tampilan data peminjaman mobil
    public function peminjaman_mobil(){
      $data['judul'] = 'Data Peminjaman Mobil';
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/print/peminjaman_mobil',$data);
      $this->load->view('template/v_footer');
    }

    //tampilan data peminjaman ruang rapat
     public function peminjaman_ruang(){
      $data['judul'] = 'Data Peminjaman Mobil';
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/print/peminjaman_ruang',$data);
      $this->load->view('template/v_footer');
    }

    //print data user
    public function user(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',19);
        $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
        $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
        $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
        $pdf->Line(10,32,285,32);
        $pdf->Line(10,32.5,285,32.5);

        $pdf->Ln(7);
        $tanggal1 = date('Y-m-d'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(10,9,'Tanggal:',0,0);
        $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
        $pdf->SetFont('Times','b','16');
        $pdf->Cell(270,7,'DAFTAR DATA USER',0,1,'C');

        
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,9,'No',1,0);
        $pdf->Cell(50,9,'Nama Lengkap',1,0);
        $pdf->Cell(70,9,'Divisi',1,0);
        $pdf->Cell(55,9,' Email',1,0);
        $pdf->Cell(30,9,'Telepon',1,0);
        $pdf->Cell(55,9,'Alamat',1,1);
        $pdf->SetFont('Times','',12);
        $mahasiswa = $this->db->from('tb_user')
        ->join('tb_divisi', 'tb_user.id_divisi = tb_divisi.id_divisi','LEFT')
        ->get()
        ->result();
        $no=1;
        foreach ($mahasiswa as $row){
        	$pdf->Cell(10,9, $no++,1,0);
            $pdf->Cell(50,9,$row->nama_lengkap,1,0);
            $pdf->Cell(70,9,$row->nama_divisi,1,0);
            $pdf->Cell(55,9,$row->email,1,0); 
            $pdf->Cell(30,9,$row->telepon,1,0);
            $pdf->Cell(55,9,$row->alamat,1,1);
        }
        
        $pdf->Output();
    }

    //print data mobil
    public function mobil(){
      $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
      $pdf->AddPage();
        // setting jenis font yang akan digunakan
      $pdf->SetFont('Times','B',19);
      $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
      $pdf->Cell(190,7,'YBM PLN GANDARIA',3,1,'C');
      $pdf->SetFont('Times','',11);
      $pdf->Cell(190,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
      $pdf->Cell(190,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis  
      
      $pdf->Line(10,32,200,32);
      $pdf->Line(10,32.5,200,32.5);

      $pdf->Ln(7);


      $tanggal1 = date('Y-m-d'); 
      $pdf->SetFont('Times','',12);
      $pdf->Cell(10,9,'Tanggal:',0,0);
      $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');

      $pdf->SetFont('Times','b','16');
      $pdf->Cell(190,7,'DAFTAR DATA MOBIL',0,1,'C');
      
        // Memberikan space kebawah agar tidak terlalu rapat
      $pdf->Cell(10,7,'',0,1);
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(10,9,'No',1,0);
      $pdf->Cell(100,9,'Nama Mobil',1,1);
        //data foreach
      $pdf->SetFont('Times','',12);
      $mahasiswa = $this->db->get('tb_mobil')->result();
      $no=1;
      foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(100,9,$row->nama_mobil,1,1);
   }
   $pdf->Output();
}

  //print peminjaman mobil tahun ini
  public function bookingmobil_tahun(){
     $pdf = new FPDF('l','mm','A4');
          // membuat halaman baru
     $pdf->AddPage();
          // setting jenis font yang akan digunakan
     $pdf->SetFont('Times','B',16);
     $pdf->Image('asset/coba/images/download.png',230,-12);
          // mencetak string 
     $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

     $pdf->SetFont('Times','',12);
     $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
     $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
          //membuat garis
     $pdf->Line(10,32,285,32);
     $pdf->Line(10,32.5,285,32.5);

     $pdf->Ln(7);
      $tanggal1 = date('Y-m-d'); 
     $pdf->SetFont('Times','',12);
     $pdf->Cell(10,9,'Tanggal:',0,0);
     $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
     $pdf->SetFont('Times','b','14');
     $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

     
          // Memberikan space kebawah agar tidak terlalu rapat
     $pdf->Cell(10,7,'',0,1);
     $pdf->SetFont('Times','B',11);
     $pdf->Cell(10,9,'No',1,0);
     $pdf->Cell(60,9,'Divisi',1,0);
     $pdf->Cell(50,9,'Nama Lengkap',1,0);
     $pdf->Cell(40,9,'Tujuan',1,0);
     $pdf->Cell(25,9,'Mobil',1,0);
     $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
     $pdf->Cell(40,9,'Tanggal Selesai',1,0);
     $pdf->Cell(20,9,'Status',1,1);
     $pdf->SetFont('Times','',11);
     $mahasiswa = $this->Laporan_model->tahun_ini();
     $no=1;
     foreach ($mahasiswa as $row){
         $pdf->Cell(10,9, $no++,1,0);
         $pdf->Cell(60,9,$row['nama_divisi'],1,0);
         $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
         $pdf->Cell(40,9,$row['tujuan'],1,0);
         $pdf->Cell(25,9,$row['nama_mobil'],1,0);
         $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
         $pdf->Cell(40,9,longdate_indo($row['tanggal_selesai']),1,0);

         $pdf->Cell(20,9,$row['status'],1,1);
     }
          //Position at 1.5 cm from bottom 
          $pdf->SetY(-15); //Arial italic 8 
          $pdf->SetFont('Arial','I',8); //Page number 
          $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
          
          $pdf->Output();
      }

  //print peminjaman mobil bulan ini
  public function bookingmobil_bulan(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(40,9,'Tujuan',1,0);
   $pdf->Cell(25,9,'Mobil',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(35,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->bulan_ini();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(40,9,$row['tujuan'],1,0);
       $pdf->Cell(25,9,$row['nama_mobil'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(35,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman mobil minggu ini
  public function bookingmobil_minggu(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(40,9,'Tujuan',1,0);
   $pdf->Cell(25,9,'Mobil',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(35,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->minggu_ini();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(40,9,$row['tujuan'],1,0);
       $pdf->Cell(25,9,$row['nama_mobil'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(35,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman mobil hari ini
  public function bookingmobil_hari(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(40,9,'Tujuan',1,0);
   $pdf->Cell(25,9,'Mobil',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(35,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->hari_ini();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(40,9,$row['tujuan'],1,0);
       $pdf->Cell(25,9,$row['nama_mobil'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(35,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman ruang rapat hari ini
  public function bookingruang_hari(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(50,9,'Agenda',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(40,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->hari_ini_rr();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(50,9,$row['agenda_meeting'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman ruang rapat minggu ini
  public function bookingruang_minggu(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(50,9,'Agenda',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(40,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->minggu_ini_rr();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(50,9,$row['agenda_meeting'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman ruang rapat bulan ini
  public function bookingruang_bulan(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(50,9,'Agenda',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(40,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->bulan_ini_rr();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(50,9,$row['agenda_meeting'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }

  //print peminjaman ruang rapat tahun ini
  public function bookingruang_tahun(){
   $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
   $pdf->AddPage();
        // setting jenis font yang akan digunakan
   $pdf->SetFont('Times','B',16);
   $pdf->Image('asset/coba/images/download.png',230,-12);
        // mencetak string 
   $pdf->Cell(270,7,'YBM PLN GANDARIA',3,1,'C');

   $pdf->SetFont('Times','',12);
   $pdf->Cell(270,7,'Jl. Gandaria II No.13, RT.10/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan Daerah Khusus Ibukota Jakarta 12130',0,1,'C');
   $pdf->Cell(270,7,'homepage: https://ybmpln.org  email: ybm@pln.co.id  telp: 021-7261122',0,1,'C');
        //membuat garis
   $pdf->Line(10,32,285,32);
   $pdf->Line(10,32.5,285,32.5);

   $pdf->Ln(7);
    $tanggal1 = date('Y-m-d'); 
   $pdf->SetFont('Times','',12);
   $pdf->Cell(10,9,'Tanggal:',0,0);
   $pdf->Cell(50,9,longdate_indo($tanggal1),0,1,'C');
   $pdf->SetFont('Times','b','14');
   $pdf->Cell(270,7,'DAFTAR DATA PEMINJAMAN MOBIL',0,1,'C');

   
        // Memberikan space kebawah agar tidak terlalu rapat
   $pdf->Cell(10,7,'',0,1);
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(10,9,'No',1,0);
   $pdf->Cell(60,9,'Divisi',1,0);
   $pdf->Cell(50,9,'Nama Lengkap',1,0);
   $pdf->Cell(50,9,'Agenda',1,0);
   $pdf->Cell(40,9,'Tanggal Peminjaman',1,0);
   $pdf->Cell(40,9,'Tanggal Selesai',1,0);
   $pdf->Cell(20,9,'Status',1,1);
   $pdf->SetFont('Times','',11);
   $mahasiswa = $this->Laporan_model->tahun_ini_rr();
   $no=1;
   foreach ($mahasiswa as $row){
       $pdf->Cell(10,9, $no++,1,0);
       $pdf->Cell(60,9,$row['nama_divisi'],1,0);
       $pdf->Cell(50,9,$row['nama_lengkap'],1,0);
       $pdf->Cell(50,9,$row['agenda_meeting'],1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_booking']),1,0);
       $pdf->Cell(40,9,longdate_indo($row['tanggal_selesai']),1,0);

       $pdf->Cell(20,9,$row['status'],1,1);
   }
        //Position at 1.5 cm from bottom 
        $pdf->SetY(-15); //Arial italic 8 
        $pdf->SetFont('Arial','I',8); //Page number 
        $pdf->Cell(0,10,'Halaman ke- '.$pdf->PageNo().' dari {nb}',0,0,'R'); 
        
        $pdf->Output();
    }



}
?>