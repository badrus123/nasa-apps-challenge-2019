<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Hasil_RS extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id_hasil_RS = $this->get('id_hasil_RS');
        if ($id_hasil_RS == '') {
            $kontak = $this->db->select('*')->from('hasil_rs')->join('akun','akun.id = hasil_rs.id')->join('rumah_sakit','rumah_sakit.id_RS = hasil_rs.id_RS')->get()->result();
        } else {
            $this->db->where('hasil_rs', $id_hasil_RS);
            $kontak = $this->db->select('*')->from('diagnosa')->join('akun','akun.id = diagnosa.id')->join('rumah_sakit','rumah_sakit.id_RS = hasil_rs.id_RS')->get()->result();
        }
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id_hasil_RS'    => $this->post('id_hasil_RS'),
                    'id'  => $this->post('id'),
                    'hasil_rs' => $this->post('hasil_rs'));
        $insert = $this->db->insert('hasil_rs', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id_hasil_RS = $this->put('id_hasil_RS');
        $data = array(
                    'id_hasil_RS'       => $this->put('id_hasil_RS'),
                    'id'          => $this->put('id'),
                    'hasil_rs'    => $this->put('hasil_rs'));
        $this->db->where('id_hasil_RS', $id_hasil_RS);
        $update = $this->db->update('hasil_rs', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
        //Menghapus salah satu data kontak
        function index_delete() {
            $id_hasil_RS = $this->delete('id_hasil_RS');
            $this->db->where('id_hasil_RS', $id_hasil_RS);
            $delete = $this->db->delete('hasil_rs');
            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

    
}
?>  