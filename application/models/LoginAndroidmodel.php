<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class LoginAndroidmodel extends CI_Model
 {
 	
 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}
 	function getLogin($username)
 	{
 		$this->db->where('username', $username);
 		return $this->db->get('user')->result();
 	}
 }
?>