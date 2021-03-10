<?php 

//Controller Export Excel

defined('BASEPATH') OR exit('No direct script access allowed ');
class Laporan extends CI_Controller{

	public function __construct()
	{
		parent ::__construct();
			$this->load->model('Laporan_model');
			$this->load->library('session');
	}
	
  //tampilan index
	public function index()
	{
		$data['judul'] = 'Laporan Peminjaman';
		$this->load->view('template/v_header',$data);
		$this->load->view('laporan/index',$data);
		$this->load->view('template/v_footer');
	}
	
	public function bulan()
	{
			$data = $this->model_app->hari_ini();
		  $data = array('record' => $data);
			$this->template->load('app/template','app/mod_laporan/view_harian',$data);
		}

  //tampilan data mobil
	public function mobil_index()
	{
	    $data['judul'] = 'Data mobil';
      $data['mobil'] = $this->Laporan_model->get_all_mobil();
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/mobil_excel',$data);
      $this->load->view('template/v_footer');
	}

  //export data mobil
	public function export_mobil(){
	   header("Content-type: application/vnd-ms-excel");
     header("Content-Disposition: attachment; filename=Data Mobil.xls");
     $data['judul'] = 'Data mobil';
     $data['mobil'] = $this->Laporan_model->get_all_mobil();
     $this->load->view('laporan/mobil_excel1',$data);
    
    // Load plugin PHPExcel nya
    /*include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('YBM PLN')
                 ->setLastModifiedBy('YBM PLN')
                 ->setTitle("Data Mobil")
                 ->setSubject("Mobil")
                 ->setDescription("Laporan Semua Data Mobils")
                 ->setKeywords("Data Mobil");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MOBIL"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA MOBIL"); // Set kolom B3 dengan tulisan "NIS"s
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->Laporan_model->get_all_mobil();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_mobil);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Mobil");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
   	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=exceldata.xlt");
	header("Pragma: no-cache");
	header("Expires: 0");
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    */
  }

    //export data user
    public function export_user(){
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data User.xls");
        $data['judul'] = 'Data User';
        $data['user'] = $this->Laporan_model->getAlldatauser();
        $this->load->view('laporan/user_excel',$data);
    }

    //tampilan peminjaman mobil
    public function export_mobil_peminjaman()
    {
      $data['judul'] = 'Data Hari ini';
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/peminjaman_mobil',$data);
      $this->load->view('template/v_footer');
    }

    //export peminjaman mobil hari ini 
    public function hari_ini_mobil()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Mobil .xls");
      $data['judul'] = 'Data Hari ini';
      $data['booking'] = $this->Laporan_model->hari_ini();
      $this->load->view('laporan/mobil_hari_ini',$data);
      
    }

    //export peminjaman mobil minggu ini
    public function minggu_ini_mobil()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Mobil .xls");
      $data['judul'] = 'Data Minggu ini';
      $data['booking'] = $this->Laporan_model->minggu_ini();
      $this->load->view('laporan/mobil_minggu_ini',$data);
      
    }

    //export peminjaman mobil bulan ini
    public function bulan_ini_mobil()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Mobil .xls");
      $data['judul'] = 'Data Bulan ini';
      $data['booking'] = $this->Laporan_model->bulan_ini();
      $this->load->view('laporan/mobil_bulan_ini',$data);
      
    }

    //export peminjaman mobil tahun ini
    public function tahun_ini_mobil()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Mobil .xls");
      $data['judul'] = 'Data Tahun ini';
      $data['booking'] = $this->Laporan_model->tahun_ini();
      $this->load->view('laporan/mobil_tahun_ini',$data);
      
    }

    //tampilan peminjaman ruang rapat
    public function export_ruang_peminjaman()
     {
      $data['judul'] = 'Data Hari ini';
      $this->load->view('template/v_header',$data);
      $this->load->view('laporan/peminjaman_ruang',$data);
      $this->load->view('template/v_footer');
    }

    //export peminjaman ruang rapat hari ini
    public function hari_ini_ruang()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Ruang Rapat .xls");
      $data['booking'] = $this->Laporan_model->hari_ini_rr();
      $this->load->view('laporan/ruang_hari_ini',$data);
      
    }

    //export peminjaman ruang rapat minggu ini
    public function minggu_ini_ruang()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Ruang Rapat .xls");
      $data['booking'] = $this->Laporan_model->minggu_ini_rr();
      $this->load->view('laporan/ruang_minggu_ini',$data);
      
    }

    //export peminjaman ruang rapat bulan ini
    public function bulan_ini_ruang()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Ruang Rapat .xls");
      $data['booking'] = $this->Laporan_model->bulan_ini_rr();
      $this->load->view('laporan/ruang_bulan_ini',$data);
      
    }

    //export peminjaman ruang rapat tahun ini
    public function tahun_ini_ruang()
    {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Peminjaman Ruang Rapat .xls");
      $data['booking'] = $this->Laporan_model->tahun_ini_rr();
      $this->load->view('laporan/ruang_tahun_ini',$data);
      
    }
}