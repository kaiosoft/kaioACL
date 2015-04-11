<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{

	private $tbl = 'kaio_users';

	public function _construct()
	{
		parent::_construct();
	}
	
	public  function getlist($start,$finish){ 
		$this->db->select('b.group_name,a.*');
		$this->db->from($this->tbl.' AS a');
		$this->db->join('kaio_groups AS b','b.group_id=a.group_id');
				
		$this->db->order_by('a.name','asc');
		
		if($start > 0 OR $finish > 0){
			$this->db->limit($start,$finish);
		}
		
		return $this->db->get()->result();
	}
	
	public function jmlhdata(){		
		return $this->db->count_all_results($this->tbl);
	}
	
	public function hapus($id=0){
		$this->db->where_in('user_id',$id);
		$this->db->delete($this->tbl);
		return true;
	}
	
	public function get_by_id($id){ 
		$this->db->select('*');
		$this->db->where('user_id', $id);
		return $this->db->get($this->tbl)->result_array();
	}
	
	public function saveData($data){ 
		if(empty($data['user_id'])){
			$this->db->insert($this->tbl,$data);
		} else {
			$this->db->where('user_id',$data['user_id']);
			$this->db->update($this->tbl,$data);
		}
	}
	
	function get_user_id($email){
		$this->db->select('user_id');
		$this->db->where('email', $email);
		return $this->db->get($this->tbl)->result_array();	
	}
	
}

?>
