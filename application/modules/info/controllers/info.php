<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {
	private $c = 'info';

	public function _construct(){
		parent::_construct();	
	}
		
	public function index(){
				
		$user_id = $this->session->userdata('user_id');
		
		// cek acl
		if(!$this->acl->cek_acl($this->c,'index',$user_id)){
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access '.$this->c.' page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('config/ConfigModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// prepare data
		$data['file'] = 'info/info';
		$data['results'] = null;
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['subtitle'] = "Kaio Framework Production";
				
		// Write to $title
		$this->template->write('title', $data['title']);

		// Write to $subtitle
		$this->template->write('subtitle', $data['subtitle']);
		
		// Write to Header
		$this->template->write_view('header', 'templates/default/header.php'); 
		  
		// Write to Content
		$this->template->write_view('content', 'templates/default/content.php', $data);
					
		// Write to Footer
		$this->template->write_view('footer', 'templates/default/footer.php'); 
		  
		// Render the template
		$this->template->render();
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */