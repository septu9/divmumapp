<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendistribusian_model2 extends CI_Model{
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
	
	public function getAllbooking($id)
	{
		
		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_divisi = '$id' ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	public function getAllSemuaBooking()
	{
		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	
	public function getbookingById($id)
	{

		$sql = "select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_booking = '$id'";
		return $this->db->query($sql)->result_array();
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
	public function get_username(){

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
	public function get_member_by_id($id){
		$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id_divisi = '$id'";
		return $this->db->query($sql)->result_array();
	}
}