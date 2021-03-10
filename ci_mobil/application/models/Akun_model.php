<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akun_model extends CI_Model{

	public function	getAlldatauser(){

    $sql = "select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi";
    return $this->db->query($sql)->result_array();
  }

  public function get_divisi(){
    
    $query = $this->db->get('tb_divisi');
    return $query->result_array();
  } 
  public function insertuser($data)  
  {  
    return $this->db->insert('tb_user', $data);  
  }  
  public function verifyemail($key)  
  {  
    $data = array('status' => 1);  
    $this->db->where('md5(email)', $key);  
    return $this->db->update('tb_user', $data);  
  }

  public function hapusDataUser($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('tb_user');
  }

  public function getuserbyid($id)
  {
    $sql = "select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi where id='$id'";
    return $this->db->query($sql)->result_array();
  }
}