<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_member_by_id($id){

	$sql="select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where k.id_divisi = '$id'";
	return $this->db->query($sql)->result_array();
}
 public function getuserbyid()
  {
  	$id = $this->session->userdata('id_user');
    $sql = "select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where id='$id'";
    return $this->db->query($sql)->result_array();
  }

   public function get_divisi(){
    
    $query = $this->db->get('tb_divisi');
    return $query->result_array();
  } 

}
