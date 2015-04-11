<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConfigModel extends CI_Model{

	private $tbl = 'kaio_config';

	public function _construct()
	{
		parent::_construct();
	}
	
	public  function getlist(){
		$this->db->select('*');
		$this->db->from($this->tbl);		
		return $this->db->get()->result_array();
	}
	
	public function get_by_id(){ 
		$this->db->select('*');
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
	
		
}

?>
