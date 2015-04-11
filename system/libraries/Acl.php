<?php  

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : info@kaiogroup.com
 *	Date: Juni 2012
**/

class Acl {
	var $CI;
	
	function Acl(){
      // Copy an instance of CI so we can use the entire framework.
      $this->CI =& get_instance();
	  $this->CI->load->model('auth/AclModel'); 
	}
	
	/*
	*	Jika memiliki akses ke dalam controller & metode return true
	*/
	function cek_acl($c,$m,$user_id){
		if($this->CI->AclModel->cek_acl($c,$m,$user_id)){
			return true;
		} else {
			return false;
		}
	}
	
	function get_group_id($user_id){
		return $this->CI->AclModel->get_group_id($user_id);
	}
	
	function get_mygroup_id($group_name){
		return $this->CI->AclModel->get_mygroup_id($group_name);
	}
	
	function buat_akses_level($user_id,$group_id){
		return $this->CI->AclModel->buat_akses_level($user_id,$group_id);
	}
	
	function hapus_akses_level($user_id){
		return $this->CI->AclModel->hapus_akses_level($user_id);
	}
	
	/* apakah user id di block? */
	function is_block($user_id){
		return $this->CI->AclModel->is_block($user_id);
	}
	
	function update_login($user_id,$data){
		return $this->CI->AclModel->update_login($user_id,$data);
	}
}

?>