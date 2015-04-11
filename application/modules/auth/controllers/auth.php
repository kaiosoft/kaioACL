<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

/*
*	Controller untuk Authentikasi
*/

class Auth extends CI_Controller {
 
	public function _construct(){
		parent::_construct();	
	}
	 
    function index(){
		if ($this->session->userdata('logged_in')){
			redirect('dashboard/index');
        } else {
           redirect('auth/login/');
        }	
    }
	 
    function login(){ 
		$this->load->model('AuthModel');
		$this->load->model('config/ConfigModel');
		$config = $this->ConfigModel->getlist();

		$form_data = $this->input->post('data');

        if (!empty($form_data)){
			if ($this->AuthModel->login($form_data['username'], $form_data['password'])){				
				// checking block user
				if($this->acl->is_block($this->session->userdata('user_id'))){ 
					// jika di blok -> logout
					$this->logout();
				} else {
					// update login time
					$data['last_login'] = date('Y:m:d H:m:s');
					$this->acl->update_login($this->session->userdata('user_id'),$data);
					redirect('auth/index');
				}
            } else {
				$this->session->set_flashdata('msg','Username & Password Salah');
                redirect('auth/login');
            }
        }
		
		$data['version'] = $config[0]['version'];
		$data['app_name'] = $config[0]['app_name'];
        $this->load->view('templates/default/login', $data);
    }
 
    function logout(){
		$this->load->model('AuthModel');
        $this->AuthModel->logout();
        redirect('auth/login');
    } 
}

?>