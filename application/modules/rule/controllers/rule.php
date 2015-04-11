<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rule extends CI_Controller {
	private $c = 'rule';

	public function _construct(){
		parent::_construct();	
	}

	public function index($page=0)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('auth/login');
		}
		
		$user_id = $this->session->userdata('user_id');
		$perusahaan_id = $this->session->userdata('perusahaan_id');
		
		// cek acl
		if(!$this->acl->cek_acl($this->c,'index',$user_id)){
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access RULE page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		$this->load->library('pagination');
		
		// load model
		$this->load->model('config/ConfigModel');
		$this->load->model('RuleModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// configuration paging
		$config['base_url'] = site_url()."/rule/index/";
		$config['total_rows'] = $this->RuleModel->jmlhdata($perusahaan_id);
		$config['per_page'] = $cfg[0]['jmlh_item'];
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config); 
		
		$rules = $this->RuleModel->getlist($config['per_page'],$page);
		
		// prepare data
		$data['jmlh_data'] = $this->RuleModel->jmlhdata($perusahaan_id);
		$data['jmlh_item'] = $cfg[0]['jmlh_item'];
		$data['action'] = site_url().'/rule/edit';
		$data['results'] = $rules;
		$data['file'] = 'rule/list';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['page'] = $page;
		$data['c'] = $this->c;
		$data['subtitle'] = "Rule";
		
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
	
	public function edit($id=0){
	
		$user_id = $this->session->userdata('user_id');
		
		// cek acl
		if(!$this->acl->cek_acl($this->c,'edit',$user_id)){
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access RULE page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('RuleModel');
		
		$data['results'] = null;
		$data['action'] = site_url().'/rule/update';

		if($id){ 
			$data['results'] = $this->RuleModel->get_by_id($id); 
		} 
		
		$this->load->view('rule/form',$data);
		
	}
	
    public function update(){
		if($this->input->post('button')=='Save'){
			if($this->input->post('id')){
				$data['updatetype'] = "edit";
			} else {
				$data['updatetype'] = "new";
			}
			$this->save();
		} else {
			$this->hapus();
		}
		
		redirect(site_url('rule'));	
    }
	
    public function save(){ 
		// load model
		$this->load->model('RuleModel');
		
		$data['rule_id'] = $this->input->post('rule_id');
		$data['rule_class'] = $this->input->post('rule_class');
		$rule_method = $this->input->post('rule_method');
		$menu = $this->input->post('menu');
		
		for($i=0; $i < count($rule_method); $i++){
			$data['rule_method'] = $rule_method[$i];
			$data['menu'] = $menu[$i];
			$this->RuleModel->saveData($data); 
		}
		
		$text = '<div class="notification info nopic">Data RULE telah berhasil di simpan. </div>';
		$this->session->set_flashdata('msg',$text);
	}  
	
	/*
	*	Next version data tdk bisa di hapus jika sdng di gunakan di tabel lain
	*/
	private function hapus($id=0){
		// load model
		$this->load->model('RuleModel');
		
		$id = $this->input->post('id');

		for($i=0; $i < count($id); $i++){
			$this->RuleModel->hapus($id[$i]);
		}

		$text = '<div class="notification info nopic">Data RULE telah berhasil di hapus. </div>';
		$this->session->set_flashdata('msg',$text);
	}
	
    public function confirm(){
		$data['id'] = $this->input->post('id');
		$data['action'] = site_url().'/rule/update';
		$this->load->view('rule/confirm-delete',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */