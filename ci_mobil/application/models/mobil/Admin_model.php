<?php

class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function	get_count_booking(){
		$sql="SELECT count(id_booking) AS id_booking FROM tb_booking_mobil";
		$result = $this->db->query($sql);

		return $result->row()->id_booking;
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

	public function	getAlldatauser(){

		$sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	public function getbookingById($id)
	{

		$sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where k.id_booking = '$id' ORDER BY id_booking DESC";
		return $this->db->query($sql)->result_array();
	}

	public function hapusDatabooking($id)
	{
		$this->db->where('id_booking',$id);
		$this->db->delete('tb_booking_mobil');
	}

	public function cariDataPeminjaman()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('id_divisi',$keyword);
		$this->db->or_like('tujuan',$keyword);
		$this->db->or_like('nama_lengkap',$keyword);
		$this->db->or_like('tanggal_booking',$keyword);
		$this->db->or_like('waktu_booking',$keyword);
		$this->db->or_like('tanggal_selesai',$keyword);
		$this->db->or_like('waktu_selesai',$keyword);
		$this->db->or_like('status',$keyword);
		$this->db->or_like('nama_mobil',$keyword);

		$this->db->from('tb_booking_mobil');
		$this->db->join('tb_mobil', 'tb_booking_mobil.id_mobil = tb_mobil.id_mobil','LEFT');
		return $this->db->get()->result_array();
		
	}
	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->like('tujuan', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nama_lengkap', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tanggal_booking', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('waktu_booking', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tanggal_selesai', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('waktu_selesai', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('status', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_mobil', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    $sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY tanggal_booking DESC";
    return $this->db->query($sql)->result_array();
}
public function count_filter($search){
     $this->db->like('tujuan', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nama_lengkap', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tanggal_booking', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('waktu_booking', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tanggal_selesai', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('waktu_selesai', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('status', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_mobil', $search); // Untuk menambahkan query where OR LIKE
    $sql = "select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap ORDER BY tanggal_booking DESC";
    return $this->db->query($sql)->num_rows();
}

public function get_member_by_id($id){
	$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id_divisi = '$id'";
	return $this->db->query($sql)->result_array();
}
}