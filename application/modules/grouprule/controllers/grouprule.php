<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grouprule extends CI_Controller {
	private $c = 'grouprule';

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
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access AGENT page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		$this->load->library('pagination');
		
		// load model
		$this->load->model('config/ConfigModel');
		$this->load->model('GroupruleModel');
		$this->load->model('auth/GroupModel');
		
		$cfg = $this->ConfigModel->getlist();
		
		// configuration paging
		$config['base_url'] = site_url()."/grouprule/index/";
		$config['total_rows'] = $this->GroupModel->jmlhdata();
		$config['per_page'] = $cfg[0]['jmlh_item'];
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config); 
		
		$listgroup = $this->GroupModel->getlist(0,0);
		
		// prepare data
		$data['jmlh_data'] = $this->GroupModel->jmlhdata();
		$data['jmlh_item'] = $cfg[0]['jmlh_item'];
		$data['action'] = site_url().'/grouprule/edit';
		$data['results'] = $listgroup;
		$data['file'] = 'grouprule/list';
		$data['title'] = $cfg[0]['app_name'];
		$data['version'] = $cfg[0]['version'];
		$data['page'] = $page;
		$data['c'] = $this->c;
		$data['subtitle'] = "Group Rule";
		
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
			$text = '<div class="notification warning no-margin"> <span class="strong">Warning!</span> You dont have authorizate to access GROUP RULE page. </div><p></p>';
			$this->session->set_flashdata('msg',$text);
			redirect('dashboard/index');
		}
		
		// load model
		$this->load->model('GroupruleModel');
		$this->load->model('auth/GroupModel');
		$this->load->model('rule/RuleModel');
		//$this->load->model('HakaksesModel');
		
		$data['results'] = null;
		$data['action'] = site_url().'/grouprule/update';
		$data['listgroup'] = $this->GroupModel->getlist(0,0);
		$data['listrule'] = $this->RuleModel->getlist(0,0);
		$data['group_id'] = $id;
		
		$result = $this->GroupruleModel->listakseslevel('index');
		$data['canread'] = $this->GroupruleModel->getrulemethod($id,'index');
		$data['canadd'] = $this->GroupruleModel->getrulemethod($id,'add');
		$data['canedit'] = $this->GroupruleModel->getrulemethod($id,'edit');
		$data['candelete'] = $this->GroupruleModel->getrulemethod($id,'hapus');

		for($i=0; $i < count($result); $i++){
			$rsindex = array('rsindex'=>$result[$i]['rule_id']);

			//echo "Rule id : ".$result[$i]['rule_id']."<br>";
			//echo "Rule class : ".$result[$i]['rule_class']."<br>";

			// cek apakah rule class tsb dpt add
			$isadd = $this->GroupruleModel->canadd($result[$i]['rule_class']);
			// cek apakah rule class tsb dpt edit
			$isedit = $this->GroupruleModel->canedit($result[$i]['rule_class']);
			// cek apakah rule class tsb dpt delete
			$isdelete = $this->GroupruleModel->candelete($result[$i]['rule_class']);

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

			$aksesleveladd = $this->GroupruleModel->getrulemethod($id,'add');
			$add = array('add'=>4);
			$edit = array('edit'=>5);
			$hapus = array('hapus'=>6);
			$data['listakseslevel'][]= array_merge($result[$i],$rsindex,$rsadd,$rsedit,$rsdelete);
		}		

		if($id){ 
			$data['results'] = $this->GroupruleModel->get_by_id($id); 
		} 
		
		$this->load->view('grouprule/form',$data);
		
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
		
		redirect(site_url('grouprule'));	
    }
	
    public function save(){ 
		// load model
		$this->load->model('GroupruleModel');

		$data['id'] = null;
		$data['group_id'] = $this->input->post('group_id');
		$data['rule_id'] = $this->input->post('rule_id');

		$this->GroupruleModel->saveData($data); 
		
		$text = '<div class="notification info nopic">Data GROUP RULE telah berhasil di simpan. </div>';
		$this->session->set_flashdata('msg',$text);
	}  
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */