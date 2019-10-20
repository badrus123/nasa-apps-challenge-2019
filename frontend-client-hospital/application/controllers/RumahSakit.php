<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class RumahSakit extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data diagnosa
    function index_get() {
        $id_diagnosa = $this->get('id_RS');
        if ($id_diagnosa == '') {
            $diagnosa = $this->db->get('rumah_sakit')->result();
        } else {
            $this->db->where('id_RS', $id_diagnosa);
            $diagnosa = $this->db->get('rumah_sakit')->result();
        }
        $this->response($diagnosa, 200);
    }

    
}
?>  
