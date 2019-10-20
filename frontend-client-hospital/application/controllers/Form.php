<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("Form_model");
	}
	public function index()
	{
		$data["value"]=$this->Form_model->view_rekam_medis();
		$this->load->view('dokter/form',$data);
	}
	public function form1($id_rujukan)
	{
		$data["value"]=$this->Form_model->Get_Rujukan($id_rujukan);
		$this->load->view('dokter/form1',$data);
	}

	public function hasil_rs()
    {
		$table = "hasil_rs";
        $id_RS = $this->session->userdata('id_RS');
        $nama_dokter = $this->input->post('dokter');
        $hasil_diagnosa = $this->input->post('hasil_diagnosa');
        $id = $this->input->post('id');
		$harga = $this->input->post('pembayaran');
		$tanggal = $this->input->post('tanggal');
        $data_insert = array (
		'id_RS' => $id_RS,
		'nama_dokter' => $nama_dokter,
        'hasil_diagnosa' => $hasil_diagnosa,
		'id' => $id,
		'harga' => $harga,
		'date' => $tanggal  
        );
        $tambah_data = $this->Form_model->tambah_hasil($table, $data_insert);
        if ($tambah_data) {
        $this->session->set_flashdata('alert', 'gagal');
        redirect('Table/index');
		}
		
	}
	
}
