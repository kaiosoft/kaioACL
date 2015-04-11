<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $c = 'dashboard';

	public function _construct(){
		parent::_construct();	
	}

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('auth/login');
		}
		
		$user_id = $this->session->userdata('user_id');
		
		// cek acl
		if(!$this->acl->cek_acl($this->c,'index',$user_id)){
			$this->session->set_flashdata('msg','Anda tidak berhak mengakses halaman Dahsboard');
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('config/ConfigModel');
		$res = $this->ConfigModel->getlist();
		
		$data['subtitle'] = 'DASBOARD';
		$data['c'] = $this->c;
		$data['results'] = "Test";
		$data['file'] = 'dashboard';
		$data['title'] = $res[0]['app_name'];
		$data['version'] = $res[0]['version'];
		
		// Write to $title
		$this->template->write('title', $data['title']);

		$subtitle = "My Dashboard";
		// Write to $subtitle
		$this->template->write('subtitle', $subtitle);
		
		// Write to Header
		$this->template->write_view('header', 'templates/default/header.php'); 
		  
		// Write to Content
		$this->template->write_view('content', 'templates/default/content.php', $data);
					
		// Write to Footer
		$this->template->write_view('footer', 'templates/default/footer.php',$data); 
		  
		// Render the template
		$this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */