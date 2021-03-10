<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model2 extends CI_Model{
	public function tambahDataBooking (){
		$data=[
			"id_divisi" => $this->input->post('id_divisi',true),
			"agenda_meeting" =>$this->input->post('agenda_meeting',true),
			"tanggal_booking" =>$this->input->post('tanggal_booking',true),
			"waktu_booking" =>$this->input->post('waktu_booking',true),
			"tanggal_selesai"=>$this->input->post('tanggal_selesai',true),
			"waktu_selesai"=>$this->input->post('waktu_selesai',true),
			"nama_lengkap"=>$this->input->post('nama_lengkap',true)
		];
		$this->db->insert('tbl_booking_ruangrapat',$data);
	}
	
	public function getAllbooking()
	{
		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	public function get_email()
	{
		
		$sql = "select email from tb_user where level='admin'";
		return $this->db->query($sql)->result_array();
	}

	public function getMahasiswaByID($id)
	{
		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.id=k.nama_lengkap where k.id_booking = '$id'";
		return $this->db->query($sql)->row_array();
	}
	public function getbookingById($id)
	{

		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_booking = '$id' ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
		
	}
	public function hapusDatabooking($id)
	{
		$this->db->where('id_booking',$id);
		$this->db->delete('tbl_booking_ruangrapat');
	}
	public function ubahDataBooking()
	{
		$data=[
			"id_divisi" => $this->input->post('id_divisi',true),
			"agenda_meeting" =>$this->input->post('agenda_meeting',true),
			"hari_booking" =>$this->input->post('hari_booking',true),
			"tanggal_booking" =>$this->input->post('tanggal_booking',true),
			"waktu_booking" =>$this->input->post('waktu_booking',true),
			"hari_selesai" =>$this->input->post('hari_selesai',true),
			"tanggal_selesai"=>$this->input->post('tanggal_selesai',true),
			"waktu_selesai"=>$this->input->post('waktu_selesai',true),
			"status"=>$this->input->post('status',true),
			"id"=>$this->input->post('id_user',true)
		];

		$this->db->where('id_booking', $this->input->post('id'));
		$this->db->update('tbl_booking_ruangrapat',$data);
	}

	public function cariDatabooking()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('divisi', $keyword);
	}

	public function get_divisi()
	{
		
		$query = $this->db->get('tb_divisi');
		return $query->result_array();
	}
	public function get_username()
	{
		$query = $this->db->get('tb_user');
		return $query->row();
	}

	public function get_user()
	{

		$query = $this->db->get('tb_user');
		return $query->result_array();
	}
	public function get_booking(){

		$query = $this->db->get('tbl_booking_ruangrapat');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	public function getAlluserdata()
	{
		$query = $this->db->get('tb_user');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	public function cariDataPeminjaman()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('id_divisi',$keyword);
		$this->db->or_like('agenda_meeting',$keyword);
		$this->db->or_like('nama_lengkap',$keyword);
		$this->db->or_like('tanggal_booking',$keyword);
		$this->db->or_like('waktu_booking',$keyword);
		$this->db->or_like('tanggal_selesai',$keyword);
		$this->db->or_like('waktu_selesai',$keyword);
		$this->db->or_like('status',$keyword);

		$this->db->from('tbl_booking_ruangrapat');
		return $this->db->get()->result_array();
		
	}
	public function get_member_by_id($id){
		$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id_divisi = '$id'";
		return $this->db->query($sql)->result_array();
	}
}