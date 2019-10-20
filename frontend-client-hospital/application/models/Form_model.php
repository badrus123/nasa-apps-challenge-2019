<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

	public function Get_Rujukan($id_rujukan){
		$this->db->select('*');
		$this->db->from('rujukan');
        $this->db->join('akun','akun.id = rujukan.id');
		$this->db->join('rumah_sakit','rumah_sakit.id_RS = rujukan.id_RS');
        $this->db->join('hasil_diagnosa','hasil_diagnosa.id_hasil = rujukan.id_hasil');
        $this->db->where('rujukan.id_RS',$this->session->userdata('id_RS'),'and','rujukan.id_rujukan',$id_rujukan); 
		$query = $this->db->get();
		return $query->result_array();
	}
    public function tambah_hasil($table,$data){
        $insert = $this->db->insert($table, $data);
        if ($insert){
          return TRUE;
        }else{
          return FALSE;
        }
      }

      public function view_rekam_medis(){
		$this->db->select('*');
		$this->db->from('hasil_rs');
        $this->db->join('akun','akun.id = hasil_rs.id');
		$this->db->join('rumah_sakit','rumah_sakit.id_RS = hasil_rs.id_RS');
        $this->db->where('hasil_rs.id_RS',$this->session->userdata('id_RS')); 
		$query = $this->db->get();
		return $query->result_array();
	}
	
}
