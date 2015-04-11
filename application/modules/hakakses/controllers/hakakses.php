<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hakakses extends CI_Controller {
	private $c = 'hakakses';

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
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access HAK AKSES page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		$this->load->library('pagination');
		
		// load model
		$this->load->model('config/ConfigModel');
		$this->load->model('HakaksesModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// configuration paging
		$config['base_url'] = site_url()."/hakakses/index/";
		$config['total_rows'] = $this->HakaksesModel->jmlhdata();
		$config['per_page'] = $cfg[0]['jmlh_item'];
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config); 
		
		$hakakses = $this->HakaksesModel->getlist($config['per_page'],$page);
		
		// prepare data
		$data['jmlh_data'] = $this->HakaksesModel->jmlhdata();
		$data['jmlh_item'] = $cfg[0]['jmlh_item'];
		$data['action'] = site_url().'/hakakses/edit';
		$data['results'] = $hakakses;
		$data['file'] = 'hakakses/list';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['page'] = $page;
		$data['subtitle'] = "Hak Akses";
		$data['c'] = $this->c;
		
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
		
		// load model
		$this->load->model('user/UserModel');
		$this->load->model('rule/RuleModel');
		$this->load->model('HakaksesModel');
		
		$data['results'] = null;
		$data['action'] = site_url().'/hakakses/update';
		$data['listuser'] = $this->UserModel->getlist(0,0);
		$data['listrule'] = $this->RuleModel->getlist(0,0);
		
		$result = $this->HakaksesModel->listakseslevel('index');
		$data['canread'] = $this->HakaksesModel->getrulemethod($id,'index');
		$data['canadd'] = $this->HakaksesModel->getrulemethod($id,'add');
		$data['canedit'] = $this->HakaksesModel->getrulemethod($id,'edit');
		$data['candelete'] = $this->HakaksesModel->getrulemethod($id,'hapus');

		for($i=0; $i < count($result); $i++){
			$rsindex = array('rsindex'=>$result[$i]['rule_id']);

			//echo "Rule id : ".$result[$i]['rule_id']."<br>";
			//echo "Rule class : ".$result[$i]['rule_class']."<br>";

			// cek apakah rule class tsb dpt add
			$isadd = $this->HakaksesModel->canadd($result[$i]['rule_class']);
			// cek apakah rule class tsb dpt edit
			$isedit = $this->HakaksesModel->canedit($result[$i]['rule_class']);
			// cek apakah rule class tsb dpt delete
			$isdelete = $this->HakaksesModel->candelete($result[$i]['rule_class']);

			//print_r($isadd);
			if(count($isadd) > 0){
				// jika dpt add
				$rsadd = array('rsadd'=>$isadd[0]['rule_id']);
			} else {
				$rsadd = array('rsadd'=>0);
			}

			if(count($isedit) > 0){
				// jika dpt edit
				$rsedit = array('rsedit'=>$isedit[0]['rule_id']);
			} else {
				$rsedit = array('rsedit'=>0);
			}

			if(count($isdelete) > 0){
				// jika dpt edit
				$rsdelete = array('rsdelete'=>$isdelete[0]['rule_id']);
			} else {
				$rsdelete = array('rsdelete'=>0);
			}

			$aksesleveladd = $this->HakaksesModel->getrulemethod($id,'add');
			$add = array('add'=>4);
			$edit = array('edit'=>5);
			$hapus = array('hapus'=>6);
			$data['listakseslevel'][]= array_merge($result[$i],$rsindex,$rsadd,$rsedit,$rsdelete);
		}		

		if($id){ 
			$data['results'] = $this->HakaksesModel->get_by_id($id); 
		} 
		
		$this->load->view('hakakses/form',$data); 
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
		
		redirect(site_url('hakakses'));	
    }
	
    public function save(){ 
		$this->load->model('HakaksesModel');
		
		$data['id'] = null;
		$data['user_id'] = $this->input->post('user_id');
		$data['group_id'] = $this->input->post('group_id');
		$data['rule_id'] = $this->input->post('rule_id');

		$this->HakaksesModel->saveData($data);
		
		$text = '<div class="notification info nopic">Data HAK AKSES telah berhasil di edit. </div>';
		$this->session->set_flashdata('msg',$text);
	}  
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */