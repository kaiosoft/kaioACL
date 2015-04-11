<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroupruleModel extends CI_Model{

	private $tbl = 'kaio_role_rules';

	public function _construct()
	{
		parent::_construct();
	}
	
	public  function getlist($start,$finish){ 
		$this->db->select('b.group_name,c.rule_class,c.rule_method,a.*');
		$this->db->from('kaio_role_rules AS a');
		$this->db->join('kaio_groups AS b','b.group_id=a.group_id');
		$this->db->join('kaio_rules AS c','c.rule_id=a.rule_id');
		$this->db->order_by('b.group_name','asc');
		$this->db->limit($start,$finish);
		return $this->db->get()->result();
	}
	
	public function jmlhdata($perusahaan_id){
		return $this->db->count_all('kaio_role_rules');
	}
		
	public function get_by_id($id){ 
		$this->db->select('*');
		$this->db->where('group_id', $id);
		return $this->db->get($this->tbl)->result_array();
	}
	
	public function saveData($data)
	{
		$this->hapus($data['group_id']);
		
		for($i=0; $i < count($data['rule_id']); $i++){
			$q = "INSERT INTO kaio_role_rules VALUES('".$data['id']."','".$data['group_id']."','".$data['rule_id'][$i]."')";
			$this->db->query($q);
		}
	}
	
	public function hapus($user_id){
		$this->db->where('group_id',$user_id);
		$this->db->delete($this->tbl);
		return true;
	}
	
	function listakseslevel($rule_method){
		$this->db->select('menu,rule_id,rule_class');
		$this->db->where('rule_method',$rule_method);
		$this->db->order_by('menu','asc');
		return $this->db->get('kaio_rules')->result_array();
	}
	
	/* function untuk mencari nilai ceklist berdasarkan rule method*/
	function getrulemethod($group_id,$arg){
		$this->db->select('a.*,b.rule_method');
		$this->db->join('kaio_rules AS b','b.rule_id=a.rule_id');	
		$this->db->where('a.group_id',$group_id);
		$this->db->where('b.rule_method',$arg);
		return $this->db->get('kaio_role_rules AS a')->result_array();	
	}
	
	/* function untuk mencari rule class yg dpt add */
	function canadd($arg){
		$this->db->where('rule_class',$arg);
		$this->db->where('rule_method','add');
		return $this->db->get('kaio_rules')->result_array();	
	}
	
	/* function untuk mencari rule class yg dpt edit */
	function canedit($arg){
		$this->db->where('rule_class',$arg);
		$this->db->where('rule_method','edit');
		return $this->db->get('kaio_rules')->result_array();	
	}
	
	/* function untuk mencari rule class yg dpt delete */
	function candelete($arg){
		$this->db->where('rule_class',$arg);
		$this->db->where('rule_method','hapus');
		return $this->db->get('kaio_rules')->result_array();	
	}
	
}

?>
