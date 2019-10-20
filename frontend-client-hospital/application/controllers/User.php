<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data akun
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $akun = $this->db->get('akun')->result();
        } else {
            $this->db->where('id', $id);
            $akun = $this->db->get('akun')->result();
        }
        $this->response($akun, 200);
    }

    //Masukan function selanjutnya disini

    //Mengirim atau menambah data akun baru
    function index_post() {
        $data = array(
                    'id'    => $this->post('id'),
                    'nama'  => $this->post('nama'),
                    'email' => $this->post('email'),
                    'password' => $this-put('password'));
        $insert = $this->db->insert('akun', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data akun yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'email'    => $this->put('email'),
                    'password' => $this-put('password'));
        $this->db->where('id', $id);
        $update = $this->db->update('akun', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
        //Menghapus salah satu data akun
        function index_delete() {
            $id = $this->delete('id');
            $this->db->where('id', $id);
            $delete = $this->db->delete('akun');
            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    //Masukan function selanjutnya disini
}
?>  