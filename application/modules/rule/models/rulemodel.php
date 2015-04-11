<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RuleModel extends CI_Model{

	private $tbl = 'kaio_rules';

	public function _construct()
	{
		parent::_construct();
	}
	
	public  function getlist($start,$finish){ 
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->order_by('rule_class','asc');
		
		if($start > 0 OR $finish > 0){
			$this->db->limit($start,$finish);
		}
		
		return $this->db->get()->result();
	}
	
	public function jmlhdata(){
		return $this->db->count_all_results($this->tbl);
	}
	
	public function hapus($id=0){
		$this->db->where_in('rule_id',$id);
		$this->db->delete($this->tbl);
		return true;
	}
	
	public function get_by_id($id){ 
		$this->db->select('*');
		$this->db->where('rule_id', $id);
		return $this->db->get($this->tbl)->result_array();
	}
	
	public function saveData($data)
	{
		if(empty($data['rule_id'])){
			$this->db->insert($this->tbl,$data);
		} else {
			$this->db->where('rule_id',$data['rule_id']);
			$this->db->update($this->tbl,$data);
		}
	}
	
}

?>
