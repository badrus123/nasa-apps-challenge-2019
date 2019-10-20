<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model {

	public function check($data){
        $this->db->where('email_RS', $data['email_RS']);
        $this->db->where('password', $data['password']);
        // $this->db->select('*');
        
        $query = $this->db->get('rumah_sakit');
        
        if($query->num_rows()==1) {
            return $query->row(0);
        }else {
            return FALSE;
        }
        
        
    }

    public function register_user($table,$data){
        $insert = $this->db->insert($table, $data);
        if ($insert){
          return TRUE;
        }else{
          return FALSE;
        }
      }
}
?>