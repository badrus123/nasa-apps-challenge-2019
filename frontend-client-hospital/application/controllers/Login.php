<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("M_login");
        $this->load->helper('string');
      }

	public function index()
	{

		$this->load->view('login');
    }
    public function register()
	{
		$this->load->view('register');
    }
    public function check(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $data = array(
			'email_RS' => $email,
			'password' => md5($password)
			);
        $login = $this->M_login->check($data);
        
        if ($login){	
                $data1 = array(
                    'logodin' => 'logodin',
                    'nama' => $login->nama_rumah_sakit,
                    'email' => $login->email_RS,
                    'id_RS' => $login->id_RS,
                    'password' => $login->password
                );
                
                $this->session->set_userdata($data1);
                
                if( $this->session->userdata('logodin') == 'logodin'){
                    redirect('Dashboard/index');
                }
                else {
                    redirect('Login/index');
                }
                
                
            }else{
                $this->session->set_flashdata('message','Error Login');
                redirect('Login/index');
            }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('Login/index');
    }
    public function register_add()
    {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $table = 'rumah_sakit';
        $data_insert = array (
        'nama_rumah_sakit' => $nama,
        'email_RS' => $email,
        'password' => md5($password),
        'latitude' => -10.5457763671875,
        'longitude' => 121.751281738281,
        'alamat' => $alamat

        
        );
        $register = $this->M_login->register_user($table, $data_insert);
        if ($register) {
        $this->session->set_flashdata('alert', 'registrasi_berhasil');
        redirect('Login/index');
        }
    }

    
}
