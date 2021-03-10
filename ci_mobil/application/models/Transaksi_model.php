<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

  public function view_by_date($date){
        $this->db->where('DATE(tanggal_booking)', $date); // Tambahkan where tanggal nya
        
    return $this->db->get('tb_booking_mobil')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }
  
  public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal_booking)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_booking)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_booking_mobil')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
  
  public function view_by_year($year){
        $this->db->where('YEAR(tanggal_booking)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_booking_mobil')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
  
  public function view_all(){
    return $this->db->get('tb_booking_mobil')->result(); // Tampilkan semua data transaksi
  }
  
  public function option_tahun(){
        $this->db->select('YEAR(tanggal_booking) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('transaksi'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal_booking)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_booking)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
      }
    }