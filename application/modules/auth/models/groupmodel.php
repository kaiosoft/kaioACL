<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroupModel extends CI_Model{

	private $tbl = 'kaio_groups';

	public function _construct()
	{
		parent::_construct();
	}
	
	public  function getlist(){ 
		$this->db->select('*');
		$this->db->from($this->tbl);		
		$this->db->order_by('group_name','asc');		
		return $this->db->get()->result();
	}
	
	public function jmlhdata(){
		return $this->db->count_all_results($this->tbl);
	}
	
	public function hapus($id=0){
		$this->db->where_in('id',$id);
		$this->db->delete($this->tbl);
		return true;
	}
	
	public function get_by_id($id){ 
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get($this->tbl)->result_array();
	}
	
	public function saveData($data)
	{
		if(empty($data['id'])){
			$this->db->insert($this->tbl,$data);
		} else {
			$this->db->where('id',$data['id']);
			$this->db->update($this->tbl,$data);
		}
	}
	
	public  function listgroup(){ 
		$this->db->select('*');
		$this->db->from($this->tbl);		
		$this->db->where('group_name','manager');
		$this->db->or_where('group_name','staff');
		$this->db->or_where('group_name','direksi');
		$this->db->order_by('group_name','asc');	
		
		return $this->db->get()->result();
	}
	
}

?>
