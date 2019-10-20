<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Hasil_RS extends CI_Model {

	public function Get_Hasil_RS(){
		$this->db->select('*');
		$this->db->from('hasil_rs');
        $this->db->join('akun','akun.id = hasil_rs.id');
		$this->db->join('rumah_sakit','rumah_sakit.id_RS = hasil_rs.id_RS');
		$this->db->where('hasil_rs.id_RS',$this->session->userdata('id_RS')); 
		$query = $this->db->get();
		return $query->result_array();
	}
	public function notifikasi(){
		$this->db->select('count(*)');
		$this->db->from('hasil_rs');
		$query = $this->db->get();
		return $query->result_array();
	}
	
}
