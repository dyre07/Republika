<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function index(){
		$this->load->view('login');
	}
    
    public function register(){
        $this->load->view('register');
    }
    
    public function doLogin(){
        $uname = $this->input->post('uname');
        $pass = $this->input->post('password');
        $num_rows = $this->login_model->check($uname, $pass);
        
        if($num_rows==1){
            $data['admin'] = $this->login_model->admin($uname, $pass);
            $ses = array(
                'id_admin' => $data['admin'][0]['id_admin'],
				'nama' => $data['admin'][0]['nama'],
				'login' => TRUE
            );
            
            $this->session->set_userdata($ses);
            echo "<script>
                    window.location.href='".base_url('admin')."';
                    alert('Login Success');
                 </script>";
        }else{
            echo "<script>
                    window.location.href='".base_url('login')."';
                    alert('Login Failed, Wrong Username or Password');
                 </script>";
        }
    }
    
    public function doRegister(){
        $pass = $this->input->post('pass');
	    $data=array(
			  'nama' => $this->input->post('nama'),
		      'username' => $this->input->post('uname'),
              'password' => md5($pass)			
		);
		
		$this->login_model->insert($data);
		redirect(base_url('login'));
	}
    
    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

