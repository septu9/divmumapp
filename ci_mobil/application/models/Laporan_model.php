<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
class Laporan_model extends CI_Model{

		public function get_all_mobil()
		{
			return $this->db->get('tb_mobil')->result_array();
		}

		public function	getAlldatauser(){

		    $sql = "select * from tb_user k left join tb_divisi j on j.id_divisi=k.id_divisi";
		    return $this->db->query($sql)->result_array();
		  }

		function hari_ini(){
		   $sql="select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where SUBSTR(k.tanggal_booking, 1,10)=DATE(NOW()) GROUP BY k.id_booking";
		   return $this->db->query($sql)->result_array();
		}
		 
		function minggu_ini(){
		   $sql="select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where YEARWEEK(k.tanggal_booking)=YEARWEEK(NOW()) GROUP BY k.id_booking";
			return $this->db->query($sql)->result_array();
		}
		 
		function bulan_ini(){
		    $sql="select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap where MONTH(k.tanggal_booking)=MONTH(NOW()) GROUP BY k.id_booking";
		    return $this->db->query($sql)->result_array();
		}
		 
		function tahun_ini(){
		    $sql="select * from tb_booking_mobil k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_mobil m on m.id_mobil=k.id_mobil left join tb_user u on u.nama_lengkap=k.nama_lengkap  where YEAR(k.tanggal_booking)=YEAR(NOW()) GROUP BY k.id_booking";
		    return $this->db->query($sql)->result_array();
		}

		function hari_ini_rr(){
		   $sql="select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where SUBSTR(k.tanggal_booking, 1,10)=DATE(NOW()) GROUP BY k.id_booking";
		   return $this->db->query($sql)->result_array();
		}

		function minggu_ini_rr(){
		   $sql="select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where YEARWEEK(k.tanggal_booking)=YEARWEEK(NOW()) GROUP BY k.id_booking";
			return $this->db->query($sql)->result_array();
		}

		function bulan_ini_rr(){
		    $sql="select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap where MONTH(k.tanggal_booking)=MONTH(NOW()) GROUP BY k.id_booking";
		    return $this->db->query($sql)->result_array();
		}

		function tahun_ini_rr(){
		    $sql="select * from tbl_booking_ruangrapat k left join tb_divisi j on j.id_divisi=k.id_divisi left join tb_user u on u.nama_lengkap=k.nama_lengkap  where YEAR(k.tanggal_booking)=YEAR(NOW()) GROUP BY k.id_booking";
		    return $this->db->query($sql)->result_array();
		}



}