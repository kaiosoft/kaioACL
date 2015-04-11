<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {
	private $c = 'config';

	public function _construct(){
		parent::_construct();	
	}
	
	public function index(){
		$this->edit();
	}
	
	public function edit(){
		
		// load model
		$this->load->model('ConfigModel');
		
		$cfg = $this->ConfigModel->getlist();
				
		// prepare data
		$data['results'] = $this->ConfigModel->get_by_id();  
		$data['action'] = site_url().'/config/update';
		$data['file'] = 'config/form';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
				
		// Write to $title
		$this->template->write('title', $data['title']);

		$subtitle = "Configuration System";
		// Write to $subtitle
		$this->template->write('subtitle', $subtitle);
		
		// Write to Header
		$this->template->write_view('header', 'templates/default/header.php'); 
		  
		// Write to Content
		$this->template->write_view('content', 'templates/default/content.php', $data);
					
		// Write to Footer
		$this->template->write_view('footer', 'templates/default/footer.php'); 
		  
		// Render the template
		$this->template->render();
		
	}
	
    public function update(){
		if($this->input->post('id')){
			$data['updatetype'] = "edit";
		} else {
			$data['updatetype'] = "new";
		}
		$this->save();
		
		redirect(site_url('config/edit'));	
    }
	
    public function save(){ 
		// load model
		$this->load->model('ConfigModel');
		
		$data['id'] = $this->input->post('id');
		$data['app_name'] = $this->input->post('app_name');
		$data['jmlh_item'] = $this->input->post('jmlh_item');
		$data['pnjg'] = $this->input->post('pnjg');
		$data['lbr'] = $this->input->post('lbr');
		
		$text = '';
		
		if(!empty($_FILES['userfile']['name'])){
		
			$data['logo'] = $_FILES['userfile']['name'];
			
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['file_name']  = $data['logo'];
			
			$this->load->library('upload', $config);
					
			// upload foto
			if(!$this->upload->do_upload()){
				$text .= '<div class="notification info nopic">Upload FOTO gagal di simpan : '.$this->upload->display_errors().' </div>';
			}
		}
		
		$this->ConfigModel->saveData($data);
		
		$text .= '<div class="notification info nopic">Data CONFIGURASI SYSTEM telah berhasil di simpan. </div>';
		$this->session->set_flashdata('msg',$text);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */