<?php 

class M_mobil extends CI_Model
{
	//menampilkan data dari database 
	public function getAllmobil(){
		return $this->db->get('tb_mobil')->result_array();
	}

	public function inputmobil(){
		$data=[
			"nama_mobil"=>$this->input->post('namamobil',true)
		];
		$this->db->insert('tb_mobil',$data);
	}

	public function hapusdatamasuk($id_m){
		$this->db->where('id_mobil',$id_m);
		$this->db->delete('tb_mobil');
	}

	public function getmobilbyid($id_m){
		return $this->db->get_where('tb_mobil', ['id_mobil'=>$id_m])->row_array();
	}
}