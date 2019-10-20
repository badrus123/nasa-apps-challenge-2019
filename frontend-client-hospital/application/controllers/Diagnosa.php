<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Diagnosa extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data diagnosa
    function index_get() {
        $id_diagnosa = $this->get('id_diagnosa');
        if ($id_diagnosa == '') {
            $diagnosa = $this->db->get('diagnosa')->result();
        } else {
            $this->db->where('id_diagnosa', $id_diagnosa);
            $diagnosa = $this->db->get('diagnosa')->result();
        }
        $this->response($diagnosa, 200);
    }

    //Masukan function selanjutnya disini

    //Mengirim atau menambah data diagnosa baru
    function index_post() {
        $data = array(
                    'id_diagnosa'    => $this->post('id_diagnosa'),
                    'judul'  => $this->post('judul'),
                    'definisi' => $this->post('definisi'),
                    'diagnosa' => $this-put('diagnosa'));
        $insert = $this->db->insert('diagnosa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data diagnosa yang telah ada
    function index_put() {
        $id_diagnosa = $this->put('id_diagnosa');
        $data = array(
                    'id_diagnosa'       => $this->put('id_diagnosa'),
                    'judul'          => $this->put('judul'),
                    'definisi'    => $this->put('definisi'),
                    'diagnosa' => $this-put('diagnosa'));
        $this->db->where('id_diagnosa', $id_diagnosa);
        $update = $this->db->update('diagnosa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
        //Menghapus salah satu data diagnosa
        function index_delete() {
            $id_diagnosa = $this->delete('id_diagnosa');
            $this->db->where('id_diagnosa', $id_diagnosa);
            $delete = $this->db->delete('diagnosa');
            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    //Masukan function selanjutnya disini
}
?>  
