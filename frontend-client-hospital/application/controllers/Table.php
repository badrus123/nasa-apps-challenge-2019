<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("Tabel");
	}
	
	public function index()
	{
		$data["value"]=$this->Tabel->Get_Rujukan();
		$data["nilai"] = $this->Tabel->Get_Hasil_RS();
		
		$this->load->view('dokter/table',$data);
	}

	public function delete_data($id_rujukan){
		$table = 'rujukan';
		$this->Tabel->delete_rujukan($table,$id_rujukan);
		$this->session->set_flashdata('alert', 'sukses_delete');
		redirect(site_url('Table/index'));
	  }


	public function edit_data($id_rujukan){
		$table = 'rujukan';
		$status = "denied";

		$data = array (
		  'status' => $status
		);
		$update = $this->Tabel->update_rujukan($table,$id_rujukan,$data);
		if($update){
		  $this->session->set_flashdata('alert', 'sukses_update');
		  redirect(site_url('Table/index'));
		}else{
		  echo "<script>alert('Gagal mengupdate Data');</script>";
		}
	  }

	  public function edit_data1($id_rujukan){
		$table = 'rujukan';
		$status = "process";

		$data = array (
		  'status' => $status
		);
		$update = $this->Tabel->update_rujukan($table,$id_rujukan,$data);
		if($update){
		  $this->session->set_flashdata('alert', 'sukses_update');
		  redirect(site_url('Table/index'));
		}else{
		  echo "<script>alert('Gagal mengupdate Data');</script>";
		}
	  }

	  
}
