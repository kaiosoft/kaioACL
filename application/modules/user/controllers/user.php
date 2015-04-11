<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	private $c = 'user';

	public function _construct(){
		parent::_construct();	
	}

	public function index($page=0)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('auth/login');
		}
		
		$user_id = $this->session->userdata('user_id');
		
		// cek acl
		if(!$this->acl->cek_acl($this->c,'index',$user_id)){
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access USER page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		$this->load->library('pagination');
		
		// load model
		$this->load->model('config/ConfigModel');
		$this->load->model('UserModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// configuration paging
		$config['base_url'] = site_url()."/user/index/";
		$config['total_rows'] = $this->UserModel->jmlhdata();
		$config['per_page'] = $cfg[0]['jmlh_item'];
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config); 
		
		$user = $this->UserModel->getlist($config['per_page'],$page);
		
		// prepare data
		$data['jmlh_data'] = $this->UserModel->jmlhdata();
		$data['jmlh_item'] = $cfg[0]['jmlh_item'];
		$data['action'] = site_url().'/user/edit';
		$data['results'] = $user;
		$data['file'] = 'user/list';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['page'] = $page;
		$data['c'] = $this->c;
		$data['subtitle'] = "User";
		
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
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access USER page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('UserModel');
		$this->load->model('auth/GroupModel');
				
		$data['results'] = null;
		$data['action'] = site_url().'/user/update';
		$data['listgroup'] = $this->GroupModel->getlist(); 

		if($id){ 
			$data['results'] = $this->UserModel->get_by_id($id); 
		} 
		
		$this->load->view('user/form',$data);
		
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
		
		if($this->input->post('type_edit')=='edit_password'){
			redirect(site_url('user/edit_paswd'));	
		} else {
			redirect(site_url('user'));	
		}
    }
	
    public function save(){ 
		// load model
		$this->load->model('UserModel');
		
		$data['user_id'] = $this->input->post('user_id');
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');		
		
		if(!$data['user_id']){
			// jika user baru terlebih dahulu apakah username sdh ada ?
			// cek username
			
			$data['tgl_register'] = date('Y-m-d');
			$data['k_username']= $this->input->post('username');
		}		
		
		if($this->input->post('password')!=""){
			$data['k_password']= md5($this->input->post('password'));
		}
		
		if($this->session->userdata('group_id')=='11890083' OR $this->session->userdata('group_id')=='11890091'){
			$data['block']= $this->input->post('block');
		}
		
		$data['group_id'] = $this->input->post('group_id');
		
		$this->UserModel->saveData($data); 
		$user_id = $this->UserModel->get_user_id($data['email']);
		
		// create akses level user
		if(!$data['user_id']){ 
			// jika user baru buat hak akses level dengan meggunakan library acl
			if(!$this->acl->buat_akses_level($user_id[0]['user_id'],$data['group_id'])){
				echo "Gagal membuat akses level, rule Group belum di definisikan";
				// hapus user
				$this->UserModel->hapus($user_id[0]['user_id']);
			}
		}
		
		$text = '<div class="notification info nopic">Data USER telah berhasil di simpan. </div>';
		$this->session->set_flashdata('msg',$text);
	}  
	
	/*
	*	Next version data tdk bisa di hapus jika sdng di gunakan di tabel lain
	*/
	private function hapus(){
		// load model
		$this->load->model('UserModel');
		
		$id = $this->input->post('id');
		
		for($i=0; $i < count($id); $i++){
			$this->UserModel->hapus($id[$i]);
			
			// hapus hak akses user menggunakan library acl
			$this->acl->hapus_akses_level($id);
		}
		
		$text = '<div class="notification info nopic">Data USER telah berhasil di hapus. </div>';
		$this->session->set_flashdata('msg',$text);
	}
	
    public function confirm(){
		$data['id'] = $this->input->post('id');
		$data['action'] = site_url().'/user/update';
		$this->load->view('user/confirm-delete',$data);
    }
	
	public function edit_paswd(){
		
		$user_id = $this->session->userdata('user_id');
				
		// cek acl
		if(!$this->acl->cek_acl($this->c,'edit',$user_id)){
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access USER page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('config/ConfigModel');
		$this->load->model('user/UserModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// prepare data
		$data['action'] = site_url().'/user/update';
		$data['results'] = $this->UserModel->get_by_id($user_id);
		$data['file'] = 'user/form_edit';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['c'] = $this->c;
		$data['subtitle'] = "User";
		
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