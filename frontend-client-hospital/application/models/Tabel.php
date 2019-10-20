<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Model {

	public function Get_Rujukan(){
		$this->db->select('*');
		$this->db->from('rujukan');
        $this->db->join('akun','akun.id = rujukan.id');
		$this->db->join('rumah_sakit','rumah_sakit.id_RS = rujukan.id_RS');
        $this->db->join('hasil_diagnosa','hasil_diagnosa.id_hasil = rujukan.id_hasil');
        $this->db->where('rujukan.id_RS',$this->session->userdata('id_RS'));        
		$query = $this->db->get();
		return $query->result_array();
	}
    public function Get_Hasil_RS(){
		$this->db->select('*');
		$this->db->from('hasil_rs');
        $this->db->join('akun','akun.id = hasil_rs.id');
		$this->db->join('rumah_sakit','rumah_sakit.id_RS = hasil_rs.id_RS');
		$this->db->where('hasil_rs.id_RS',$this->session->userdata('id_RS')); 
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function delete_rujukan($table,$id_rujukan){
        $this->db->where('id_rujukan', $id_rujukan);
        $delete = $this->db->delete($table);
        if ($delete){
          return TRUE;
        }else{
          return FALSE;
        }
      }

      public function update_rujukan($table,$id_rujukan,$data){
        $this->db->where('id_rujukan', $id_rujukan);
        $update = $this->db->update($table,$data);
        if ($update){
          return TRUE;
        }else{
          return FALSE;
        }
      }
	
}
