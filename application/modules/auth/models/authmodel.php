<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

/*
*	Model untuk Authentikasi
*/

class AuthModel extends CI_Model{
    private $table = 'kaio_users'; 
 
	public function _construct()
	{
		parent::_construct();
	}
 
    function register($data){
        $this->db->insert($this->table, $data);
    }
	
    function login($username, $password){
        $data = $this->db->where(array('k_username' => $username, 'k_password' => md5($password)))->get($this->table);
		$user = $data->row();

        //dicek
        if ($data->num_rows() > 0){
            
            //data hasil seleksi dimasukkan ke dalam $session
            $session = array(
                'logged_in' => 1,
                'user_id' => $user->user_id,
                'group_id' => $user->group_id,
                'username' => $user->k_username,
                'name' => $user->name,
				'blocked' => $user->block
            );
 
            //data dari $session dimasukkan ke dalam session (menggunakan library CI)
            $this->session->set_userdata($session);
			return true;
        } else {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
			return false;
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
    }
}
?>