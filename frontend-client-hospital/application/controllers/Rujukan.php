<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rujukan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id_rujukan = $this->get('id_rujukan');
        if ($id_rujukan == '') {
            $kontak = $this->db->select('*')->from('rujukan')->join('akun','akun.id = rujukan.id')->join('hasil_diagnosa','hasil_diagnosa.id_hasil = rujukan.id_hasil')->join('rumah_sakit','rumah_sakit.id_RS = rujukan.id_RS')->get()->result();
        } else {
            $this->db->where('rujukan', $id_rujukan);
            $kontak = $this->db->select('*')->from('rujukan')->join('akun','akun.id = diagnosa.id')->join('hasil_diagnosa','hasil_diagnosa.id_hasil = rujukan.id_hasil')->join('rumah_sakit','rumah_sakit.id_RS = rujukan.id_RS')->get()->result();
        }
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id_rujukan'    => $this->post('id_rujukan'),
                    'id'  => $this->post('id'),
                    'rujukan' => $this->post('rujukan'));
        $insert = $this->db->insert('rujukan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id_rujukan = $this->put('id_rujukan');
        $data = array(
                    'id_rujukan'       => $this->put('id_rujukan'),
                    'id'          => $this->put('id'),
                    'rujukan'    => $this->put('rujukan'));
        $this->db->where('id_rujukan', $id_rujukan);
        $update = $this->db->update('rujukan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
        //Menghapus salah satu data kontak
        function index_delete() {
            $id_rujukan = $this->delete('id_rujukan');
            $this->db->where('id_rujukan', $id_rujukan);
            $delete = $this->db->delete('rujukan');
            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    //Masukan function selanjutnya disini
}
?>  