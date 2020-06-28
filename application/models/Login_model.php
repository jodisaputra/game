<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function cek($username, $password)
	{
		$this->db->select('*');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);
		return $this->db->get('users');
	}
}
                        
/* End of file Login_model.php */
