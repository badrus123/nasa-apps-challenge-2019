<?php

class Dashboard extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model("M_Hasil_RS");
  }


  public function index(){
      $data["value"] = $this->M_Hasil_RS->Get_Hasil_RS(); 
      
      // print_r($data);
    $this->load->view('dokter/dashboard',$data);
  }


 
}