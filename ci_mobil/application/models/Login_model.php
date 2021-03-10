<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}
	public function login($user,$pass)
	{
		$this->db->select('id,telepon,email,nama_lengkap,password,id_divisi,alamat');
		$this->db->from('tb_user');
		$this->db->where('email',$user);
		$this->db->where('password',$pass);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
	public function get_member_by_id($id){
		$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id = '$id'";
		return $this->db->query($sql)->result_array();
	}

}