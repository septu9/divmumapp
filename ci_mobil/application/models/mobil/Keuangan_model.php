<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keuangan_model extends CI_Model{
	public function tambahDataBooking (){
		$data=[
			"id_divisi"=>$this->input->post('id_divisi',true),
			"tujuan"=>$this->input->post('tujuan',true),
			"id_mobil"=>$this->input->post('mobil',true),
			"tanggal_booking"=>$this->input->post('tglawal',true),
			"waktu_booking"=>$this->input->post('waktuawal',true),
			"tanggal_selesai"=>$this->input->post('tglakhir',true),
			"waktu_selesai"=>$this->input->post('waktuakhir',true),
			"nama_lengkap"=>$this->input->post('nama_lengkap',true)
		];
		$this->db->insert('tb_booking_mobil',$data);
	}

	public function getAllBooking($id)
	{
		$sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_divisi = '$id' ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	public function getBookingById($id)
	{
		$sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_booking = '$id'";
		return $this->db->query($sql)->result_array();
	}

	public function getAllSemuaBooking()
	{
		$sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}


	public function ubahDataBooking()
	{
		$data=[
			"nama_divisi"=>$this->input->post('divisi',true),
			"tujuan"=>$this->input->post('tujuan',true),
			"id_mobil"=>$this->input->post('mobil',true),
			"tanggal_booking"=>$this->input->post('tglawal',true),
			"waktu_booking"=>$this->input->post('waktuawal',true),
			"hari_selesai"=>$this->input->post('hari',true),
			"hari_booking"=>$this->input->post('hari_booking',true),
			"tanggal_selesai"=>$this->input->post('tglakhir',true),
			"waktu_selesai"=>$this->input->post('waktuakhir',true),
			"id"=>$this->input->post('id',true)
		];

		$this->db->where('id_booking', $this->input->post('id'));
		$this->db->update('tb_booking_mobil',$data);
	}

	public function get_divisi(){
		
		$query = $this->db->get('tb_divisi');
		return $query->result_array();
	}
	public function get_mobil(){

		$query = $this->db->get('tb_mobil');
		return $query->result_array();
	}

	public function get_user()
	{
		$query = $this->db->get('tb_user');
		return $query->result_array();
	}

	public function	get_count_booking(){
		$sql="SELECT count(id_booking) AS id_booking FROM tb_booking_mobil";
		$result = $this->db->query($sql);

		return $result->row()->id_booking;
	}

	public function get_count_mobil(){
		$sql="SELECT count(id_mobil) AS id_mobil FROM tb_mobil";
		$result = $this->db->query($sql);

		return $result->row()->id_mobil;
	}

	public function get_count_divisi(){
		$sql="SELECT count(nama_divisi) AS nama_divisi FROM tb_divisi";
		$result = $this->db->query($sql);

		return $result->row()->nama_divisi;
	}

	public function get_username()
	{
		$sql="SELECT count(id) AS id FROM tb_user";
		$result = $this->db->query($sql);

		return $result->row()->id;
	}

	public function get_booking()
	{
		$sql="SELECT count(id_booking) AS id FROM tbl_booking_ruangrapat";
		$result = $this->db->query($sql);

		return $result->row()->id;
	}

	public function cariDataPeminjaman()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('nama_divisi',$keyword);
		$this->db->or_like('tujuan',$keyword);
		$this->db->or_like('nama_lengkap',$keyword);
		$this->db->or_like('tanggal_booking',$keyword);
		$this->db->or_like('hari_booking',$keyword);
		$this->db->or_like('waktu_booking',$keyword);
		$this->db->or_like('tanggal_selesai',$keyword);
		$this->db->or_like('hari_selesai',$keyword);
		$this->db->or_like('waktu_selesai',$keyword);
		$this->db->or_like('status',$keyword);
		$this->db->or_like('nama_mobil',$keyword);

		$this->db->from('tb_booking_mobil');
		$this->db->join('tb_mobil', 'tb_booking_mobil.id_mobil = tb_mobil.id_mobil','LEFT');
		return $this->db->get()->result_array();
		
	}
	public function get_member_by_id($id){
		$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id_divisi = '$id'";
		return $this->db->query($sql)->result_array();
	}

}

